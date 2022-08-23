<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->data['title'] = 'Login';
        $this->load->view('web/login/login', $this->data);
    }
    public function check()
    {
        if (!postAllowed()) {
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|min_length[10]|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
            return false;
        }

        $databaseData = [
            'phone_number' => postDataFilterhtml($this->input->post('phone_number')),
            'password' => md5(postDataFilterhtml($this->input->post('password'))),
        ];

        echo "<pre>";
        print_r($databaseData);
        exit;


    }
}
