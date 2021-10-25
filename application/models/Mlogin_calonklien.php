<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlogin_calonklien extends CI_Model
{

    public function cek_login($post)
    {
        $username = $post['username'];
        $password = $post['password'];
        $where = array(
            'username' => $username,
            'password' => $password
        );
        $cek = $this->db->get_where('calon_klien', $where)->row_array();
        if (!empty($cek)) {
            $data_session = array(
                'username' => $username,
            );
            $this->session->set_userdata($data_session);
            if ($data_session) {
                redirect('client');
            } endif;
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>Oh Snap!</strong> Username dan Password salah!</div>');
            redirect('login');
        }
    }
}