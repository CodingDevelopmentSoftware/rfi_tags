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
        $this->data['title'] = 'Add Job';
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
                $message = "$project_name job created Successfully";
            } else {
                $color = 'danger';
                $message = "Database Problem";
            }
        } else {
            $color = 'warning';
            $message = "$project_name job already Created";
        }
        $this->redirectWithMessage($color, $message, 'add_project');
    }

    public function viewProjects()
    {
        $this->data['title'] = 'View Job';
        $this->data['page_data'] = $this->ProjectManagmentModel->getAllProjects();
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/projectmanagement/view_projects');
        $this->load->view('web/includes/footer');
    }

    public function viewProjectProfile($id)
    {
        $id = (int)base64_decode($id);
        $response = $this->ProjectManagmentModel->getCount('project_management', ['pid' => $id]);

        if ($response != 1) {
            $color = 'danger';
            $message = "Job does not exist";
            $this->redirectWithMessage($color, $message, 'view_projects');
        }

        $this->data['title'] = 'View Job';
        $this->data['page_data'] = $this->ProjectManagmentModel->getProjectWithWhere($id);
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/projectmanagement/view_project_profile');
        $this->load->view('web/includes/footer');
    }

    public function changeStatus(string $id = '', string $status = '')
    {
        $id = (int)base64_decode($id);
        $status = (int)base64_decode($status);
        $response = $this->ProjectManagmentModel->getCount('project_management', ['pid' => $id]);

        if ($response != 1) {
            $color = 'danger';
            $message = "Job does not exist";
        } else {
            $response = $this->ProjectManagmentModel->updateData(
                'project_management',
                ['pid' => $id],
                ['status' =>  !$status]     // making active or inactive by adding not condtion
            );
            if ($response == 1) {
                $color = 'success';
                $message = "Job Status Changed Successfully";
            } else {
                $color = 'danger';
                $message = "Database Problem";
            }
        }
        $this->redirectWithMessage($color, $message, 'view_projects');
    }

    public function editProjectProfile($id)
    {
        $id = (int)base64_decode($id);
        $response = $this->ProjectManagmentModel->getCount('project_management', ['pid' => $id]);

        if ($response != 1) {
            $color = 'danger';
            $message = "Job does not exist";
            $this->redirectWithMessage($color, $message, 'view_companies');
        }

        $this->data['title'] = 'Edit Project';
        $this->data['page_data'] = $this->CompanyManagementModel->getByTableName('company_management');
        $this->data['page_data_database'] = $this->ProjectManagmentModel->getProjectWithWhere($id);
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/projectmanagement/edit_project_profile');
        $this->load->view('web/includes/footer');
    }

    public function saveUpdateProject()
    {
        if (!postAllowed()) {
            redirect('view_projectss');
        }
        $id = $this->input->post('project_id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project_name', 'Project Name', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
            return redirect("edit_project_profile/" . base64_encode($id));
        }

        $updateData = [
            'company_id' => postDataFilterhtml($this->input->post('company_id')),
            'project_name' => postDataFilterhtml($this->input->post('project_name')),
            'modified_by' => $this->getLoggedInUser()->user_id,
            'modified_dt' => getCurrentTime(),
        ];
        $response = $this->UserManagmentModel->updateData('project_management', ['pid' => $id], $updateData);

        if ($response > 0) {
            $color = 'success';
            $message = "Job updated Successfully";
        } else {
            $color = 'danger';
            $message = "Database Problem";
        }
        $this->redirectWithMessage($color, $message, 'view_projects');
    }

    public function getProjects()
    {
        if (!postAllowed()) {
            return false;
        }

        $companyId = $this->input->post('company_id');
        $data = $this->ProjectManagmentModel->getDataByWhereByOrderBy(
            'pid,project_name',
            'project_management',
            ['company_id' => $companyId],
            'project_name',
            'ASC'
        );
        header('Content-Type: application/json');
        if (!empty($data)) {
            echo json_encode($data);
        } else {
            echo json_encode([]);
        }
    }
}
