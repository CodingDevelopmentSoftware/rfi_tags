<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ExcelManagmentController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkUserSessionExist();
    }
    public function index()
    {
        $this->data['title'] = 'Upload Excel';
        $this->data['page_data'] = $this->CompanyManagementModel->getByTableName('company_management');
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/excelmanagement/upload_excel');
    }
    public function showUploadExcel()
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

        require(TPPATH . 'PHPEXCEL/excel_reader.php');

        // reading Excel File
        $excel = new PhpExcelReader;
        $excel->read(FETCH_EXCEL_PATH . $response);

        foreach ($excel->sheets[0]['cells'] as $data) {
            $whereInArray[] = $data[3];     // RFID OR ID Number
        }

        // check already exist data in table
        $alreadyExistRfidOrID  = $this->ExcelManagmentModel->getDataWithWhereIn(
            'rfid_or_id',
            'temp_excel',
            $whereInArray
        );

        $checkRefIdOrIdExistiNDataBase = array_column($alreadyExistRfidOrID, 'rfid_or_id');

        $insertData = [];
        $count = 0;
        foreach ($excel->sheets[0]['cells'] as $data) {
            if ($count == 0) {
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
                'rfid_or_id' => $rfid_or_id,                           // RFID OR ID
                'status' => ACTIVE_STATUS,
                'created_by' => $this->getLoggedInUser()->user_id,
                'created_dt' => getCurrentTime(),
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

        $response = $this->ExcelManagmentModel->insertBatch('temp_excel', $insertData);
    }
}
