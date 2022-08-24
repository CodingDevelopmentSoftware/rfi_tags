<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DashboardController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title']='DashBoard';
        $this->load->view('web/includes/header',$data);
        $this->load->view('web/dashboard/dashboard');
        $this->load->view('web/includes/footer');
    }
}
