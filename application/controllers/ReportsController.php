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
        $this->data['job_data'] = $this->ProjectManagmentModel->getDataByWhereByOrderBy(
            'pid,project_name',
            'project_management',
            ['status' => ACTIVE_STATUS],
            'project_name',
            'ASC'
        );

        if (isset($_POST['job_id'])) {
            $jobId = (int)$this->input->post('job_id');
            $this->data['page_data'] = $this->ReportsModel->getScannedUnscannedTags($jobId, true);
        } else {
            $this->data['page_data'] = [];
        }
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/reports/scanned_tags');
        $this->load->view('web/includes/footer');
    }
    public function unscannedTags()
    {
        $this->data['title'] = 'Unscanned Reports';
        $this->data['job_data'] = $this->ProjectManagmentModel->getDataByWhereByOrderBy(
            'pid,project_name',
            'project_management',
            ['status' => ACTIVE_STATUS],
            'project_name',
            'ASC'
        );
        if (isset($_POST['job_id'])) {
            $jobId = (int)$this->input->post('job_id');
            $this->data['page_data'] = $this->ReportsModel->getScannedUnscannedTags($jobId, false);
        } else {
            $this->data['page_data'] = [];
        }
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/reports/unscanned_tags');
        $this->load->view('web/includes/footer');
    }
}
