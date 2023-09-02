<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambarproduk extends CI_Controller {
	
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gambarproduk');
        $this->load->model('m_produk');
    }
    
	public function index()
	{
        $data = array (
            'title' => 'Gambar Produk',
            'gambarproduk' => $this->m_gambarproduk->get_all_data(),
            'isi' => 'gambarproduk/v_index',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}

    public function add($id_produk)
    {
        $this->form_validation->set_rules('ket','Ket Gambar', 'required', array(
            'required' =>'%s Harus Diisi !!!'
        ));        
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambarproduk/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Gambar Produk',
                    'header' => 'Produk',
                    'error_upload' => $this->upload->display_errors(),
                    'produk' => $this->m_produk->get_data($id_produk),
                    'gambar' => $this->m_gambarproduk->get_gambar($id_produk),
                    'isi' => 'gambarproduk/v_add',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                $upload_data  = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambarproduk/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_produk'   => $id_produk,
                    'ket'   => $this->input->post('ket'),
                    'gambar'      => $upload_data['uploads']['file_name'],
                );
                $this->m_gambarproduk->add($data);
                $this->session->set_flashdata('pesan', 'Gambar Berhasil Ditambahkan !!!');
                redirect('gambarproduk/add/' .$id_produk);
            }
        } 
        
        $data = array (
            'title' => 'Add Gambar Produk',
            'produk' => $this->m_produk->get_data($id_produk),
            'gambar' => $this->m_gambarproduk->get_gambar($id_produk),
            'isi' => 'gambarproduk/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

      // Delete one item
      public function delete($id_produk, $id_gambar)
      {
          //hapus gambar
          $gambar = $this->m_gambarproduk->get_data($id_gambar);
          if ($gambar->gambar!="") {
              unlink('./assets/gambarproduk/' . $gambar->gambar);
          }
          //end 
          $data = array('id_gambar' => $id_gambar);
          $this->m_gambarproduk->delete($data);
          $this->session->set_flashdata('pesan', 'Gambar Berhasil Dihapus !!!');
          redirect('gambarproduk/add/' .$id_produk);
      }
}
