<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_transaksi');

    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'produk' => $this->m_home->get_all_data(),
            'galery' => $this->m_home->gallery(),
            'blog' => $this->m_home->get_all_data_blog(),
            'isi' => 'v_home',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    public function by_kategori()
    {
        $data = array(
            'title' => 'Kategori',
            'blog' => $this->m_home->get_all_data_blog(),
            'produk' => $this->m_home->get_all_data(),
            'galery' => $this->m_home->gallery(),
            'isi' => 'v_kategori_produk',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    public function blog()
    {
        $data = array(
            'title' => 'Blog',
            'blog' => $this->m_home->get_all_data_blog(),
            'isi' => 'v_blog',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    public function about()
    {
        $data = array(
            'title' => 'Blog',
            'blog' => $this->m_home->get_all_data_blog(),
            'isi' => 'v_about',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    public function kategori($id_kategori)
    {
        $kategori = $this->m_home->kategori($id_kategori);

        $data = array(
            'title' => 'Kategori ' . $kategori->nama_kategori,
            'blog' => $this->m_home->get_all_data_blog(),
            'produk' => $this->m_home->get_all_data_produk($id_kategori),
            'isi' => 'v_kategori_produk',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    public function detail_produk($id_produk)
    {
        $data = array(
            'title' => 'Detail Produk',
            'gambar' => $this->m_home->gambar_produk($id_produk),
            'produk' => $this->m_home->detail_produk($id_produk),
            'galery' => $this->m_home->gallery(),
            'blog' => $this->m_home->get_all_data_blog(),
            'rekomendasi_produk' => $this->m_home->get_recommended_products($id_produk), // Produk rekomendasi
            'isi' => 'v_detail_produk',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    public function detail_blog($id_blog)
    {
        $data = array(
            'title' => 'Detail Blog',
            'produk' => $this->m_home->get_all_data(),
            'blog' => $this->m_home->get_all_data_blog(),
            'blog_detail' => $this->m_home->detail_blog($id_blog),
            'isi' => 'v_detail_blog',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, false);
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        if (!empty($keyword)) {
            $products = $this->m_home->get_keyword($keyword);

            if (!empty($products)) {
                $data = array(
                    'title' => 'Home',
                    'produk' => $this->m_home->get_all_data(),
                    'blog' => $this->m_home->get_all_data_blog(),
                    'galery' => $this->m_home->gallery(),
                    'produk' => $products,
                    'isi' => 'v_home',
                );
                $this->load->view('layout/v_wrapper_frontend', $data, false);
            } else {
                // If no products are found, display a message on the same page.
                $data = array(
                    'title' => 'Home',
                    'message' => 'Produk tidak ditemukan.',
                    'produk' => $this->m_home->get_all_data(),
                    'blog' => $this->m_home->get_all_data_blog(),
                    'galery' => $this->m_home->gallery(),
                    'isi' => 'v_home',
                );
                $this->load->view('layout/v_wrapper_frontend', $data, false);
            }
        } else {
            redirect('home');
            // Redirect to the home page if no keyword is provided.
        }

    }

}
