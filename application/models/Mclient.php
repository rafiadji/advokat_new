<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mclient extends CI_Model
{
    public function client_baru($data)
    {
        $this->db->insert('calon_klien', $data);
    }

    public function dataKonsultasi($id)
    {
        // $this->db->where('tanggal_konsul = DATE(NOW())');
        $this->db->where('id_calon_klien', $id);
        $this->db->order_by('id_konsultasi', 'DESC');
        // $this->db->get('konsultasi')->row();
        // echo $this->db->last_query();
        return $this->db->get('konsultasi')->row();
    }

    public function updateKlien($data)
    {
        $id = $data['id_calon_klien'];
        $up = array(
        "nama" => $data['nama'],
        "jk" => $data['jk'],
        "tgl_lahir" => $data['tgl_lahir'],
        "alamat" => $data['alamat'],
        "email" => $data['email']
        );
        $this->db->where('id_calon_klien', $id);
        return $this->db->update('calon_klien', $up);
    }

    public function save_kronologi($data)
    {
        $this->db->insert('konsultasi', $data);
    }

}