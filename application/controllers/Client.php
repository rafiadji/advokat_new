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

	public function submitProfil()
	{
		$post = $this->input->post();
		$this->mc->updateKlien($post);
		redirect('client/client');
	}

    public function konsultasi()
    {
        $data['konsultasi'] = $this->mc->dataKonsultasi(1); // angka 1 diganti session id

        $this->template->title = 'Profile';
		$this->template->page->title = 'Profile';
		$this->template->content->view('client/konsultasi', $data);
		$this->template->publish('layouts/front/base');
    }

	public function daftarkonsultasi()
    {
        $this->template->title = 'Kronologi';
		$this->template->page->title = 'Kronologi';
		$this->template->content->view('client/daftar_konsul');
		$this->template->publish('layouts/front/base');
    }

	public function kronologisubmit()
    {
        $post = $this->input->post();
        $this->mc->save_kronologi($post);
        redirect('client/client');
    }

	
}