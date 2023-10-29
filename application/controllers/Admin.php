<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_pesanan_masuk');
        
    }
    
	public function index()
    {
        $data = array (
            'title' => 'Dashboard',
            // 'total_pesanan' => $this->m_admin->total_pesanan(),
            'belum_bayar' => $this->m_admin->total_pesanan_belum_bayar(),
            'sudah_bayar' => $this->m_admin->total_pesanan_sudah_bayar(),
            'dikirim' => $this->m_admin->total_pesanan_dikirim(),
            'selesai' => $this->m_admin->total_pesanan_selesai(),
            'total_pendapatan' => $this->m_admin->total_pendapatan(),
            'total_produk' => $this->m_admin->total_produk(),
            'total_kategori' => $this->m_admin->total_kategori(),
            'total_pelanggan' => $this->m_admin->total_pelanggan(),
            'isi' => 'v_admin',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }



	public function setting()
	{
        $this->form_validation->set_rules('nama_toko','Nama Toko', 'required', array(
            'required'=>'%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('kota','Kota', 'required', array(
            'required'=>'%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('alamat_toko','Alamat Toko', 'required', array(
            'required'=>'%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('no_telepon','No Telepon', 'required', array(
            'required'=>'%s Harus Diisi !!!'
        ));
        
        
        if ($this->form_validation->run() == FALSE) {
            $data = array (
                'title' => 'Setting Lokasi',
                'setting' => $this->m_admin->data_setting(),
                'header' => 'Lokasi',
                'isi' => 'v_setting',
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            
        }else{
            
            $data = array(
                'id' => 1,
                'lokasi' => $this->input->post('kota'),
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat_toko' => $this->input->post('alamat_toko'),
                'no_telepon' => $this->input->post('no_telepon'),
            );
    
            $this->m_admin->edit($data);
            $this->session->set_flashdata('pesan', 'Setingan Berhasil Diganti !');
            redirect('admin/setting'); 
        }
	}

    public function pesanan_masuk()
    {
        $data = array (
            'title' => 'Pesanan Masuk',
            'pesanan' => $this->m_pesanan_masuk->pesanan(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
            'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
            'isi' => 'v_pesanan_masuk',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);  
    }

    public function proses($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '1',
     );
    $this->m_pesanan_masuk->update_order($data);
    $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses !!');
    redirect('admin/pesanan_masuk');
    
    }

    public function kirim($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => '2',
     );
    $this->m_pesanan_masuk->update_order($data);
    $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Kirim!!');
    redirect('admin/pesanan_masuk');
    
    }

    public function FunctionName() : Returntype {
        
    }
     
}
