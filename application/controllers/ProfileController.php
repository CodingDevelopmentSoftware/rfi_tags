<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ProfileController extends MY_Controller
{
    private $tableName = 'user_management';

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->data['title'] = 'My Profile';
        $this->data['page_data'] = $this->getLoggedInUser();
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/profile/my_profile');
        $this->load->view('web/includes/footer');
    }
    public function updateProfile()
    {
        $this->data['title'] = 'Update Profile';
        $this->data['page_data'] = $this->getLoggedInUser();
        $this->load->view('web/includes/header', $this->data);
        $this->load->view('web/profile/update_profile');
        $this->load->view('web/includes/footer');
    }
    public function saveProfile()
    {
        if (!postAllowed()) {
            redirect('my_profile');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[2]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[2]');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
            return false;
        }

        $databaseData = [
            'first_name' => postDataFilterhtml($this->input->post('first_name')),
            'last_name' => postDataFilterhtml($this->input->post('last_name')),
        ];

        $whereData = [
            'user_id' =>  $this->getLoggedInUser()->user_id
        ];

        $response = $this->ProfileModel->updateData($this->tableName, $whereData, $databaseData);

        if ($response == 1) {
            $color = 'success';
            $message = 'Profile Updated Successfully';
        } else if ($response == 0) {
            $color = 'danger';
            $message = 'Database Problem';
        }
        $this->redirectWithMessage($color, $message, 'my_profile');
    }
}
