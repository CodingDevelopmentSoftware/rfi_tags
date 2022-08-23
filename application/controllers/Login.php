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
        $data['title'] = 'Login';
        $this->load->view('web/login/login',$data);
    }
}
