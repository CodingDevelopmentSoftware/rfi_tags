<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ScanManagementController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkUserSessionExist();
    }
    public function index()
    {
    }
    public function readTags()
    {
        $this->data['title'] = 'Read Tags';
        
        $this->data['totalCount'] = $this->ScanManagementModel->getCount('temp_excel',[
            'rfid_read_by' => $this->getLoggedInUser()->user_id,
            'rfid_read_status' => YES_READ_STATUS
        ]);
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/scanmanagement/read_tags');
    }
    public function saveReaderTag()
    {
        $totalCount = 0;
        $tag = $this->input->post('tag');
        $whereData = [
            'rfid_or_id ' => $tag
        ];

        $response = $this->ScanManagementModel->getDataByWhereByOrderBy(
            'rfid_read_status',
            'temp_excel', 
            $whereData,
            'tid',
            'ASC'
        )[0];

        if (empty($response)) {
            $color = 'danger';
            $message = "RFID Tag does not exist";
            $status = false;
        } else {
            if ($response->rfid_read_status == 1) {
                $color = 'warning';
                $message = "$tag RFID Tag Already Read";
                $status = false;
            } else {
                $responseStatus = $this->UserManagmentModel->updateData(
                    'temp_excel',
                    $whereData,
                    [
                        'rfid_read_status' =>  YES_READ_STATUS,
                        'rfid_read_by' => $this->getLoggedInUser()->user_id,
                        'rfid_read_dt' => getCurrentTime(),    
                    ]
                );
                if ($responseStatus == 1) {
                    $color = 'success';
                    $message = "$tag RFID Tag read successfully";
                    $status = true;
                    $totalCount = $this->ScanManagementModel->getCount('temp_excel',
                        [
                            'rfid_read_by' => $this->getLoggedInUser()->user_id,
                            'rfid_read_status' => YES_READ_STATUS
                        ]
                    );
                } else {
                    $color = 'danger';
                    $message = "Database Problem";
                    $status = false;
                }
            }
        }

        header('Content-Type: application/json');
        echo json_encode(['status' => $status, 'color' => $color, 'message' => $message, 'totalCount' => $totalCount]);
    }
    public function scanTags()
    {
        echo "scanTags";
    }
}
