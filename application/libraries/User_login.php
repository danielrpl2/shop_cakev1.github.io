<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login {
    protected $ci;

    public function __construct() {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
        $this->ci->load->library('session');
    }

    public function login($username, $password) {
        $cek = $this->ci->m_auth->login_user($username, $password);
        if ($cek) {
            $id_user = $cek->id_user; // Menyimpan id_user
            $nama_user = $cek->nama_user;
            $level_user = $cek->level_user;
            $profile_image = $cek->profile_image; // Menyimpan profile_image
    
            $this->ci->session->set_userdata('id_user', $id_user);
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama_user', $nama_user);
            $this->ci->session->set_userdata('level_user', $level_user);
            $this->ci->session->set_userdata('profile_image', $profile_image);
    
            redirect('admin');  // Ganti 'admin' dengan halaman yang sesuai
        } else {
            $this->ci->session->set_flashdata('error', 'Username Atau Password Salah!!');
            redirect('auth/login_user');
        }
    }
    

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('username') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login !!');
            redirect('auth/login_user');
        }
    }

    public function logout() {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('nama_user');
        $this->ci->session->unset_userdata('level_user');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil LOgout !!!');
        redirect('auth/login_user');
    }
}
?>