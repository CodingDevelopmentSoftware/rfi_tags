<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ExcelManagementController extends MY_Controller
{
    private $tageLimitId = 1;
    public function __construct()
    {
        parent::__construct();
        $this->checkUserSessionExist();
    }
    public function index()
    {
        $this->data['title'] = 'Upload Excel';
        $this->data['page_data'] = $this->CompanyManagementModel->getDataByWhereByOrderBy('*', 'company_management', ['status' => ACTIVE_STATUS], 'company_name', 'ASC');
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/excelmanagement/upload_excel');
    }
    public function saveUploadExcel()
    {
        if (!fileAllowed()) {
            redirect('upload_excel');
        }

        $files = array_diff(scandir(UPLOAD_EXCEL_PATH), array('.', '..'));

        if (count($files)) {
            foreach ($files as $fileName) {
                deletefile($fileName, UPLOAD_EXCEL_PATH);
            }
        }

        $response = uploadSingleFile($_FILES['upload_excel'], UPLOAD_EXCEL_PATH);

        if ($response === FALSE) {
            $this->redirectWithMessage('danger', 'File Not Uploaded', 'upload_excel');
        }

        // reading Excel File
        try {
            require(TPPATH . 'PHPEXCEL/excel_reader.php');
            $excel = new PhpExcelReader;
            if ($excel->read(FETCH_EXCEL_PATH . $response) === false) {
                throw new Exception("Please provide valid excel format example '.xls' format OR please check data types of your columns");
            }
            foreach ($excel->sheets[0]['cells'] as $data) {
                $whereInArray[] = $data[3];     // RFID OR ID Number
            }

            // check already exist data in table
            $alreadyExistRfidOrID  = $this->ExcelManagementModel->getDataWithWhereIn(
                'rfid_or_id',
                'temp_excel',
                $whereInArray
            );

            $checkRefIdOrIdExistiNDataBase = array_column($alreadyExistRfidOrID, 'rfid_or_id');

            $insertData = [];
            $count = 0;
            foreach ($excel->sheets[0]['cells'] as $data) {
                if ($count == 0) {      // skipping first value of the excel
                    ++$count; // setting this variable to stop skipping next value and incerment also
                    continue;
                }

                $rfid_or_id = strtolower($data[3]);
                $checkRefIdOrIdExistiNCurrectFile = array_column($insertData, 'rfid_or_id');

                $array = [
                    'company_id' => $this->input->post('company_id'),
                    'project_id' => $this->input->post('project_id'),
                    'type_of_tag' => strtolower($data[1]),                          //Type Of Tag
                    'qr_and_bar_code_number' => strtolower($data[2]),               //QR and barcode number
                    'rfid_or_id' => $rfid_or_id,                                    // RFID OR ID
                    'generated_qr' => strtolower($data[2]),
                    'rfid_read_status' => NOT_READ_STATUS,
                    'qr_read_status' => NOT_READ_STATUS,
                    'status' => INACTIVE_STATUS,
                    'created_by' => $this->getLoggedInUser()->user_id,
                    'created_dt' => getCurrentTime()
                ];
                if (
                    !in_array($rfid_or_id, $checkRefIdOrIdExistiNCurrectFile) &&
                    !in_array($rfid_or_id, $checkRefIdOrIdExistiNDataBase)
                ) {
                    $array['data_exist'] = NOT_EXIST;
                } else {
                    $array['data_exist'] = ALREADY_EXIST;
                }
                $insertData[] = $array;
            }

            $response = $this->ExcelManagementModel->insertBatch('temp_excel', $insertData);

            if ($response == 1) {
                $color = 'success';
                $message = 'Excel Sheet Uploaded Successfully';
                $redirect = 'current_excel';
            } else {
                $color = 'danger';
                $message = 'Excel Sheet Uploaded Successfully';
                $redirect = 'upload_excel';
            }
            $this->redirectWithMessage($color, $message, $redirect);
        } catch (Exception $e) {
            $this->redirectWithMessage('danger', $e->getMessage(), 'upload_excel');
        }
    }

    public function currentExcel()
    {
        $this->data['title'] = 'Job Status';
        $this->data['show_report'] = false;

        $this->data['job_data'] = $this->ProjectManagmentModel->getDataByWhereByOrderBy(
            'pid,project_name',
            'project_management',
            ['status' => ACTIVE_STATUS],
            'project_name',
            'ASC'
        );
        if (isset($_POST['job_id'])) {
            $jobId =  (int)$this->input->post('job_id');
            $this->data['show_report'] = true;
            $this->data['project_data'] = $this->ExcelManagementModel->getCurrentCompnayProjectName($jobId);
            $this->data['total_count'] = $this->ExcelManagementModel->getSingleRowWithWhere(
                'COUNT(tid) as total_count',
                'temp_excel',
                ['project_id' => $jobId]
            );
            $this->data['original_count'] = $this->ExcelManagementModel->getCount('temp_excel', ['project_id' => $jobId, 'data_exist' => 0]);
            $this->data['duplicate_count'] = $this->ExcelManagementModel->getCount('temp_excel', ['project_id' => $jobId, 'data_exist' => 1]);
            $this->data['page_data'] = $this->ExcelManagementModel->getDataByWhereByOrderBy(
                '*',
                'temp_excel',
                ['project_id' => $jobId],
                'created_dt',
                'DESC'
            );
        }

        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/excelmanagement/current_excel');
        $this->load->view('web/includes/footer');
    }
    public function removeDuplicate(string $jobId = '')
    {
        if ($jobId !== '') {
            $jobId = (int) base64_decode($jobId);
            $response = $this->ExcelManagementModel->deleteData('temp_excel', ['project_id' => $jobId, 'data_exist' => 1]);

            if ($response == 1) {
                $color = 'success';
                $message = 'Duplicate Data Deleted Successfully';
                $redirect = 'current_excel';
            } else {
                $color = 'danger';
                $message = 'Database Problem';
                $redirect = 'currentExcel';
            }
            $this->redirectWithMessage($color, $message, $redirect);
        } else {
            $this->currentExcel();
        }
    }
    public function removeAll(string $jobId = '')
    {
        if ($jobId !== '') {
            $jobId = (int) base64_decode($jobId);
            $response = $this->ExcelManagementModel->deleteData('temp_excel', ['project_id' => $jobId]);
            if ($response == 1) {
                $color = 'success';
                $message = 'Data Deleted Successfully';
                $redirect = 'current_excel';
            } else {
                $color = 'danger';
                $message = 'Database Problem';
                $redirect = 'current_excel';
            }
            $this->redirectWithMessage($color, $message, $redirect);
        } else {
            $this->currentExcel();
        }
    }

    public function setLimit()
    {
        $this->data['title'] = 'Tag Limit';
        $this->data['page_data'] = $this->ExcelManagementModel->getSingleRowWithWhere('total_limit', 'tag_limit', ['id' => $this->tageLimitId]);
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/excelmanagement/set_limit');
        $this->load->view('web/includes/footer');
    }
    public function saveLimit()
    {
        if (!postAllowed()) {
            redirect('add_user');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tags_limit', 'Tag Limit', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
            return;
        }

        $updateData = [
            'total_limit' => postDataFilterhtml($this->input->post('tags_limit')),
            'modified_by' => $this->getLoggedInUser()->user_id,
            'modified_at' => getCurrentTime(),
        ];
        $response = $this->UserManagmentModel->updateData('tag_limit', ['id' => $this->tageLimitId], $updateData);

        if ($response > 0) {
            $color = 'success';
            $message = "New Limit Added Successfully";
        } else {
            $color = 'danger';
            $message = "Database Problem";
        }
        $this->redirectWithMessage($color, $message, 'set_limit');
    }
}
