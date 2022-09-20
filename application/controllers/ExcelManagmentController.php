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
        $this->data['title']='Upload Excel';
        $this->data['page_data'] = $this->CompanyManagementModel->getByTableName('company_management');
        $this->load->view('web/includes/header',$this->data);
        $this->load->view('web/excelmanagement/upload_excel');
        
    }
    public function showUploadExcel(){
        
    }
}
