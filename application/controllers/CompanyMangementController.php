<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CompanyMangementController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkUserSessionExist();
    }
    public function index()
    {
        $this->data['title']='Add Company';
        $this->load->view('web/includes/header',$this->data);
        $this->load->view('web/companymanagement/add_company');
        $this->load->view('web/includes/footer');
    }
    public function saveCompany(){
        
        if (!postAllowed()) {
            redirect('add_company');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
            return;
        }

        $company_name = postDataFilterhtml($this->input->post('company_name'));

        $whereData = [
            'company_name' => strtolower($company_name)
        ];

        $response = $this->UserManagmentModel->getCount('company_management', $whereData);

        if ($response == 0) {
            $insertData = [
               'company_name' => strtolower($company_name),
                'status' => 1,
                'created_by' => $this->getLoggedInUser()->user_id,
                'created_dt' => getCurrentTime(),
            ];
            $response = $this->UserManagmentModel->insertData('company_management', $insertData);

            if ($response > 0) {
                $color = 'success';
                $message = "$company_name company created Successfully";
            } else {
                $color = 'danger';
                $message = "Database Problem";
            }
        } else {
            $color = 'warning';
            $message = "$company_name company already Created";
        }
        $this->redirectWithMessage($color, $message, 'add_company');
    }
    
    public function viewCompanies()
    {
        $this->data['title'] = 'View Companies';
        $this->data['page_data'] = $this->UserManagmentModel->getByTableName('company_management');
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/companymanagement/view_companies');
        $this->load->view('web/includes/footer');
    }
    public function changeStatus(string $id = '', string $status = '')
    {
        $id = (int)base64_decode($id);
        $status = (int)base64_decode($status);
        $response = $this->UserManagmentModel->getCount('company_management', ['cid' => $id]);

        if ($response != 1) {
            $color = 'danger';
            $message = "Company does not exist";
        } else {
            $response = $this->UserManagmentModel->updateData(
                'company_management',
                ['cid' => $id],
                ['status' =>  !$status]     // making active or inactive by adding not condtion
            );
            if ($response == 1) {
                $color = 'success';
                $message = "Company Status Changed Successfully";
            } else {
                $color = 'danger';
                $message = "Database Problem";
            }
        }
        $this->redirectWithMessage($color, $message, 'view_companies');
    }
}
