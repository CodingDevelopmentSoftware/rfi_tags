<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

	public $data;

	public function __construct()
	{
		parent::__construct();
		$this->data['company'] = 'WAVELINX | RFID TAGES SYSTEM';
	}
	public function redirectWithMessage(
		string $color = '',
		string $message = '',
		string $redirect = ''
	) : void {
		$this->session->set_flashdata('color', $color);
		$this->session->set_flashdata('message', $message);
		redirect($redirect);
	}
}
