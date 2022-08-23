<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$data['company'] = 'WAVELINX | RFID TAGES SYSTEM';

	}
	public function change_language()
	{
		// die(var_dump('test_func'));
	}

}
