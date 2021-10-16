<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Mclient', 'mc');
	}

	public function index()
	{
		$this->template->title = 'Dashboard';
		$this->template->page->title = 'Dashboard';
		$this->template->content->view('client/client');
		$this->template->publish('layouts/front/base');
	}

    public function daftar()
    {
        $post = $this->input->post();
        $this->mc->client_baru($post);
        redirect('');
    }

    public function profile()
    {
        $this->template->title = 'Profile';
		$this->template->page->title = 'Profile';
		$this->template->content->view('client/form_profile');
		$this->template->publish('layouts/front/base');
    }

    public function konsultasi()
    {
        $data['konsultasi'] = $this->mc->dataKonsultasi(1); // angka 1 diganti session id

        $this->template->title = 'Profile';
		$this->template->page->title = 'Profile';
		$this->template->content->view('client/konsultasi', $data);
		$this->template->publish('layouts/front/base');
    }
}