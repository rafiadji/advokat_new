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
}