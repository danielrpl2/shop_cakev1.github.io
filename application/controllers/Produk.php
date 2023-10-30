<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_kategori');
    }

    public function index()
    {
        $data = array(
            'title' => 'Produk',
            'produk' => $this->m_produk->get_all_data(),
            'isi' => 'produk/v_produk',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add() 
    {
        $this->form_validation->set_rules('nama_produk','Nama Produk', 'required', array(
            'required'=>'%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('id_kategori','Kategori', 'required', array(
            'required'=>'%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('harga','Harga', 'required', array(
            'required'=>'%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('berat','Berat', 'required', array(
            'required'=>'%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('deskripsi','Deskripsi', 'required', array(
            'required'=>'%s Harus Diisi !!!'
        ));
        
        
        if ($this->form_validation->run() == TRUE) {
            $uploaded_files = array();
    
            // Loop through the file input fields (e.g., gambar1, gambar2, etc.)
            for ($i = 1; $i <= 6; $i++) {
                $field_name = "gambar" . $i;
    
                if (!empty($_FILES[$field_name]['name'])) {
                    $config['upload_path'] = './gambar/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
                    $config['max_size'] = '2000';
                    $this->upload->initialize($config);
    
                    if (!$this->upload->do_upload($field_name)) {
                        // Handle errors if needed.
                    } else {
                        $upload_data = $this->upload->data();
                        $uploaded_files[] = $upload_data['file_name'];
                    }
                }
            }
    
            // After uploading all images, add the product and store the file names in the database.
            $data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),
                'berat' => $this->input->post('berat'),
                'deskripsi' => $this->input->post('deskripsi'),
            );
    
            // Store the uploaded file names in the $data array
            for ($i = 1; $i <= count($uploaded_files); $i++) {
                $data["gambar" . $i] = $uploaded_files[$i - 1];
            }
    
            $this->m_produk->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
            redirect('produk');
        }
        $data = array(
            'title' => 'Produk Add',
            'header' => 'Produk',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi' => 'produk/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE); 
    }


    // Update one item
    public function edit($id_produk = NULL)
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('harga', 'Harga', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('berat', 'Berat', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));
    
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
            $config['max_size'] = '2000';
            $this->upload->initialize($config);
            $field_name = "gambar";
    
            $produk = $this->m_produk->get_data($id_produk);
            if ($this->upload->do_upload($field_name)) {
                // New image uploaded, delete the old image if not empty
                if ($produk->gambar != "") {
                    unlink('./gambar/' . $produk->gambar);
                }
    
                $upload_data = array('uploads' => $this->upload->data());
                $data = array(
                    'id_produk'   => $id_produk,
                    'nama_produk' => $this->input->post('nama_produk'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga'       => $this->input->post('harga'),
                    'berat'       => $this->input->post('berat'),
                    'deskripsi'   => $this->input->post('deskripsi'),
                    'gambar'      => $upload_data['uploads']['file_name'],
                );
                $this->m_produk->edit($data);
            } else {
                // No new image uploaded, update other fields without changing the image
                $data = array(
                    'id_produk'   => $id_produk,
                    'nama_produk' => $this->input->post('nama_produk'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga'       => $this->input->post('harga'),
                    'berat'       => $this->input->post('berat'),
                    'deskripsi'   => $this->input->post('deskripsi'),
                );
                $this->m_produk->edit($data);
            }
    
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
            redirect('produk');
        }
    
        $data = array(
            'title' => 'Edit Produk',
            'header' => 'Produk',
            'kategori' => $this->m_kategori->get_all_data(),
            'produk' => $this->m_produk->get_data($id_produk),
            'isi' => 'produk/v_edit',
        );
    
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    


    // Delete one item
    public function delete($id_produk = NULL)
    {
        //hapus gambar
        $produk = $this->m_produk->get_data($id_produk);
        if ($produk->gambar!="") {
            unlink('./gambar/' . $produk->gambar);
        }
        //end 
        $data = array('id_produk' => $id_produk);
		$this->m_produk->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
		redirect('produk');
    }

   
}
