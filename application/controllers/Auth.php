<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function login_user()
    {
        // Your reCAPTCHA secret key
        $recaptchaSecretKey = '6LcuRkAoAAAAADofuOUJmBCTLAOWS_NmYGiI_Wii';
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi!!'
        ));
    
        if ($this->form_validation->run() == TRUE) {
            $recaptchaResponse = $this->input->post('g-recaptcha-response');
    
            // Verify reCAPTCHA response
            $recaptchaVerify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecretKey}&response={$recaptchaResponse}");
            $recaptchaData = json_decode($recaptchaVerify);
    
            if (!$recaptchaData->success) {
                // reCAPTCHA verification failed
                $this->session->set_flashdata('error', 'RECAPTCHA verification failed. Please try again !');
            } else {
                // reCAPTCHA verification succeeded
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $this->user_login->login($username, $password);
            }
        }
    
        $data = array(
            'title' => 'Login User',
        );
        $this->load->view('v_login_user', $data, FALSE);
    }
    

    public function logout_user()
    {
        $this->user_login->logout();
    }
}