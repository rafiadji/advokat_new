<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mlogin');
	}

	public function index()
	{
		$this->template->title = 'Log in';
		$this->template->page->title = 'Login';
        $this->template->publish('login');
	}

	public function proses()
	{
		$post = $this->input->post();
		$this->Mlogin->cek_login($post);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('masuk');
	}
}