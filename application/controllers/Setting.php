<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_setting');        
    }

    public function index(){

        $this->form_validation->set_rules('nama_toko','Nama Toko', 'required', array(
            'required'=>'%s Harus Diisi !!!')
    );
        $this->form_validation->set_rules('kota','Kota', 'required', array(
            'required'=>'%s Harus Diisi !!!')
    );
        $this->form_validation->set_rules('alamat_toko','Alamat Toko', 'required', array(
            'required'=>'%s Harus Diisi !!!')
    );
        $this->form_validation->set_rules('no_telepon','No Telepon', 'required', array(
            'required'=>'%s Harus Diisi !!!')
    );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Setting',
                'header' => 'Lokasi',
                'setting' => $this->m_setting->data_setting(),
                'isi' => 'v_setting',
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        }else{
            $data = array(
                'id' => 1,
                'lokasi' => $this->input->post('kota'),
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat_toko' => $this->input->post('alamat_toko'),
                'no_telepon' => $this->input->post('no_telepon')
            );
            $this->m_setting->edit($data);
            $this->session->set_flashdata('pesan','Settingan Berhasil Diganti!!!');
            redirect('setting');
}
}
}