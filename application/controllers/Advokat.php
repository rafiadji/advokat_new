<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advokat extends CI_Controller {

    public function __construct()
  {
      parent::__construct();
      $this->load->model("Madvokat", "mad");
      $this->load->helper('download');
  }

  public function index()
  {
    $username = $this->session->userdata('username');
    $data['sidangToday'] = $this->mad->adaSidangToday($username);
    
    $this->template->title = 'Dashboard';
	$this->template->page->title = 'Dashboard';
	$this->template->content->view('advokat/advokat', $data);
	$this->template->publish('layouts/back/base');
  }

  public function lihatPerkara()
  {
    $username = $this->session->userdata('username');
    $data['perkara'] = $this->mad->tampilDataPerkaraAdvokat($username);
    $data['perkaraputus'] = $this->mad->tampilDataPerkaraAdvokatPutus($username);

    $this->template->title = 'Perkara';
    $this->template->page->title = 'Data Perkara';
    $this->template->content->view('advokat/listPerkaraAdvokat', $data);
    $this->template->publish('layouts/back/base');
  }

  public function lihatJadwal()
  {
    $username = $this->session->userdata('username');
    $data['jadwal'] = $this->mad->jadwalsidang($username);

    $this->template->title = 'Jadwal Persidangan Pengadilan Negeri';
    $this->template->page->title = 'Jadwal Persidangan PN';
    $this->template->content->view('advokat/jadwal_advokat', $data);
    $this->template->publish('layouts/back/base');
  }

}