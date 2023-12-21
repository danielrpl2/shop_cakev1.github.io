<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_setting');
    }

    public function index()
    {
        try {
            // Set form validation rules
            $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required', array('required' => '%s Harus Diisi !!!'));
            $this->form_validation->set_rules('kota', 'Kota', 'required', array('required' => '%s Harus Diisi !!!'));
            $this->form_validation->set_rules('alamat_toko', 'Alamat Toko', 'required', array('required' => '%s Harus Diisi !!!'));
            $this->form_validation->set_rules('no_telepon', 'No Telepon', 'required', array('required' => '%s Harus Diisi !!!'));
    
            // Check if form validation fails
            if ($this->form_validation->run() == false) {
                $data = array(
                    'title' => 'Setting',
                    'header' => 'Lokasi',
                    'setting' => $this->m_setting->data_setting(),
                    'isi' => 'v_setting',
                );
                $this->load->view('layout/v_wrapper_backend', $data, false);
            } else {
                // If validation passes, handle form data
                $data = array(
                    'id' => 1,
                    'lokasi' => $this->input->post('kota'),
                    'nama_toko' => $this->input->post('nama_toko'),
                    'alamat_toko' => $this->input->post('alamat_toko'),
                    'no_telepon' => $this->input->post('no_telepon'),
                );
    
                // Update setting in the database
                $this->m_setting->edit($data);
    
                // Set flash message for success
                $this->session->set_flashdata('pesan', 'Settingan Berhasil Diganti!!!');
                $this->session->set_flashdata('swal', 'success');
                $this->session->set_flashdata('swal_message', 'Settingan Berhasil Diganti!!!');
    
                // Redirect to the setting page
                redirect('setting');
            }
        } catch (Exception $e) {
            // If an exception occurs, handle the error
            $this->session->set_flashdata('pesan', 'Error: ' . $e->getMessage());
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('swal_message', 'Error: ' . $e->getMessage());
            redirect('setting');
        }
    }
    
}
