<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Madmin extends CI_Model
{
    // KHUSUS PERKARA

    public function tampilDataPerkara()
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
      perkara.status FROM
      perkara
      INNER JOIN klien ON perkara.id_klien = klien.id_klien 
      WHERE perkara.status = 'onprocess' AND YEAR(perkara.tgl_daftar_perkara) = YEAR(CURDATE())";
        return $this->db->query($query)->result();
    }

    public function tampilDataPerkaraOnprocess()
    {
        return $this->db->get('view_perkaraonprocess')->result();
    }

    public function tampilDataPerkaraPutusan()
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
      perkara.status  FROM
      perkara
      INNER JOIN klien ON perkara.id_klien = klien.id_klien 
      WHERE perkara.status = 'putusan' AND YEAR(perkara.tgl_daftar_perkara) = YEAR(CURDATE())";
        return $this->db->query($query)->result();
    }

    public function tampilLaporanPerkaraPutus()
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
      perkara.status  FROM
      perkara
      INNER JOIN klien ON perkara.id_klien = klien.id_klien 
      WHERE perkara.status = 'putusan' AND YEAR(perkara.tgl_daftar_perkara) = YEAR(CURDATE())";
        return $this->db->query($query)->result();
    }

    public function tampilDataPerkaraPasif()
    {
        $query = "SELECT perkara.id_perkara, perkara.judul, perkara.tgl_daftar_perkara, perkara.jenis_perkara, perkara.legal_opini, perkara.status, perkara.keterangan,
            klien.nama_klien FROM klien INNER JOIN perkara ON perkara.id_klien = klien.id_klien WHERE perkara.status = 'nonaktif' AND YEAR(perkara.tgl_putusan) = YEAR(CURDATE())";
        return $this->db->query($query)->result();
    }

    public function tampilDataPerkaraPutus()
    {
        return $this->db->get('view_perkaraputus')->result();
    }

    public function tambahDataPerkara($data)
    {
        $this->db->insert('perkara', $data);
    }

    public function ubahDataPerkara($data, $id)
    {
        $this->db->where('id_perkara', $id);
        return $this->db->update('perkara', $data);
    }

    public function hapusDataPerkara($id)
    {
        $this->db->where('id_perkara', $id);
        return $this->db->delete('perkara');
    }

    public function detailDataPerkara($id)
    {
        $query = "SELECT perkara.id_perkara, perkara.judul, klien.nama_klien, perkara.tgl_daftar_perkara, perkara.jenis_perkara, perkara.status
              FROM perkara INNER JOIN klien ON perkara.id_klien = klien.id_klien WHERE perkara.id_perkara = '$id'";
        return $this->db->query($query)->row();
    }

    public function tambahDataDasarHukum($data)
    {
        $this->db->insert('dasar_hukum', $data);
    }

    public function nonaktifPerkara($data, $id)
    {
        $this->db->where('id_perkara', $id);
        return $this->db->update('perkara', $data);
    }

    public function viewNonaktif($id)
    {
        $this->db->where('id_perkara', $id);
        return $this->db->get('perkara')->row();
    }

    // KHUSUS PERKARA


    // KHUSUS KLIEN

    public function tampilDataKlien()
    {
        return $this->db->get('klien')->result();
    }

    public function tambahDataKlien($data)
    {
        $this->db->insert('klien', $data);
    }

    public function ubahDataKlien($data, $id)
    {
        $this->db->where('id_klien', $id);
        return $this->db->update('klien', $data);
    }

    public function tampilUbahKlien($id)
    {
        $this->db->where('id_klien', $id);
        return $this->db->get('klien')->row();
    }

    // KHUSUS KLIEN

    // KHUSUS SURAT KUASA

    public function kelolaPerkara($id)
    {
        $this->db->where('id_perkara', $id);
        return $this->db->get('perkara')->row();
    }

    public function kelolaPerkaraPutus($id)
    {
        $this->db->where('id_perkara', $id);
        return $this->db->get('perkara')->row();
    }

    public function tambahDataSuratKuasa($data)
    {
        $this->db->insert('surat_kuasa', $data);
    }

    public function dasarHukumFilled($id)
    {
        $this->db->where('id_perkara', $id);
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
        $this->db->where('id_perkara', $id)->where('tgl_terbit_surat_peringatan <>', NULL)->where('file_surat_peringatan <>', NULL);
        return $this->db->get('somasi')->row();
    }

    public function balasanFilled($id)
    {
        $this->db->where('id_perkara', $id)->where('tgl_terbit_surat_peringatan <>', NULL)->where('file_surat_peringatan <>', NULL);
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
        $this->db->where('id_perkara', $id);
        return $this->db->get('mediasi')->row();
    }

    public function resumeFilled($id)
    {
        $this->db->where('id_perkara', $id);
        return $this->db->get('perkara')->row();
    }

    public function resumePerkara($data)
    {
        $this->db->where('id_perkara', $data);
        return $this->db->get('view_resume_perkara')->row();
    }

    public function advokatFilled($id, $sidang_ke)
    {
        $advokat = array();
        $where = array('id_perkara' => $id, 'sidang_ke' => $sidang_ke);
        $data = $this->db->where($where)->get('view_persidangan_in_detail')->result();
        foreach ($data as $d) {
            $advokat[] = $d->nama;
        }
        return $advokat;
    }

    public function persidanganFilled($id, $sidang_ke)
    {
        $where = array('id_perkara' => $id, 'sidang_ke' => $sidang_ke);
        return $this->db->where($where)->get('view_persidangan_in_detail')->row();
    }

    //KARYAWAN
    public function tampilTabelKaryawan()
    {
        return $this->db->get('karyawan')->result();
    }

    public function tambahDataKaryawan($data)
    {
        $this->db->insert('karyawan', $data);
    }

    public function ubahDataKaryawan($data, $id)
    {
        $this->db->where('id_karyawan', $id);
        return $this->db->update('karyawan', $data);
    }

    public function tampilUbahKaryawan($id)
    {
        $this->db->where('id_karyawan', $id);
        return $this->db->get('karyawan')->row();
    }
    //karyawan

    // KHUSUS SURAT KUASA


    // KHUSUS KEUANGAN

    public function tampilDataKeuangan()
    {
        $query1 = " SELECT pembayaran.tgl_transaksi, pembayaran.nominal, pembayaran.keterangan, pembayaran.id_pembayaran,
            pembayaran.id_perkara, perkara.judul FROM pembayaran
            INNER JOIN perkara ON pembayaran.id_perkara = perkara.id_perkara";

        return $this->db->query($query1)->result();
    }

    public function tambahDataKeuangan($data)
    {
        $this->db->insert('pembayaran', $data);
        return $this->db->insert_id();
    }

    public function tambahLaba($data)
    {
        $this->db->insert('trans_masuk', $data);
    }

    public function tambahHonor($data)
    {
        $this->db->insert('honorarium', $data);
    }

    public function tampilTabelLaba()
    {
        return $this->db->get('tampilTransMasuk')->result();
    }



    // KHUSUS KEUANGAN

    // persidangan

    public function tambahDataPersidangan($data)
    {
        $this->db->insert('persidangan', $data);
        return $this->db->insert_id();
    }

    public function cekBenturanJadwalSidang($nama_advo, $tgl_sidang, $jam_mulai, $jam_selesai)
    {
        $query = "SELECT * FROM view_email_jadwal WHERE nama = '$nama_advo' AND tgl_sidang = '$tgl_sidang' AND
            (((jam_sidang < '$jam_mulai' AND jam_selesai_sidang > '$jam_mulai') OR (jam_sidang < '$jam_selesai' AND 
            jam_selesai_sidang > '$jam_selesai')) OR (jam_sidang = '$jam_mulai' OR jam_selesai_sidang = '$jam_selesai'))";

        return $this->db->query($query)->num_rows();
    }

    public function viewTim($data)
    {
        $query = "SELECT * FROM view_team_perkara WHERE id_perkara = $data";
        return $this->db->query($query)->result();
    }

    public function tambahAdvoSidang($data)
    {
        $this->db->insert('detail_penugasan_persidangan', $data);
    }

    public function viewTabelTim()
    {
        $queryTim = "SELECT * FROM view_team_perkara ";
        return $this->db->query($queryTim)->result();
    }


    // persidangan

    // somasi

    public function tambahDataSomasi($data)
    {
        $this->db->insert('somasi', $data);
    }

    public function ubahDataSomasiBalasan($data, $id)
    {
        $this->db->where('id_perkara', $id);
        return $this->db->update('somasi', $data);
    }

    public function ubahDataSomasiAktaDamai($data, $id)
    {
        $this->db->where('id_perkara', $id);
        return $this->db->update('somasi', $data);
    }

    // somasi

    // mediasi PN

    public function tambahDataMediasi($data)
    {
        $this->db->insert('mediasi', $data);
    }

    // mediasi PN
    public function dashboardPerkara()
    {
        $q = "SELECT Count(perkara.id_perkara) as allperkara FROM perkara";
        return $this->db->query($q)->row();
    }

    public function dashboardPerkaraAktif()
    {
        $q = "SELECT Count(perkara.id_perkara) as aktif FROM perkara WHERE perkara.`status` = 'onprocess'";
        return $this->db->query($q)->row();
    }

    public function dashboardPerkaraNonAktif()
    {
        $q = "SELECT Count(perkara.id_perkara) as nonaktif FROM perkara WHERE perkara.`status` = 'nonaktif'";
        return $this->db->query($q)->row();
    }

    public function dashboardPerkaraPutus()
    {
        $q = "SELECT Count(perkara.id_perkara) as putus FROM perkara WHERE perkara.`status` = 'putusan'";
        return $this->db->query($q)->row();
    }

    public function dashboardPerkaratdkAktif()
    {
        $q = "SELECT * FROM view_perkara WHERE view_perkara.`status` = 'nonaktif' ";
        return $this->db->query($q)->result();
    }

    public function adaSidangToday()
    {
        $q = "SELECT
            persidangan.id_persidangan,
            persidangan.sidang_ke,
            persidangan.tgl_sidang,
            persidangan.jam_sidang,
            persidangan.jam_selesai_sidang,
            persidangan.lokasi_pn
            FROM persidangan WHERE persidangan.tgl_sidang = date(NOW())";
        return $this->db->query($q)->result();
    }

    public function jadwalsidang()
    {
        $query = "SELECT
        view_persidangan_in_detail.sidang_ke,
        view_persidangan_in_detail.judul,
        view_persidangan_in_detail.nama_klien,
        view_persidangan_in_detail.tgl_sidang,
        view_persidangan_in_detail.jam_sidang,
        view_persidangan_in_detail.jam_selesai_sidang,
        view_persidangan_in_detail.lokasi_pn,
        view_persidangan_in_detail.nama
        FROM
        view_persidangan_in_detail
        where MONTH(view_persidangan_in_detail.tgl_sidang) = MONTH(CURDATE())
        ORDER BY view_persidangan_in_detail.tgl_sidang DESC";
        return $this->db->query($query)->result();
    }


    // konsultasi
    public function tampilTabelKonsultasi($id = NULL)
    {
        if(isset($id)){
            $this->db->where('id_konsultasi', $id);
            return $this->db->get('view_konsultasi')->row();
        }
        else {
            return $this->db->get('view_konsultasi')->result();
        }
    }
    
    public function settingKonsultasi($data, $id)
    {
        $this->db->where('id_konsultasi', $id);
        return $this->db->update('konsultasi', $data);
    }

    
}
