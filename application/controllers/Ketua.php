<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketua extends CI_Controller {
    public function __construct()
  {
      parent::__construct();
      $this->load->model("Mketua", "mk");
      $this->load->model("Madmin", "ma");
      $this->load->helper('download');
  }

  public function index()
  {
    $data['perkara'] = $this->mk->tampilDataPerkaraKetua();
    $data['dashboardall'] = $this->mk->dashboardPerkara();
    $data['dashboardaktif'] = $this->mk->dashboardPerkaraAktif();
    $data['dashboardanon'] = $this->mk->dashboardPerkaraNonAktif();
    $data['dashboardputus'] = $this->mk->dashboardPerkaraPutus();
    $data['sidangToday'] = $this->mk->adaSidangToday();
    

    $this->template->title = 'Dashboard Ketua';
    $this->template->page->title = 'Ketua';
    $this->template->content->view('ketua/ketua', $data);
    $this->template->publish('layouts/back/base');
  }

  // pemilihan tim 

  public function buatTimAdvokat()
  {
    $data['perkara'] = $this->ma->tampilDataPerkaraOnprocess();
    $data['karyawan'] = $this->mk->tampilDataAdvokatTim();
    $data['tim'] = $this->mk->viewTabelTim();
    
    $this->template->title = 'Tim Advokat';
    $this->template->page->title = 'Ketua';
    $this->template->content->view('ketua/timAdvokat', $data);
    $this->template->publish('layouts/back/base');
  }

  // KHUSUS KLIEN

  public function lihatKlien()
  {
     
    $data['klien'] = $this->mk->tampilDataKlienKetua();

    $this->template->title = 'Data Klien';
    $this->template->page->title = 'Ketua';
    $this->template->content->view('ketua/listKlienKetua', $data);
    $this->template->publish('layouts/back/base');
  }

  // KARYAWAN

  public function lihatKaryawan()
  {
     
    $data['karyawan'] = $this->mk->tampilTabelKaryawan();

    $this->template->title = 'Data Karyawan';
    $this->template->page->title = 'Ketua';
    $this->template->content->view('ketua/listKaryawanKetua', $data);
    $this->template->publish('layouts/back/base');
  }
}