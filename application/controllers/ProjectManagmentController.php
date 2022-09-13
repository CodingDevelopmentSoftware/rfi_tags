<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ProjectManagmentController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkUserSessionExist();
    }
    public function index()
    {
        $this->data['title'] = 'Add Project';
        $this->data['page_data'] = $this->CompanyManagementModel->getByTableName('company_management');
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/projectmanagement/add_project');
        $this->load->view('web/includes/footer');
    }
    public function saveProject()
    {

        if (!postAllowed()) {
            redirect('add_project');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project_name', 'Project Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
            return;
        }

        $project_name = postDataFilterhtml($this->input->post('project_name'));

        $whereData = [
            'project_name' => strtolower($project_name)
        ];

        $response = $this->CompanyManagementModel->getCount('project_management', $whereData);

        if ($response == 0) {
            $insertData = [
                'company_id' => postDataFilterhtml($this->input->post('company_id')),
                'project_name' => strtolower($project_name),
                'status' => 1,
                'created_by' => $this->getLoggedInUser()->user_id,
                'created_dt' => getCurrentTime(),
            ];
            $response = $this->ProjectManagmentModel->insertData('project_management', $insertData);

            if ($response > 0) {
                $color = 'success';
                $message = "$project_name Project created Successfully";
            } else {
                $color = 'danger';
                $message = "Database Problem";
            }
        } else {
            $color = 'warning';
            $message = "$project_name Project already Created";
        }
        $this->redirectWithMessage($color, $message, 'add_project');
    }

    public function viewProjects()
    {
        $this->data['title'] = 'View Companies';
        $this->data['page_data'] = $this->ProjectManagmentModel->getAllProjects();
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/projectmanagement/view_projects');
        $this->load->view('web/includes/footer');
    }

    public function viewCompanyProfile($id)
    {
        $id = (int)base64_decode($id);
        $response = $this->CompanyManagementModel->getCount('company_management', ['cid' => $id]);

        if ($response != 1) {
            $color = 'danger';
            $message = "Company does not exist";
            $this->redirectWithMessage($color, $message, 'view_companies');
        }

        $this->data['title'] = 'View Company';
        $this->data['page_data'] = $this->CompanyManagementModel->getUserProfileWithWhere($id);
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/companymanagement/view_company_profile');
        $this->load->view('web/includes/footer');
    }

    public function changeStatus(string $id = '', string $status = '')
    {
        $id = (int)base64_decode($id);
        $status = (int)base64_decode($status);
        $response = $this->CompanyManagementModel->getCount('company_management', ['cid' => $id]);

        if ($response != 1) {
            $color = 'danger';
            $message = "Company does not exist";
        } else {
            $response = $this->CompanyManagementModel->updateData(
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

    public function editCompanyProfile($id)
    {
        $id = (int)base64_decode($id);
        $response = $this->UserManagmentModel->getCount('company_management', ['cid' => $id]);

        if ($response != 1) {
            $color = 'danger';
            $message = "Company does not exist";
            $this->redirectWithMessage($color, $message, 'view_companies');
        }

        $this->data['title'] = 'Edit User';
        $this->data['page_data'] = $this->UserManagmentModel->getSingleRowWithWhere('*', 'company_management', ['cid' => $id]);
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/companymanagement/edit_company_profile');
        $this->load->view('web/includes/footer');
    }

    public function saveUpdateCompany()
    {
        if (!postAllowed()) {
            redirect('view_companies');
        }
        $id = $this->input->post('company_id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
            return redirect("edit_company_profile/" . base64_encode($id));
        }

        $updateData = [
            'company_name' => postDataFilterhtml($this->input->post('company_name')),
            'modified_by' => $this->getLoggedInUser()->user_id,
            'modified_dt' => getCurrentTime(),
        ];
        $response = $this->UserManagmentModel->updateData('company_management', ['cid' => $id], $updateData);

        if ($response > 0) {
            $color = 'success';
            $message = "Company updated Successfully";
        } else {
            $color = 'danger';
            $message = "Database Problem";
        }
        $this->redirectWithMessage($color, $message, 'view_companies');
    }
}
