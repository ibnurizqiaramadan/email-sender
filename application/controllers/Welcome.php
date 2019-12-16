<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('email')) {
			redirect('send');
		}
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login()
	{
		$session = array(
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'name' => $this->input->post('name')
		);
		$this->session->set_userdata($session);
		redirect('send');
	}
}
