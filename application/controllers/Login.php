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
        $this->load->view('web/login/login',$this->data);
    }
    public function check(){
        
    }


}
