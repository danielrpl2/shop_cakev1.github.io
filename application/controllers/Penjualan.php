<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('m_stok');        
        $this->load->model('m_supplier');   
        $this->load->model('m_produk');   
        $this->load->model('m_transaksi');
        $this->load->model('m_home');
    }

    public function index()
{
    $this->load->model('M_penjualan');
    $id_penjualan = $this->M_penjualan->tampil_pesanan('id_penjualan', 'penjualan', 'DESC')->row();

    if (empty($id_penjualan)) {
        $kode_jual = 1;
        $kode = 1;
    } else {
        $kode_jual = $id_penjualan->id_penjualan + 1;
        $kode = $id_penjualan->id_penjualan + 1;
    }

    $data = array(
        'title' => 'Kasir',
        'produk' => $this->m_home->get_all_data(),
        'galery' => $this->m_home->gallery(),
        'blog' => $this->m_home->get_all_data_blog(),
        'stok' => $this->m_stok->get_stok_in()->result(),
        'isi' => 'kasir/v_transaksi',
        'kode_jual' => $kode_jual,
    );

    // Mendapatkan subtotal
    $data['sub_total'] = $this->M_penjualan->total('detail_penjualan', 'total_harga', ['id_penjualan' => $kode])->row();

    // Pindahkan penyesuaian $data['detail_beli'] di sini
    $data['detail_beli'] = $this->M_penjualan->tampil_join('tbl_produk', 'detail_penjualan', 'tbl_produk.id_produk=detail_penjualan.id_produk', ['id_penjualan' => $kode])->result();

    $this->load->view('layout/v_wrapper_backend', $data, FALSE);
}

        
    
    

    function beli($id, $qty = 1) {
        //  $qty = $this->input->post('qty');
        $this->load->model('M_penjualan');
        
        // Menampilkan harga produk
        $where['id_produk'] = $id;
        $produk = $this->M_penjualan->tampil_id('tbl_produk', $where)->row();
    
        // Mengambil id penjualan terakhir
        $id_penjualan = $this->M_penjualan->tampil_pesanan('id_penjualan', 'penjualan', 'DESC')->row();
    
        if (empty($id_penjualan)) {
            $kode_jual = 1;
        } else {
            $kode_jual = $id_penjualan->id_penjualan + 1;
        }
    
        // Cek produk di keranjang
        $wherecek['id_produk'] = $id;
        $wherecek['id_penjualan'] = $kode_jual;
        $cekpenjualan = $this->M_penjualan->tampil_id('detail_penjualan', $wherecek)->row();
    
        if (empty($cekpenjualan)) {
            // Jika tidak ada, tambahkan produk baru ke keranjang
            $field['id_produk'] = $id;
            $field['id_penjualan'] = $kode_jual;
            $field['qty'] = $qty;
            $field['total_harga'] = $qty * $produk->harga;
            $this->M_penjualan->tambah('detail_penjualan', $field);
        } else {
            // Jika sudah ada, tambahkan qty
            $field['qty'] = $cekpenjualan->qty + $qty;
            $field['total_harga'] = $field['qty'] * $produk->harga;  // Perubahan disini
            $this->M_penjualan->edit('detail_penjualan', $field, $wherecek);
        }
    
        redirect('penjualan');
    }
    
    function hapus($id) {
        $this->load->model('M_penjualan');
        $pecah = explode('-',$id);
        $where['id_penjualan'] = $pecah[0];
        $where['id_produk'] = $pecah[1];
        $this->M_penjualan->hapus('detail_penjualan',$where);
        redirect('penjualan');
    }

    function proses($id) {
        $this->load->model('M_penjualan');
        $field['tanggal_jual'] = date('Y-m-d H:i:s');
        $field['sub_total'] = $id;
        $field['id_user'] = $_SESSION['id_user'];
        $this->M_penjualan->tambah('penjualan',$field);
        redirect('penjualan');

    }
}