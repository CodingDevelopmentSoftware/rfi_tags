<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ProfileController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->data['title'] = 'My Profile';
        $this->data['page_data'] = $this->getLoggedInUser();
        $this->load->view('web/includes/header',$this->data);
        $this->load->view('web/profile/my_profile');
        $this->load->view('web/includes/footer');
    }
}
