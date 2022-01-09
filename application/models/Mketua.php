<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MKetua extends CI_Model {

  //KHUSUS PERKARA

  public function tampilDataPerkaraKetua()
  {
    $query = "SELECT
      perkara.*,
      klien.nama_klien
      FROM
      perkara
      INNER JOIN klien ON perkara.id_klien = klien.id_klien";
    return $this->db->query($query)->result();
  }

  public function kelolaPerkara($id)
  {
    $this->db->where('id_perkara',$id);
    return $this->db->get('perkara')->row();
  }

  public function dasarHukumFilled($id)
  {
    $this->db->where('id_perkara',$id);
    return $this->db->get('dasar_hukum')->row();
  }

  public function suratKuasaFilled($id, $jenis_sk)
  {
    $where = array('id_perkara' => $id, 'jenis_sk' => $jenis_sk);
    $this->db->where($where);
    return $this->db->get('surat_kuasa')->result();
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

  public function resumeFilled($id)
  {
    $this->db->where('id_perkara',$id);
    return $this->db->get('perkara')->row();
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

public function viewTim($data)
  {
    $query = "SELECT * FROM view_team_perkara WHERE id_perkara = $data";
    return $this->db->query($query)->result();
  }

  public function resumePerkara($data)
  {
    $query = "SELECT * FROM view_resume_perkara WHERE id_perkara = $data";
    return $this->db->query($query)->row();
  }

  // KHUSUS PERKARA


 // KHUSUS KLIEN

  public function tampilDataKlienKetua()
  {
    return $this->db->get('klien')->result();
  }
 // KHUSUS KLIEN

// KARYAWAN

  public function tampilTabelKaryawan()
  {
    return $this->db->get('karyawan')->result();
  }

// KARYAWAN

// KHUSUS PEMILIHAN TIM
  
  public function tampilDataAdvokatTim()
  {
    $query = "SELECT
    *
  FROM
    (
      SELECT
        karyawan.id_karyawan,
        karyawan.nama,
        COUNT(perkara. STATUS) AS BEBAN
      FROM
        karyawan
      INNER JOIN detail_perkara ON detail_perkara.id_karyawan = karyawan.id_karyawan
      LEFT JOIN perkara ON detail_perkara.id_perkara = perkara.id_perkara
      AND perkara. STATUS = 'onprocess'
      GROUP BY
        karyawan.nama
    ) AS tmp
  WHERE
    beban < 3";
   return $this->db->query($query)->result();
  }

  public function tambahTim($data)
  {
    $this->db->insert('detail_perkara', $data);
  }

  public function viewTabelTim()
  {
    $queryTim = "SELECT * FROM view_team_perkara ";
    return $this->db->query($queryTim)->result();
  }

  // KHUSUS KEUANGAN

  public function tampilDataKeuanganKetua() 
  {
    $query1 = " SELECT pembayaran.tgl_transaksi, pembayaran.nominal, pembayaran.keterangan, pembayaran.id_pembayaran,
            pembayaran.id_perkara, perkara.judul FROM pembayaran
            INNER JOIN perkara ON pembayaran.id_perkara = perkara.id_perkara";

    return $this->db->query($query1)->result();
  }

  public function tampilTabelLaba()
  {
     return $this->db->get('tampilTransMasuk')->result();
  }

  // dashboard

  public function dashboardPerkaraAktif() 
  {
    $query = "SELECT Count(perkara.id_perkara) as aktif FROM perkara WHERE perkara.`status` = 'onprocess'";
    return $this->db->query($query)->row();
  }

  public function dashboardPerkaraNonAktif() 
  {
    $query = "SELECT Count(perkara.id_perkara) as nonaktif FROM perkara WHERE perkara.`status` = 'nonaktif'";
    return $this->db->query($query)->row();
  }

  public function dashboardPerkaraPutus() 
  {
    $query = "SELECT Count(perkara.id_perkara) as putus FROM perkara WHERE perkara.`status` = 'putus'";
    return $this->db->query($query)->row();
  }

  public function dashboardPerkara() 
  {
    $query = "SELECT Count(perkara.id_perkara) as allperkara FROM perkara ";
    return $this->db->query($query)->row();
  }

  public function adaSidangToday() 
  {
    $query = "SELECT
      persidangan.id_persidangan,
      persidangan.sidang_ke,
      persidangan.tgl_sidang,
      persidangan.jam_sidang,
      persidangan.jam_selesai_sidang,
      persidangan.lokasi_pn
      FROM persidangan WHERE persidangan.tgl_sidang = date(NOW())";
    return $this->db->query($query)->result();
  }

  // dashboard

  // KONSULTASI
  public function tampilTabelKonsultasi()
    {
        return $this->db->get('view_konsultasi')->result();
    }
}
