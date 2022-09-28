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
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/scanmanagement/read_tags');
    }
    public function saveReaderTag()
    {
        $tag = $this->input->post('tag');
        $whereData = [
            'rfid_or_id ' => $tag
        ];

        $response = $this->ScanManagementModel->getCount('temp_excel', $whereData);
        if ($response != 1) {
            $color = 'danger';
            $message = "Tag does not exist";
            $status = false;
        } else {
            $whereData = [
                'rfid_or_id ' => $tag,
                'read_status' => NOT_READ_STATUS
            ];
            $response = $this->ScanManagementModel->getCount('temp_excel', $whereData);
            if ($response !== 1) {
                $color = 'warning';
                $message = "$tag tag Already Read";
                $status = false;
            } else {
                $response = $this->UserManagmentModel->updateData(
                    'temp_excel',
                    $whereData,
                    ['read_status' =>  YES_READ_STATUS]
                );
                if ($response == 1) {
                    $color = 'success';
                    $message = "$tag tag read successfully";
                    $status = true;
                } else {
                    $color = 'danger';
                    $message = "Database Problem";
                    $status = false;
                }
            }
        }

        header('Content-Type: application/json');
        echo json_encode(['status' => $status, 'color' => $color, 'message' => $message]);
    }
    public function scanTags()
    {
        echo "scanTags";
    }
}
