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

  public function rangkumanPerkara($id){
    $data['rangkuman'] = $this->mad->resumePerkara($id);
    $data['perkara'] = $this->mad->kelolaPerkara($id);
    $data['resume'] = $this->mad->resumeFilled($id);
    $data['dasar_hukum'] = $this->mad->dasarHukumFilled($id);
    $data['surat_kuasa'] = $this->mad->suratKuasaFilled($id, 'litigasi');
    $data['surat_kuasa_1'] = $this->mad->suratKuasaFilled($id, 'non-litigasi');
    $data['peringatan'] = $this->mad->peringatanFilled($id);
    $data['balasan'] = $this->mad->balasanFilled($id);
    $data['somasi'] = $this->mad->somasiFilled($id);
    $data['mediasi'] = $this->mad->mediasiFilled($id);
    $data['sidang1'] = $this->mad->persidanganFilled($id, '1');
    $data['sidang2'] = $this->mad->persidanganFilled($id, '2');
    $data['sidang3'] = $this->mad->persidanganFilled($id, '3');
    $data['sidang4'] = $this->mad->persidanganFilled($id, '4');
    $data['sidang5'] = $this->mad->persidanganFilled($id, '5');
    $data['sidang6'] = $this->mad->persidanganFilled($id, '6');
    $data['sidang7'] = $this->mad->persidanganFilled($id, '7');
    $data['sidang8'] = $this->mad->persidanganFilled($id, '8');
    $data['sidang9'] = $this->mad->persidanganFilled($id, '9');
    $data['sidang10'] = $this->mad->persidanganFilled($id, '10');
    $data['namaadvo1'] = $this->mad->advokatFilled($id, '1');
    $data['namaadvo2'] = $this->mad->advokatFilled($id, '2');
    $data['namaadvo3'] = $this->mad->advokatFilled($id, '3');
    $data['namaadvo4'] = $this->mad->advokatFilled($id, '4');
    $data['namaadvo5'] = $this->mad->advokatFilled($id, '5');
    $data['namaadvo6'] = $this->mad->advokatFilled($id, '6');
    $data['namaadvo7'] = $this->mad->advokatFilled($id, '7');
    $data['namaadvo8'] = $this->mad->advokatFilled($id, '8');
    $data['namaadvo9'] = $this->mad->advokatFilled($id, '9');
    $data['namaadvo10'] = $this->mad->advokatFilled($id, '10');
    $data['tim_perkara'] = $this->mad->viewTim($id);

    $this->template->title = 'Rangkuman Perkara Kuasa Hukum';
    $this->template->page->title = 'Rangkuman Perkara';
    $this->template->content->view('advokat/rangkuman_perkara', $data);
    $this->template->publish('layouts/back/base');
   }
}