<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ScanManagementController extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkUserSessionExistForLogin();
    }
    public function index(){

    }
    public function readTags()
    {
        
    }
    public function scanTags()
    {

    }
}
