<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ReportsController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkUserSessionExist();
    }

    public function scannedTags() 
    {
        $this->data['title'] = 'Scanned Reports';
        $this->data['page_data'] = $this->ReportsModel->getScannedtags();
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/reports/scanned_tags');
        $this->load->view('web/includes/footer');
    }
    public function unscannedTags() 
    {
        $this->data['title'] = 'Scanned Reports';
        $this->data['page_data'] = $this->ReportsModel->getUnScannedtags();
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/reports/unscanned_tags');
        $this->load->view('web/includes/footer');
    }
}
?>