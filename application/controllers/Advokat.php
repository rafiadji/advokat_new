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

   //KHUSUS KELOLA PERKARA
  public function kelolaPerkaraAdvokat($id){
    $data['perkara'] = $this->mad->kelolaPerkara($id);
    $data['detail'] = $this->mad->detailDataPerkara($id);
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

    $this->template->title = 'Pengelolaan Perkara Kuasa Hukum';
    $this->template->page->title = 'Pengelolaan Perkara';
    $this->template->content->view('advokat/kelola_perkara', $data);
    $this->template->publish('layouts/back/base');
   }

   public function downloadResume(){
    $filename = $this->input->get('filename');
    force_download('asset/berkas/' . $filename, NULL);
  }

  public function resumeSubmit($id_perkara)
  {
    $config['upload_path'] = FCPATH."assets/berkas";
    $config['allowed_types'] = 'pdf|jpeg|jpg|docx';
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
    if ($this->upload->do_upload("file_resume")){
      $udata = $this->upload->data();
      $data = array(
        'status' => 'putusan',
        'tgl_putusan' => $this->input->post('tgl_putusan'),
        'keterangan_putusan' => $this->input->post('keterangan_putusan'),
        'file_resume' => $udata["file_name"]
      );
      $this->mad->ubahDataPerkara($data, $id_perkara);
      $this->session->set_flashdata('success_message', 'Data Resume Perkara Berhasil Ditambahkan');
      redirect('advokat/kelolaPerkaraAdvokat/'.$id_perkara);
    } else {
      echo $this->upload->display_errors();
      echo "gagal";
    }
  }

  public function skNonLitigasiSubmit()
  {
    $id_perkara = $this->input->post('id_perkara');
    $config['upload_path'] = FCPATH."assets/berkas";
    $config['allowed_types'] = 'pdf|jpeg|jpg|docx';
    $config['overwrite'] = TRUE;
    $this->load->library('upload',$config);
    if($this->upload->do_upload("surat_kuasa")){
      $udata = $this->upload->data();
      $data = array(
        'id_perkara' => $this->input->post('id_perkara'),
        'jenis_sk' => $this->input->post('jenis_skNon'),
        'file' => $udata["file_name"]
      );
      $this->mad->tambahDataSuratKuasa($data);
      $this->session->set_flashdata('success_message', 'Data Surat Kuasa Non-Litigasi Berhasil Ditambahkan');
      redirect('advokat/kelolaPerkaraAdvokat/'.$id_perkara);
    }
    else {
      echo $this->upload->display_errors();
      echo "gagal";
    }
  }

  public function skLitigasiSubmit()
  {
    $id_perkara = $this->input->post('id_perkara');
    $config['upload_path'] = FCPATH."assets/berkas";
    $config['allowed_types'] = 'pdf|jpeg|jpg|docx';
    $config['overwrite'] = TRUE;
    $this->load->library('upload',$config);
    if($this->upload->do_upload("surat_kuasa")){
      $udata = $this->upload->data();
      $data = array(
        'id_perkara' => $this->input->post('id_perkara'),
        'jenis_sk' => $this->input->post('jenis_skLit'),
        'file' => $udata["file_name"]
      );
      $this->mad->tambahDataSuratKuasa($data);
      $this->session->set_flashdata('success_message', 'Data Surat Kuasa Litigasi Berhasil Ditambahkan');
      redirect('advokat/kelolaPerkaraAdvokat/'.$id_perkara);
    }
    else {
      echo $this->upload->display_errors();
      echo "gagal";
    }
  }


  public function somasiSubmit()
  {
    $id_perkara = $this->input->post('id_perkara');
    $config['upload_path'] = FCPATH."assets/berkas";
    $config['allowed_types'] = 'pdf|jpeg|jpg|docx';
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
    if($this->upload->do_upload("surat_peringatan")){
      $udata = $this->upload->data();
      $data = array(
        'id_perkara' => $this->input->post('id_perkara'),
        'tgl_terbit_surat_peringatan' => $this->input->post('tgl_terbit_surat_peringatan'),
        'file_surat_peringatan' => $udata["file_name"]
      );
      $this->mad->tambahDataSomasi($data);
      $this->session->set_flashdata('success_message', 'Surat Peringatan Berhasil Ditambahkan');
      redirect('advokat/kelolaPerkaraAdvokat/'.$id_perkara);
    }
    else {
      echo $this->upload->display_errors();
      echo "gagal";
    }
  }

  public function somasiSuratBalasan($id)
  {
    $id_perkara = $this->input->post('id_perkara');
    $config['upload_path'] = FCPATH."assets/berkas";
    $config['allowed_types'] = 'pdf|jpeg|jpg|docx';
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
    if($this->upload->do_upload("surat_balasan")){
      $udata = $this->upload->data();
      $data = array(
        'tgl_surat_balasan' => $this->input->post('tgl_terima_surat_balasan'),
        'status' => $this->input->post('status_somasi'),
        'notulen_somasi' => $this->input->post('notulen_somasi'),
        'file_surat_balasan' => $udata["file_name"]
      );
      $this->mad->ubahDataSomasiBalasan($data,$id);
      $this->session->set_flashdata('success_message', 'Surat Balasan Berhasil Ditambahkan');
      redirect('advokat/kelolaPerkaraAdvokat/'.$id_perkara);
    } else {
      echo $this->upload->display_errors();
      echo "gagal";
    }
  }

  public function somasiAktaDamai($id)
  {
    $id_perkara = $this->input->post('id_perkara');
    $config['upload_path'] = FCPATH."assets/berkas";
    $config['allowed_types'] = 'pdf|jpeg|jpg|docx';
    $config['overwrite'] = TRUE;
    $this->load->library('upload', $config);
    if($this->upload->do_upload("file_somasi")){
      $udata = $this->upload->data();
      $data = array(
        'file_somasi' => $udata["file_name"]
      );
      $this->mad->ubahDataSomasiAktaDamai($data,$id);
      $dataPerkara = array(
        'status' => 'putusan'
      );
      $this->mad->ubahDataPerkara($dataPerkara, $id);
      $this->session->set_flashdata('success_message', 'Akta Damai Berhasil Ditambahkan');
      redirect('advokat/kelolaPerkaraAdvokat/'.$id_perkara);
    } else {
      echo $this->upload->display_errors();
      echo "gagal";
    }
  }

  //SOMASI 

  public function tambahDasarHukumSubmit()
  {
    $id_perkara = $this->input->post('id_perkara');
    $config['upload_path'] = FCPATH."assets/berkas";
    $config['allowed_types'] = 'pdf|jpeg|jpg';
    $config['overwrite'] = TRUE;
    $this->load->library('upload',$config);
    if($this->upload->do_upload("file_dasar_hukum")){
      $udata = $this->upload->data();
      $data = array(
        'id_perkara' => $this->input->post('id_perkara'),
        'deskripsi' => $this->input->post('deskripsi'),
        'file_dasar_hukum' => $udata["file_name"]
      );
      $this->mad->tambahDataDasarHukum($data);
      $this->session->set_flashdata('success_message', 'Dasar Hukum Berhasil Ditambahkan');
      redirect('advokat/kelolaPerkaraAdvokat/'.$id_perkara);
    }
    else {
      echo $this->upload->display_errors();
      echo "gagal";
    }
  }

  public function mediasiSubmit()
  {
    $id_perkara = $this->input->post('id_perkara');
    $config['upload_path'] = FCPATH."assets/berkas";
    $config['allowed_types'] = 'pdf|jpeg|jpg|docx';
    $config['overwrite'] = TRUE;
    $this->load->library('upload',$config);
    if($this->upload->do_upload("akta_damai")){
      $udata = $this->upload->data();
      $data = array(
        'id_perkara' => $this->input->post('id_perkara'),
        'status' => $this->input->post('status'),
        'akta_damai' => $udata["file_name"],
        'keterangan' => $this->input->post('keterangan')
      );
      $this->mad->tambahDataMediasi($data, $id_perkara);
      $dataPerkara = array(
        'status' => 'putusan'
      );
      $this->mad->ubahDataPerkara($dataPerkara, $id_perkara);
    } else {
      $data = array(
        'id_perkara' => $this->input->post('id_perkara'),
        'status' => $this->input->post('status'),
        'keterangan' => $this->input->post('keterangan')
      );
      $this->mad->tambahDataMediasi($data);
    }
    $this->session->set_flashdata('success_message', 'Data Mediasi Berhasil Ditambahkan');
    redirect('advokat/kelolaPerkaraAdvokat/'.$id_perkara);
  }

  public function ubahSidangbyAdvo($id)
  {
    $id_perkara = $this->input->post('id_perkara');
    $id_persidangan = $this->input->post('id_persidangan');
    $config['upload_path'] = FCPATH."assets/berkas";
    $config['allowed_types'] = 'pdf|jpeg|jpg|docx';
    $config['overwrite'] = TRUE;
    $id_persidangan = $this->input->post('id_persidangan');
    $this->load->library('upload', $config);
    if($this->upload->do_upload("file_sidang")){
      $udata = $this->upload->data();
      $data = array(
        'file_persidangan' => $udata["file_name"],
        'notulen' => $this->input->post('notulen')
      );
      $this->mad->ubahDataSidang($data, $id_persidangan);
      $this->session->set_flashdata('success_message', 'Data Persidangan Berhasil Ditambahkan');
      redirect('advokat/kelolaPerkaraAdvokat/' . $id_perkara);
    } else {
      echo $this->upload->display_errors();
      echo "gagal";
    }
  }

  // KELOLA PERKARA

  public function lihatKonsultasi()
	{

		$data['konsultasi'] = $this->mad->tampilTabelKonsultasi();

		$this->template->title = 'Konsultasi';
		$this->template->page->title = 'Konsultasi';
		$this->template->content->view('advokat/listkonsultasi', $data);
		$this->template->publish('layouts/back/base');
	}

  public function konsul($id)
	{
    $data['konsultasi'] = $this->mad->dataKonsultasi($id);

		$this->template->title = 'Konsultasi';
		$this->template->page->title = 'Konsultasi';
		$this->template->content->view('advokat/konsul', $data);
		$this->template->publish('layouts/back/base');
	}

  public function save_konsul()
  {
    $post = $this->input->post();
    $this->mad->updateKonsultasi($post);
    redirect('advokat/lihatkonsultasi');
  }
}