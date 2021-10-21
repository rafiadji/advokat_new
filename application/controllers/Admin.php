<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin', 'ma');
		$this->load->helper('download');
	}

	public function index()
	{
		$data['dashboardall'] = $this->ma->dashboardPerkara();
		$data['dashboardaktif'] = $this->ma->dashboardPerkaraAktif();
		$data['dashboardnonaktif'] = $this->ma->dashboardPerkaraNonAktif();
		$data['dashboardputus'] = $this->ma->dashboardPerkaraPutus();
		$data['sidangToday'] = $this->ma->adaSidangToday();
		$data['perkaranon'] = $this->ma->dashboardPerkaratdkAktif();

		$this->template->title = 'Dashboard';
		$this->template->page->title = 'Dashboard';
		$this->template->content->view('admin/admin', $data);
		$this->template->publish('layouts/back/base');
	}

	// khusus konsultasi
	public function editKonsultasi($id)
	{
		$data['konsultasi'] = $this->ma->tampilUbahKaryawan($id);

		$this->template->title = 'Karyawan';
		$this->template->page->title = 'Karyawan';
		$this->template->content->view('admin/ubah_karyawan', $data);
		$this->template->publish('layouts/back/base');
	}

	// KHUSUS PERKARA
	public function lihatPerkara()
	{
		$data['perkara'] = $this->ma->tampilDataPerkaraOnprocess();
		$data['perkaraPutus'] = $this->ma->tampilDataPerkaraPutus();

		$this->template->title = 'Perkara';
		$this->template->page->title = 'Perkara';
		$this->template->content->view('admin/perkara', $data);
		$this->template->publish('layouts/back/base');
	}

	public function lihatPerkaranonaktif()
	{
		$this->template->title = 'Perkara';
		$this->template->page->title = 'Perkara';
		$this->template->content->view('admin/perkara');
		$this->template->publish('layouts/back/base');
	}

	public function tambahPerkara()
	{
		$data['klien'] = $this->ma->tampilDataKlien();

		$this->template->title = 'Perkara';
		$this->template->page->title = 'Perkara';
		$this->template->content->view('admin/tambah_perkara', $data);
		$this->template->publish('layouts/back/base');
	}

	public function tambahPerkaraSubmit()
	{
		$config['upload_path'] = FCPATH . "assets/berkas";
		$config['allowed_types'] = 'pdf|jpeg|jpg';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload("legal_opini")) {
			$udata = $this->upload->data();
			$data = array(
				'judul' => $this->input->post('judul_perkara'),
				'tgl_daftar_perkara' => $this->input->post('tgl_daftar'),
				'jenis_perkara' => $this->input->post('jns_perkara'),
				'legal_opini' => $udata["file_name"],
				'id_klien' => $this->input->post('id_klien'),
				'kategori' => $this->input->post('kategori'),
				'tergugat' => $this->input->post('tergugat'),
				'alamat_tergugat' => $this->input->post('alamat_tergugat'),
				'nomor_perkara' => $this->input->post('nomor_perkara'),
				'status' => 'onprocess'

			);
			$this->ma->tambahDataPerkara($data);
			$this->session->set_flashdata('success_message', 'Data Perkara Berhasil Ditambahkan');
			redirect('admin/lihatPerkara');
		} else {
			echo $this->upload->display_errors();
			echo "gagal";
		}
	}

	public function resumeSubmit($id_perkara)
	{
		$config['upload_path'] = FCPATH . "asset/berkas";
		$config['allowed_types'] = 'pdf|jpeg|jpg|docx';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload("file_resume")) {
			$udata = $this->upload->data();
			$data = array(
				'status' => 'putusan',
				'tgl_putusan' => $this->input->post('tgl_putusan'),
				'keterangan_putusan' => $this->input->post('keterangan_putusan'),
				'file_resume' => $udata["file_name"]
			);
			$this->ma->ubahDataPerkara($data, $id_perkara);
			$this->session->set_flashdata('success_message', 'Data Resume Perkara Berhasil Ditambahkan');
			redirect('admin/kelolaPerkara/' . $id_perkara);
		} else {
			echo $this->upload->display_errors();
			echo "gagal";
		}
	}

	public function nonaktifPerkaraSubmit()
	{
		$id = $this->input->post('id_perkara');
		$data = array(
			'status' =>  $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan')
		);
		$this->ma->nonaktifPerkara($data, $id);
		$this->session->set_flashdata('success_message', 'Perkara Berhasil di Non-Aktifkan');
		redirect('admin/lihatPerkara');
	}

	public function keNonaktif($id)
	{
		$data['perkara'] = $this->ma->viewNonaktif($id);

		$this->template->title = 'Non - Aktifkan Perkara';
		$this->template->page->title = 'Non - Aktifkan Perkara';
		$this->template->content->view('admin/ubah_perkara', $data);
		$this->template->publish('layouts/back/base');
	}

	// DASAR HUKUM 
	public function tambahDasarHukumSubmit()
	{
		$id_perkara = $this->input->post('id_perkara');
		$config['upload_path'] = FCPATH . "assets/berkas";
		$config['allowed_types'] = 'pdf|jpeg|jpg';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload("file_dasar_hukum")) {
			$udata = $this->upload->data();
			$data = array(
				'id_perkara' => $this->input->post('id_perkara'),
				'deskripsi' => $this->input->post('deskripsi'),
				'file_dasar_hukum' => $udata["file_name"]
			);
			$this->ma->tambahDataDasarHukum($data);
			$this->session->set_flashdata('success_message', 'Data Dasar Hukum Berhasil Ditambahkan');
			redirect('admin/kelolaPerkara/' . $id_perkara);
		} else {
			echo $this->upload->display_errors();
			echo "gagal";
		}
	}


	//KHUSUS KLIEN

	public function lihatKlien()
	{

		$data['klien'] = $this->ma->tampilDataKlien();

		$this->template->title = 'Klien';
		$this->template->page->title = 'Klien';
		$this->template->content->view('admin/klien', $data);
		$this->template->publish('layouts/back/base');
	}

	public function tambahKlien()
	{
		$this->template->title = 'Klien';
		$this->template->page->title = 'Klien';
		$this->template->content->view('admin/tambah_klien');
		$this->template->publish('layouts/back/base');
	}

	public function tambahKlienSubmit()
	{
		$data = array(
			'ktp' => $this->input->post('ktp'),
			'nama_klien' => $this->input->post('nama_klien'),
			'jk' => $this->input->post('jk'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'alamat' => $this->input->post('alamat'),
			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
			'siup_npwp' => $this->input->post('no_siupperusahaan'),
			'alamat_perusahaan' => $this->input->post('alm_perusahaan'),
			'email_klien' => $this->input->post('email_klien')
		);
		$this->ma->tambahDataKlien($data);
		$this->session->set_flashdata('success_message', 'Data Klien berhasil ditambahkan');
		redirect('admin/lihatKlien');
	}

	public function ubahKlienSubmit($id)
	{
		$data = array(
			'ktp' => $this->input->post('no_ktp'),
			'nama_klien' => $this->input->post('nama'),
			'jk' => $this->input->post('jk'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'alamat' => $this->input->post('alamat'),
			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
			'siup_npwp' => $this->input->post('siup_npwp'),
			'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
			'email_klien' => $this->input->post('email')
		);
		$this->ma->ubahDataKlien($data, $id);
		$this->session->set_flashdata('success_message', 'Data Klien berhasil diubah');
		redirect('admin/lihatKlien');
	}

	public function ubahKlien($id)
	{
		$data['klien'] = $this->ma->tampilUbahKlien($id);

		$this->template->title = 'Klien';
		$this->template->page->title = 'Klien';
		$this->template->content->view('admin/ubah_klien', $data);
		$this->template->publish('layouts/back/base');
	}

	//karyawan

	public function lihatKaryawan()
	{

		$data['karyawan'] = $this->ma->tampilTabelKaryawan();

		$this->template->title = 'Karyawan';
		$this->template->page->title = 'Karyawan';
		$this->template->content->view('admin/karyawan', $data);
		$this->template->publish('layouts/back/base');
	}

	public function tambahKaryawan()
	{
		$this->template->title = 'Karyawan';
		$this->template->page->title = 'Karyawan';
		$this->template->content->view('admin/tambah_karyawan');
		$this->template->publish('layouts/back/base');
	}

	public function tambahKaryawanSubmit()
	{
		$data = array(
			'no_induk_advokat' => $this->input->post('no_induk_advokat'),
			'no_ktp' => $this->input->post('ktp'),
			'nama' => $this->input->post('nama'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'jk' => $this->input->post('jk'),
			'alamat' => $this->input->post('alamat'),
			'username' => $this->input->post('uname'),
			'password' => md5($this->input->post('pass')),
			'jabatan' => $this->input->post('jabatan'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'spesialis' => $this->input->post('spesialis')
		);
		$this->ma->tambahDataKaryawan($data);
		$this->session->set_flashdata('success_message', 'Data Karyawan Berhasil Ditambahkan');
		redirect('admin/lihatKaryawan');
	}

	public function ubahKaryawanSubmit($id)
	{
		$data = array(
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'jk' => $this->input->post('jk'),
			'alamat' => $this->input->post('alamat'),
			'username' => $this->input->post('uname'),
			'password' => md5($this->input->post('pass')),
			'jabatan' => $this->input->post('jabatan'),
			'email' => $this->input->post('email'),
			'telepon' => $this->input->post('telepon'),
			'spesialis' => $this->input->post('spesialis')
		);
		$this->ma->ubahDataKaryawan($data, $id);
		$this->session->set_flashdata('success_message', 'Data Karyawan Berhasil Diubah');
		redirect('admin/lihatKaryawan');
	}

	public function ubahKaryawan($id)
	{
		$data['karyawan'] = $this->ma->tampilUbahKaryawan($id);

		$this->template->title = 'Karyawan';
		$this->template->page->title = 'Karyawan';
		$this->template->content->view('admin/ubah_karyawan', $data);
		$this->template->publish('layouts/back/base');
	}


	//KHUSUS KELOLA perkara
	public function kelolaPerkara($id)
	{
		$data['perkara'] = $this->ma->kelolaPerkara($id);
		$data['detail'] = $this->ma->detailDataPerkara($id);
		$data['resume'] = $this->ma->resumeFilled($id);
		$data['dasar_hukum'] = $this->ma->dasarHukumFilled($id);
		$data['surat_kuasa'] = $this->ma->suratKuasaFilled($id, 'litigasi');
		$data['surat_kuasa_1'] = $this->ma->suratKuasaFilled($id, 'non-litigasi');
		$data['peringatan'] = $this->ma->peringatanFilled($id);
		$data['balasan'] = $this->ma->balasanFilled($id);
		$data['somasi'] = $this->ma->somasiFilled($id);
		$data['mediasi'] = $this->ma->mediasiFilled($id);
		$data['sidang1'] = $this->ma->persidanganFilled($id, '1');
		$data['sidang2'] = $this->ma->persidanganFilled($id, '2');
		$data['sidang3'] = $this->ma->persidanganFilled($id, '3');
		$data['sidang4'] = $this->ma->persidanganFilled($id, '4');
		$data['sidang5'] = $this->ma->persidanganFilled($id, '5');
		$data['sidang6'] = $this->ma->persidanganFilled($id, '6');
		$data['sidang7'] = $this->ma->persidanganFilled($id, '7');
		$data['sidang8'] = $this->ma->persidanganFilled($id, '8');
		$data['sidang9'] = $this->ma->persidanganFilled($id, '9');
		$data['sidang10'] = $this->ma->persidanganFilled($id, '10');
		$data['namaadvo1'] = $this->ma->advokatFilled($id, '1');
		$data['namaadvo2'] = $this->ma->advokatFilled($id, '2');
		$data['namaadvo3'] = $this->ma->advokatFilled($id, '3');
		$data['namaadvo4'] = $this->ma->advokatFilled($id, '4');
		$data['namaadvo5'] = $this->ma->advokatFilled($id, '5');
		$data['namaadvo6'] = $this->ma->advokatFilled($id, '6');
		$data['namaadvo7'] = $this->ma->advokatFilled($id, '7');
		$data['namaadvo8'] = $this->ma->advokatFilled($id, '8');
		$data['namaadvo9'] = $this->ma->advokatFilled($id, '9');
		$data['namaadvo10'] = $this->ma->advokatFilled($id, '10');
		$data['tim_perkara'] = $this->ma->viewTim($id);

		$this->template->title = 'Perkara';
		$this->template->page->title = 'Perkara';
		$this->template->content->view('admin/suratkuasaAdmin', $data);
		$this->template->publish('layouts/back/base');
	}

	public function rangkumanPerkara($id)
	{
		$data['rangkuman'] = $this->ma->resumePerkara($id);
		$data['perkara'] = $this->ma->kelolaPerkara($id);
		$data['resume'] = $this->ma->resumeFilled($id);
		$data['dasar_hukum'] = $this->ma->dasarHukumFilled($id);
		$data['surat_kuasa'] = $this->ma->suratKuasaFilled($id, 'litigasi');
		$data['surat_kuasa_1'] = $this->ma->suratKuasaFilled($id, 'non-litigasi');
		$data['peringatan'] = $this->ma->peringatanFilled($id);
		$data['balasan'] = $this->ma->balasanFilled($id);
		$data['somasi'] = $this->ma->somasiFilled($id);
		$data['mediasi'] = $this->ma->mediasiFilled($id);
		$data['sidang1'] = $this->ma->persidanganFilled($id, '1');
		$data['sidang2'] = $this->ma->persidanganFilled($id, '2');
		$data['sidang3'] = $this->ma->persidanganFilled($id, '3');
		$data['sidang4'] = $this->ma->persidanganFilled($id, '4');
		$data['sidang5'] = $this->ma->persidanganFilled($id, '5');
		$data['sidang6'] = $this->ma->persidanganFilled($id, '6');
		$data['sidang7'] = $this->ma->persidanganFilled($id, '7');
		$data['sidang8'] = $this->ma->persidanganFilled($id, '8');
		$data['sidang9'] = $this->ma->persidanganFilled($id, '9');
		$data['sidang10'] = $this->ma->persidanganFilled($id, '10');
		$data['namaadvo1'] = $this->ma->advokatFilled($id, '1');
		$data['namaadvo2'] = $this->ma->advokatFilled($id, '2');
		$data['namaadvo3'] = $this->ma->advokatFilled($id, '3');
		$data['namaadvo4'] = $this->ma->advokatFilled($id, '4');
		$data['namaadvo5'] = $this->ma->advokatFilled($id, '5');
		$data['namaadvo6'] = $this->ma->advokatFilled($id, '6');
		$data['namaadvo7'] = $this->ma->advokatFilled($id, '7');
		$data['namaadvo8'] = $this->ma->advokatFilled($id, '8');
		$data['namaadvo9'] = $this->ma->advokatFilled($id, '9');
		$data['namaadvo10'] = $this->ma->advokatFilled($id, '10');
		$data['tim_perkara'] = $this->ma->viewTim($id);

		$this->template->title = 'Perkara';
		$this->template->page->title = 'Perkara';
		$this->template->content->view('admin/rangkuman_perkara', $data);
		$this->template->publish('layouts/back/base');
	}

	public function downloadResume()
	{
		$filename = $this->input->get('filename');
		force_download('assets/berkas/' . $filename, NULL);
	}

	public function lihatTim()
	{
		$data['tim'] = $this->ma->viewTabelTim();

		$this->template->title = 'Tim Advokat';
		$this->template->page->title = 'Tim Advokat';
		$this->template->content->view('admin/lihat_tim', $data);
		$this->template->publish('layouts/back/base');
	}

	public function skNonLitigasiSubmit()
	{
		$id_perkara = $this->input->post('id_perkara');
		$config['upload_path'] = FCPATH . "assets/berkas";
		$config['allowed_types'] = 'pdf|jpeg|jpg|docx';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload("surat_kuasa")) {
			$udata = $this->upload->data();
			$data = array(
				'id_perkara' => $this->input->post('id_perkara'),
				'jenis_sk' => $this->input->post('jenis_skNon'),
				'file' => $udata["file_name"]
			);
			$this->ma->tambahDataSuratKuasa($data);
			$this->session->set_flashdata('success_message', 'Surat Kuasa Non-Litigasi Berhasil Ditambahkan');
			redirect('admin/kelolaPerkara/' . $id_perkara);
		} else {
			echo $this->upload->display_errors();
			echo "gagal";
		}
	}

	public function skLitigasiSubmit()
	{
		$id_perkara = $this->input->post('id_perkara');
		$config['upload_path'] = FCPATH . "assets/berkas";
		$config['allowed_types'] = 'pdf|jpeg|jpg|docx';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload("surat_kuasa")) {
			$udata = $this->upload->data();
			$data = array(
				'id_perkara' => $this->input->post('id_perkara'),
				'jenis_sk' => $this->input->post('jenis_skLit'),
				'file' => $udata["file_name"]
			);
			$this->ma->tambahDataSuratKuasa($data);
			$this->session->set_flashdata('success_message', ' Surat Kuasa Litigasi Berhasil Ditambahkan');
			redirect('admin/kelolaPerkara/' . $id_perkara);
		} else {
			echo $this->upload->display_errors();
			echo "gagal";
		}
	}
	// KHUSUS KELOLA PERKARA surat kuasa

	public function lihatJadwal()
	{
		$data['jadwal'] = $this->ma->jadwalsidang();

		$this->template->title = 'Jadwal Sidang';
		$this->template->page->title = 'Jadwal Sidang';
		$this->template->content->view('admin/jadwal', $data);
		$this->template->publish('layouts/back/base');
	}

	// KHUSUS KEUANGAN

	public function lihatKeuangan()
	{
		$data['pembayaran'] = $this->ma->tampilDataKeuangan();
		$data['laba'] = $this->ma->tampilTabelLaba();

		$this->template->title = 'Keuangan';
		$this->template->page->title = 'Keuangan';
		$this->template->content->view('admin/keuangan', $data);
		$this->template->publish('layouts/back/base');
	}

	public function tambahKeuangan()
	{
		$data['perkara'] = $this->ma->tampilDataPerkaraOnprocess();

		$this->template->title = 'Keuangan';
		$this->template->page->title = 'Keuangan';
		$this->template->content->view('admin/tambah_keuangan', $data);
		$this->template->publish('layouts/back/base');
	}

	public function tambahKeuanganSubmit()
	{
		$tgl_transaksi = $this->input->post('tgl_transaksi');
		$nominal = $this->input->post('nominal');
		$keterangan = $this->input->post('keterangan');
		$perkara = $this->input->post('id_perkara');
		if (empty($tgl_transaksi) || empty($nominal) || empty($keterangan) || empty($perkara)) {
			$this->session->set_flashdata('error_message', 'Harap masukkan data dengan benar!');
			redirect('admin/tambahKeuangan');
		} else {
			$data = array(
				'tgl_transaksi' => $tgl_transaksi,
				'nominal' => $nominal,
				'keterangan' => $keterangan,
				'id_perkara' => $perkara
			);
			$insert1 = $this->ma->tambahDataKeuangan($data);
			//isi ke laba
			$data1 = array(
				'id_pembayaran' => $insert1,
				'nominal' => $this->input->post('laba')
			);
			$insert = $this->ma->tambahLaba($data1);
			//isi ke honor
			$karyawan = $this->ma->viewTim($perkara);
			foreach ($karyawan as $k) {
				$data2 = array(
					'id_karyawan' => $k->id_karyawan,
					'id_pembayaran' => $insert1,
					'nominal' => $this->input->post('honor'),
					'keterangan' => $keterangan
				);
				$insert = $this->ma->tambahHonor($data2);
			}
			$this->session->set_flashdata('success_message', ' Transaksi Berhasil diInputkan');
			redirect('admin/lihatKeuangan');
		}
	}
	// KHUSUS KEUANGAN

	// persidangan

	public function tambahDataPersidanganSubmit()
	{
		$config = [
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'buyandpartners@gmail.com', // isi dengan email gmail
			'smtp_pass' => 'passGmailLawfirm', // password gmail
			'smtp_port' => 465,
			'crlf' => "\r\n",
			'newline' => "\r\n"
		];
		$this->load->library('email', $config);
		$tgl_sidang = $this->input->post('tgl_sidang');
		$jam_sidang = $this->input->post('jam_sidang');
		$jam_selesai_sidang = $this->input->post('jam_sidang_selesai');
		$lokasi_pn = $this->input->post('pn');
		$id_perkara = $this->input->post('id_perkara');
		$data = array(
			'sidang_ke' => $this->input->post('sidang_ke'),
			'tgl_sidang' => $tgl_sidang,
			'jam_sidang' => $jam_sidang,
			'jam_selesai_sidang' => $jam_selesai_sidang,
			'lokasi_pn' => $lokasi_pn
		);
		$id_persidangan = $this->ma->tambahDataPersidangan($data);
		// Masukkan daftar advokat yang ditugaskan dalam sidang
		$advokat = $this->input->post('nama_advokat');
		$is_not_benturan = true;
		for ($i = 0; $i < count($advokat); $i++) {
			// Cek apakah jadwal kosong atau advokat yang ditugaskan tidak berbenturan jadwalnya dengan persidangan lain
			if ($this->ma->cekBenturanJadwalSidang($advokat[$i], $data['tgl_sidang'], $data['jam_sidang'], $data['jam_selesai_sidang']) > 0) {
				$this->session->set_flashdata('ERROR', 'JADWAL ADVOKAT BENTROK');
				$is_not_benturan = false;
				redirect('admin/kelolaPerkara/' . $id_perkara);
			}
		}
		$klien = $this->db->where('id_perkara', $this->input->post('id_perkara'))->get('view_perkara')->row_array();
		if ($is_not_benturan) {
			for ($i = 0; $i < count($advokat); $i++) {
				$where = array('jabatan' => 'ADV', 'nama' => $advokat[$i]);
				$id_karyawan = $this->db->where($where)->get('karyawan')->row_array();
				$data = array(
					'id_perkara' => $this->input->post('id_perkara'),
					'id_persidangan' => $id_persidangan,
					'id_karyawan' => $id_karyawan['id_karyawan']
				);
				$this->ma->tambahAdvoSidang($data);
				// Kirim email ke masing-masing advokat
				$this->email->from('buyandpartners@gmail.com', 'Buyung LAWFIRM | ADMIN');
				$this->email->to($id_karyawan['email']);
				$this->email->subject('Undangan Tugas Persidangan');
				$this->email->message("Kepada YTH Advokat " . $id_karyawan['nama'] . "<br> Kami mengundang untuk hadir dalam persidangan dengan detail sebagai berikut : <br> Tanggal Persidangan : " . $tgl_sidang . "<br> Jam Mulai Sidang : " . $jam_sidang . "<br> Jam Selesai Sidang : " . $jam_selesai_sidang . "<br> Lokasi PN : " . $lokasi_pn . "<br> Nama Klien : " . $klien['nama_klien'] . "<br> <br> Atas Perhatiannya, Kami ucapkan Terima Kasih dan Selamat Bekerja !");
				if ($this->email->send()) {
				} else {
					$this->session->set_flashdata('ERROR', $this->email->print_debugger());
					redirect('admin/kelolaPerkara/' . $id_perkara);
				}
			}
		}
		//Kirim email ke klien

		$this->email->from('buyandpartners@gmail.com', 'Buyung LAWFIRM | ADMIN');
		$this->email->to($klien['email_klien']);
		$this->email->subject('Undangan Hadir Persidangan');
		$this->email->message("Kepada YTH Klien " . $klien['nama_klien'] . "<br> Kami mengundang untuk hadir dalam persidangan dengan detail sebagai berikut : <br><br> Tanggal Persidangan : " . $tgl_sidang . " <br> Jam Mulai Sidang : " . $jam_sidang . "<br> Jam Selesai Sidang : " . $jam_selesai_sidang . "<br> Lokasi PN : " . $lokasi_pn . "<br> Dengan advokat yang bertugas adalah sebagai berikut : <ol><li>" . implode('</li><li>', $advokat) . "</li></ol>Atas Perhatiannya, Kami ucapkan Terima Kasih. ");
		if ($this->email->send()) {
		} else {
			$this->session->set_flashdata('ERROR', $this->email->error());
			redirect('admin/kelolaPerkara/' . $id_perkara);
		}
		$this->session->set_flashdata('success_message', 'Data Persidangan Berhasil Ditambahkan');
		redirect('admin/kelolaPerkara/' . $id_perkara);
	}
	// persidangan

	// somasi

	public function somasiSubmit()
	{
		$id_perkara = $this->input->post('id_perkara');
		$config['upload_path'] = FCPATH . "assets/berkas";
		$config['allowed_types'] = 'pdf|jpeg|jpg|docx';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload("surat_peringatan")) {
			$udata = $this->upload->data();
			$data = array(
				'id_perkara' => $this->input->post('id_perkara'),
				'tgl_terbit_surat_peringatan' => $this->input->post('tgl_terbit_surat_peringatan'),
				'file_surat_peringatan' => $udata["file_name"]
			);
			$this->ma->tambahDataSomasi($data);
			$this->session->set_flashdata('success_message', 'Surat Peringatan Berhasil Ditambahkan');
			redirect('admin/kelolaPerkara/' . $id_perkara);
		} else {
			echo $this->upload->display_errors();
			echo "gagal";
		}
	}

	public function somasiSuratBalasan($id)
	{
		$id_perkara = $this->input->post('id_perkara');
		$config['upload_path'] = FCPATH . "assets/berkas";
		$config['allowed_types'] = 'pdf|jpeg|jpg|docx';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload("surat_balasan")) {
			$udata = $this->upload->data();
			$data = array(
				'tgl_surat_balasan' => $this->input->post('tgl_terima_surat_balasan'),
				'status' => $this->input->post('status_somasi'),
				'notulen_somasi' => $this->input->post('notulen_somasi'),
				'file_surat_balasan' => $udata["file_name"]
			);
			$this->ma->ubahDataSomasiBalasan($data, $id);
			// echo $this->db->last_query();die;
			$this->session->set_flashdata('success_message', 'Surat Balasan Berhasil Ditambahkan');
			redirect('admin/kelolaPerkara/' . $id_perkara);
		} else {
			echo $this->upload->display_errors();
			echo "gagal";
		}
	}

	public function somasiAktaDamai($id)
	{
		$id_perkara = $this->input->post('id_perkara');
		$config['upload_path'] = FCPATH . "assets/berkas";
		$config['allowed_types'] = 'pdf|jpeg|jpg|docx';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload("file_somasi")) {
			$udata = $this->upload->data();
			$data = array(
				'file_somasi' => $udata["file_name"]
			);
			$this->ma->ubahDataSomasiAktaDamai($data, $id);
			$dataPerkara = array(
				'status' => 'putusan'
			);
			$this->ma->ubahDataPerkara($dataPerkara, $id);
			$this->session->set_flashdata('success_message', 'Akta Damai Berhasil Ditambahkan');
			redirect('admin/kelolaPerkara/' . $id_perkara);
		} else {
			echo $this->upload->display_errors();
			echo "gagal";
		}
	}

	// somasi

	// mediasi PN

	public function mediasiSubmit()
	{
		$id = $this->input->post('id_perkara');
		$config['upload_path'] = FCPATH . "assets/berkas";
		$config['allowed_types'] = 'pdf|jpeg|jpg|docx';
		$config['overwrite'] = TRUE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload("akta_damai")) {
			$udata = $this->upload->data();
			$data = array(
				'id_perkara' => $this->input->post('id_perkara'),
				'status' => $this->input->post('status'),
				'akta_damai' => $udata["file_name"],
				'keterangan' => $this->input->post('keterangan')
			);
			$this->ma->tambahDataMediasi($data, $id);
			$dataPerkara = array(
				'status' => 'putusan'
			);
			$this->ma->ubahDataPerkara($dataPerkara, $id);
		} else {
			$data = array(
				'id_perkara' => $this->input->post('id_perkara'),
				'status' => $this->input->post('status'),
				'keterangan' => $this->input->post('keterangan')
			);
			$this->ma->tambahDataMediasi($data);
		}
		$this->session->set_flashdata('success_message', 'Data Mediasi Berhasil Ditambahkan');
		redirect('admin/kelolaPerkara/' . $id);
	}
	// mediasi PN

	public function lihatKonsultasi()
	{

		$data['konsultasi'] = $this->ma->tampilTabelKonsultasi();

		$this->template->title = 'Konsultasi';
		$this->template->page->title = 'Konsultasi';
		$this->template->content->view('admin/konsultasi', $data);
		$this->template->publish('layouts/back/base');
	}
}
