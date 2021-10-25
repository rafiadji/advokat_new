<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAdvokat extends CI_Model {

  //KHUSUS PERKARA
  public function tampilDataPerkaraAdvokat($username)
  {
    $query = "SELECT
      perkara.nomor_perkara,
      perkara.judul,
      klien.nama_klien,
      perkara.tgl_daftar_perkara,
      perkara.kategori,
      perkara.tergugat,
      perkara.nomor_putusan,
      perkara.tgl_putusan,
      perkara.amar,
      perkara.id_perkara,
      perkara.`status`,
      karyawan.username
      FROM
      perkara
      INNER JOIN klien ON perkara.id_klien = klien.id_klien
      INNER JOIN detail_perkara ON detail_perkara.id_perkara = perkara.id_perkara
      INNER JOIN karyawan ON detail_perkara.id_karyawan = karyawan.id_karyawan
      WHERE perkara.status = 'onprocess' AND karyawan.username = '$username'";
    return $this->db->query($query)->result();
  }
  
  public function tampilDataPerkaraAdvokatPutus($username)
  {
    $query = "SELECT
      perkara.nomor_perkara,
      perkara.judul,
      klien.nama_klien,
      perkara.tgl_daftar_perkara,
      perkara.kategori,
      perkara.tergugat,
      perkara.nomor_putusan,
      perkara.tgl_putusan,
      perkara.amar,
      perkara.id_perkara,
      perkara.`status`,
      karyawan.username
      FROM
      perkara
      INNER JOIN klien ON perkara.id_klien = klien.id_klien
      INNER JOIN detail_perkara ON detail_perkara.id_perkara = perkara.id_perkara
      INNER JOIN karyawan ON detail_perkara.id_karyawan = karyawan.id_karyawan
      WHERE perkara.status = 'putusan' AND karyawan.username = '$username'";
    return $this->db->query($query)->result();
  }
  public function detailDataPerkara($id) 
  {
    $query = "SELECT perkara.id_perkara, perkara.judul, klien.nama_klien, perkara.tgl_daftar_perkara, perkara.jenis_perkara, perkara.status
              FROM perkara INNER JOIN klien ON perkara.id_klien = klien.id_klien WHERE perkara.id_perkara = '$id'";
    return $this->db->query($query)->row();
  }
  // KHUSUS PERKARA

  // KHUSUS PENGELOLAAN PERKARA
  public function kelolaPerkara($id)
  {
    $this->db->where('id_perkara',$id);
    return $this->db->get('perkara')->row();
  }

  public function ubahDataPerkara($data, $id)
  {
    $this->db->where('id_perkara',$id);
    return $this->db->update('perkara', $data);
  }

  public function resumeFilled($id)
  {
    $this->db->where('id_perkara',$id);
    return $this->db->get('perkara')->row();
  }

  public function resumePerkara($data)
  {
    $query = "SELECT * FROM view_resume_perkara WHERE id_perkara = $data";
    return $this->db->query($query)->row();
  }

  public function tambahDataSuratKuasa($data)
  {
    $this->db->insert('surat_kuasa', $data);
  }

  public function suratKuasaFilled($id, $jenis_sk)
  {
    $where = array('id_perkara' => $id, 'jenis_sk' => $jenis_sk);
    $this->db->where($where);
    return $this->db->get('surat_kuasa')->result();
  }

   public function dasarHukumFilled($id)
  {
    $this->db->where('id_perkara',$id);
    return $this->db->get('dasar_hukum')->row();
  }

  public function peringatanFilled($id)
  {
    $this->db->where('id_perkara',$id)->where('tgl_terbit_surat_peringatan <>', NULL)->where('file_surat_peringatan <>', NULL);
    return $this->db->get('somasi')->row();
  }

  public function balasanFilled($id)
  {
    $this->db->where('id_perkara',$id)->where('tgl_terbit_surat_peringatan <>', NULL)->where('file_surat_peringatan <>', NULL);
    $this->db->where('tgl_surat_balasan <>', NULL)->where('file_surat_balasan <>', NULL);
    return $this->db->get('somasi')->row();
  }

  public function somasiFilled($id)
  {
    $this->db->where('id_perkara', $id);
    $this->db->where('file_somasi <>', NULL);
    return $this->db->get('somasi')->row();
  }

  public function mediasiFilled($id)
  {
    $this->db->where('id_perkara',$id);
    return $this->db->get('mediasi')->row();
  }

  public function tambahDataMediasi($data)
  {
    $this->db->insert('mediasi', $data);
  }


  // SOMASI
  public function tambahDataSomasi($data)
  {
    $this->db->insert('somasi', $data);
  }

  public function ubahDataSomasiBalasan($data, $id)
  {
    $this->db->where('id_perkara',$id);
    return $this->db->update('somasi', $data);
  }

  public function ubahDataSomasiAktaDamai($data, $id)
  {
    $this->db->where('id_perkara',$id);
    return $this->db->update('somasi', $data);
  }

  //SOMASI

  public function tambahDataDasarHukum($data)
  {
    $this->db->insert('dasar_hukum', $data);
  }

  public function advokatFilled($id, $sidang_ke)
  {
    $advokat = array();
    $where = array('id_perkara' => $id, 'sidang_ke' => $sidang_ke);
    $data = $this->db->where($where)->get('view_persidangan_in_detail')->result();
    foreach ($data as $d){
      $advokat[] = $d->nama;
    }
    return $advokat;
  }

  public function persidanganFilled($id, $sidang_ke)
  {
    $where = array('id_perkara' => $id, 'sidang_ke' => $sidang_ke);
    return $this->db->where($where)->get('view_persidangan_in_detail')->row();
  }

  public function ubahDataSidang($data, $id)
  {
    $this->db->where('id_persidangan', $id);
    return $this->db->update('persidangan', $data);
  }

  public function viewTim($data)
  {
    $query = "SELECT * FROM view_team_perkara WHERE id_perkara = $data";
    return $this->db->query($query)->result();
  }

  public function viewTabelTim()
  {
    $queryTim = "SELECT * FROM view_team_perkara "; 
  }
  // KHUSUS PENGELOLAAN PERKARA

  // KHUSUS KEUANGAN 

  public function tampilDataKeuanganAdvo($username) 
  {
    $query1 = " SELECT
      pembayaran.tgl_transaksi,
      honorarium.nominal,
      honorarium.keterangan
      FROM
      pembayaran
      INNER JOIN honorarium ON honorarium.id_pembayaran = pembayaran.id_pembayaran
      INNER JOIN karyawan ON honorarium.id_karyawan = karyawan.id_karyawan WHERE karyawan.username = '$username'";

    return $this->db->query($query1)->result();
  }

  // KHUSUS KEUANGAN

  public function adaSidangToday($username) 
  {
    $query = "SELECT
      persidangan.id_persidangan,
      persidangan.sidang_ke,
      persidangan.tgl_sidang,
      persidangan.jam_sidang,
      persidangan.jam_selesai_sidang,
      persidangan.lokasi_pn,
      karyawan.username
      FROM
      persidangan
      INNER JOIN detail_penugasan_persidangan ON detail_penugasan_persidangan.id_persidangan = persidangan.id_persidangan
      INNER JOIN karyawan ON detail_penugasan_persidangan.id_karyawan = karyawan.id_karyawan WHERE persidangan.tgl_sidang = date(NOW()) AND karyawan.username = '$username'";
    return $this->db->query($query)->result();
  }

  public function jadwalsidang($username) 
  {
    $query = "SELECT
        view_persidangan_in_detail.sidang_ke,
        view_persidangan_in_detail.judul,
        view_persidangan_in_detail.nama_klien,
        view_persidangan_in_detail.tgl_sidang,
        view_persidangan_in_detail.jam_sidang,
        view_persidangan_in_detail.jam_selesai_sidang,
        view_persidangan_in_detail.lokasi_pn,
        view_persidangan_in_detail.nama,
        view_persidangan_in_detail.username
        FROM
        view_persidangan_in_detail
        where view_persidangan_in_detail.username = '$username' AND MONTH(view_persidangan_in_detail.tgl_sidang) = MONTH(CURDATE())
        ORDER BY view_persidangan_in_detail.tgl_sidang DESC ";
    return $this->db->query($query)->result();
  }

  public function tampilTabelKonsultasi()
  {
      $this->db->where('tanggal_konsul >= DATE(NOW()) AND tanggal_konsul < DATE(NOW()+interval 1 day)');
      return $this->db->get('view_konsultasi')->result();
  }

  public function dataKonsultasi($id)
  {
      $this->db->where('id_konsultasi', $id);
      return $this->db->get('view_konsultasi')->row();
  }
}
