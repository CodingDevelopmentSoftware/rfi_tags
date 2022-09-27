<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ScanManagementController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
       $this->checkUserSessionExist();
    }
    public function index(){
       
    }
    public function readTags()
    {
        $this->data['title'] = 'Read Tags';
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/scanmanagement/read_tags');
    }
    public function saveReaderTag(){
        echo json_encode($this->input->post('tage'));
    }
    public function scanTags()
    {
        echo "scanTags";
    }
}
