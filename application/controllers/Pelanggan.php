<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
    }

    public function index()
    {
        $data = array (
            'title' => 'Pelanggan',
            'pelanggan' => $this->m_pelanggan->get_all_data(),
            'isi' => 'v_pelanggan',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
   
    public function register()
    {
        $this->form_validation->set_rules('nama_pelanggan','Your Name', 'required', array(
            'required'=>'%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('email','Email', 'required|is_unique[tbl_pelanggan.email]', array(
            'required'=>'%s Harus Diisi !!!',
            'is_unique' => '%s Sudah Terdaftar... !'
        ));
        $this->form_validation->set_rules('password','Your Password', 'required', array(
            'required'=>'%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('ulangi_password','Confirm password', 'required|matches[password]', array(
            'required'=>'%s Harus Diisi !!!',
            'matches' => '%s Password Tidak Sama... !'
        ));
        
        
        if ($this->form_validation->run() == FALSE) {
            $data = array (
                'title' => 'Register Pelanggan',
                'isi' => 'v_register',
            );
            $this->load->view('v_register', $data, FALSE);
            
        }else{
            
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
    
            $this->m_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'Akun anda sudah terdaftar, Silahkan Login');
            redirect('pelanggan/register'); 
        }
	
    }

    public function login()
    {
        $recaptchaSecretKey = '6LcuRkAoAAAAADofuOUJmBCTLAOWS_NmYGiI_Wii';

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s Harus Diisi!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi!!'
        ));

        if ($this->form_validation->run() == TRUE) {
            $recaptchaResponse = $this->input->post('g-recaptcha-response');
            $recaptchaVerify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecretKey}&response={$recaptchaResponse}");
            $recaptchaData = json_decode($recaptchaVerify);
            if (!$recaptchaData->success) {
                // reCAPTCHA verification failed
                $this->session->set_flashdata('error', 'reCAPTCHA verification failed. Please try again.');
            } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }
    }

        $data = array (
            'title' => 'Login Pelanggan',
            'isi' => 'v_login_pelanggan',
        );
        $this->load->view('v_login_pelanggan', $data, FALSE);
    }

    public function logout()
    {
        $this->pelanggan_login->logout();
    }

    public function akun()
    {
        $this->pelanggan_login->proteksi_halaman();
        $data = array (
            'title' => 'Akun Saya',
            'isi' => 'v_akun_saya',
        );
        $this->load->view('v_akun_saya', $data, FALSE);     
    }

    public function delete($id_pelanggan = NULL)
	{
		$data = array('id_pelanggan' => $id_pelanggan);
		$this->m_pelanggan->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
		redirect('pelanggan');
	}
}   