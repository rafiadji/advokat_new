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

  public function buatTimAdvokatSubmit()
  {
    for ($i=1; $i<=3 ; $i++) { 
      if($i == 1) {
        $data = array(
          'id_karyawan' => $this->input->post('advo1'),
          'id_perkara' => $this->input->post('id_perkara')
        );
        $this->mk->tambahTim($data);
      }
      elseif ($i == 2) {
        $data = array(
          'id_karyawan' => $this->input->post('advo2'),
          'id_perkara' => $this->input->post('id_perkara')
        );
        $this->mk->tambahTim($data);
      } elseif ($i == 3) {
        $data = array(
          'id_karyawan' => $this->input->post('advo3'),
          'id_perkara' => $this->input->post('id_perkara')
        );
        $this->mk->tambahTim($data);
        $this->session->set_flashdata('success_message', 'Tim Advokat Berhasil Dibentuk');
        redirect('ketua/buatTimAdvokat');
      }
    }
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

  // KHUSUS PERKARA
  public function lihatPerkara()
  { 
    $data['perkara'] = $this->mk->tampilDataPerkaraKetua();

    $this->template->title = 'List Data Perkara';
    $this->template->page->title = 'Ketua';
    $this->template->content->view('ketua/listPerkaraKetua', $data);
    $this->template->publish('layouts/back/base');
  }

  public function rangkumanPerkara($id){
    $data['rangkuman'] = $this->mk->resumePerkara($id);
    $data['perkara'] = $this->mk->kelolaPerkara($id);
    $data['resume'] = $this->mk->resumeFilled($id);
    $data['dasar_hukum'] = $this->mk->dasarHukumFilled($id);
    $data['surat_kuasa'] = $this->mk->suratKuasaFilled($id, 'litigasi');
    $data['surat_kuasa_1'] = $this->mk->suratKuasaFilled($id, 'non-litigasi');
    $data['peringatan'] = $this->mk->peringatanFilled($id);
    $data['balasan'] = $this->mk->balasanFilled($id);
    $data['somasi'] = $this->mk->somasiFilled($id);
    $data['mediasi'] = $this->mk->mediasiFilled($id);
    $data['sidang1'] = $this->mk->persidanganFilled($id, '1');
    $data['sidang2'] = $this->mk->persidanganFilled($id, '2');
    $data['sidang3'] = $this->mk->persidanganFilled($id, '3');
    $data['sidang4'] = $this->mk->persidanganFilled($id, '4');
    $data['sidang5'] = $this->mk->persidanganFilled($id, '5');
    $data['sidang6'] = $this->mk->persidanganFilled($id, '6');
    $data['sidang7'] = $this->mk->persidanganFilled($id, '7');
    $data['sidang8'] = $this->mk->persidanganFilled($id, '8');
    $data['sidang9'] = $this->mk->persidanganFilled($id, '9');
    $data['sidang10'] = $this->mk->persidanganFilled($id, '10');
    $data['namaadvo1'] = $this->mk->advokatFilled($id, '1');
    $data['namaadvo2'] = $this->mk->advokatFilled($id, '2');
    $data['namaadvo3'] = $this->mk->advokatFilled($id, '3');
    $data['namaadvo4'] = $this->mk->advokatFilled($id, '4');
    $data['namaadvo5'] = $this->mk->advokatFilled($id, '5');
    $data['namaadvo6'] = $this->mk->advokatFilled($id, '6');
    $data['namaadvo7'] = $this->mk->advokatFilled($id, '7');
    $data['namaadvo8'] = $this->mk->advokatFilled($id, '8');
    $data['namaadvo9'] = $this->mk->advokatFilled($id, '9');
    $data['namaadvo10'] = $this->mk->advokatFilled($id, '10');
    $data['tim_perkara'] = $this->mk->viewTim($id);

    $this->template->title = 'Rangkuma Perkara';
    $this->template->page->title = 'Ketua';
    $this->template->content->view('ketua/rangkuman_perkara', $data);
    $this->template->publish('layouts/back/base');
   }
 
   public function downloadResume(){
     $filename = $this->input->get('filename');
     force_download('asset/berkas/' . $filename, NULL);
   }

}