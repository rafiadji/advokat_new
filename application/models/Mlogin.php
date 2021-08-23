<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlogin extends CI_Model
{

    public function cek_login($post)
    {
        $username = $post['username'];
        $password = $post['password'];
        $where = array(
            'username' => $username,
            'password' => md5($password)
        );
        $cek = $this->db->get_where('karyawan', $where)->row_array();
        if (!empty($cek)) {
            $data_session = array(
                'username' => $username,
                'nama' => $cek['nama'],
                'jabatan' => $cek['jabatan'],
                'status' => true
            );
            $this->session->set_userdata($data_session);
            if ($data_session['jabatan'] == 'ADM') {
                redirect('admin');
            } else if ($data_session['jabatan'] == 'ADV') {
                redirect('advokat');
            } else if ($data_session['jabatan'] == 'K') {
                redirect('ketua');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>Oh Snap!</strong> Username dan Password salah!</div>');
            redirect('login');
        }
    }
}