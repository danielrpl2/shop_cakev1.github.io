<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

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
        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array(
            'required' => '%s Harus Diisi !!!',
        ));
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array(
            'required' => '%s Harus Diisi !!!',
        ));
        $this->form_validation->set_rules('harga', 'Harga', 'required', array(
            'required' => '%s Harus Diisi !!!',
        ));
        $this->form_validation->set_rules('berat', 'Berat', 'required', array(
            'required' => '%s Harus Diisi !!!',
        ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => '%s Harus Diisi !!!',
        ));

        if ($this->form_validation->run() == true) {
            try {
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
                            throw new Exception('Error uploading files: ' . $this->upload->display_errors());
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
                    'stok' => '0',
                );

                // Store the uploaded file names in the $data array
                for ($i = 1; $i <= count($uploaded_files); $i++) {
                    $data["gambar" . $i] = $uploaded_files[$i - 1];
                }

                $this->m_produk->add($data);

                // Set SweetAlert success message
                $this->session->set_flashdata('swal', 'success');
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
                redirect('produk');
            } catch (Exception $e) {
                // Set SweetAlert error message
                $this->session->set_flashdata('swal', 'error');
                $this->session->set_flashdata('pesan', 'Terjadi kesalahan: ' . $e->getMessage());
                redirect('produk/add');
            }
        }

        $data = array(
            'title' => 'Produk Add',
            'header' => 'Produk',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi' => 'produk/v_add',
        );

        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    public function edit($id_produk = null)
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', array(
            'required' => '%s Harus Diisi !!!',
        ));
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array(
            'required' => '%s Harus Diisi !!!',
        ));
        $this->form_validation->set_rules('harga', 'Harga', 'required', array(
            'required' => '%s Harus Diisi !!!',
        ));
        $this->form_validation->set_rules('berat', 'Berat', 'required', array(
            'required' => '%s Harus Diisi !!!',
        ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => '%s Harus Diisi !!!',
        ));

        if ($this->form_validation->run() == true) {
            try {
                // Configuration for image upload
                $config['upload_path'] = './gambar/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
                $config['max_size'] = '2000';
                $this->upload->initialize($config);

                // Get existing product data
                $produk = $this->m_produk->get_data($id_produk);

                // Loop to handle gambar1 to gambar6
                for ($i = 1; $i <= 6; $i++) {
                    $field_name = "gambar" . $i;

                    // Check if a new file is uploaded
                    if (!empty($_FILES[$field_name]['name'])) {
                        // Upload the new file
                        if ($this->upload->do_upload($field_name)) {
                            // Delete the old image if it exists
                            if (!empty($produk->{'gambar' . $i})) {
                                unlink('./gambar/' . $produk->{'gambar' . $i});
                            }

                            // Store the new file name in the data array
                            $upload_data = $this->upload->data();
                            $data['gambar' . $i] = $upload_data['file_name'];
                        } else {
                            throw new Exception('Error uploading files: ' . $this->upload->display_errors());
                        }
                    } else {
                        // If no new file is uploaded, keep the existing image
                        $data['gambar' . $i] = $produk->{'gambar' . $i};
                    }
                }

                // Update data that is not related to images
                $data += array(
                    'id_produk' => $id_produk,
                    'nama_produk' => $this->input->post('nama_produk'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga' => $this->input->post('harga'),
                    'berat' => $this->input->post('berat'),
                    'deskripsi' => $this->input->post('deskripsi'),
                );

                // Call the model function to update the product
                $this->m_produk->edit($data);

                // Set SweetAlert success message
                $this->session->set_flashdata('swal', 'success');
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
                redirect('produk');
            } catch (Exception $e) {
                // Set SweetAlert error message
                $this->session->set_flashdata('swal', 'error');
                $this->session->set_flashdata('pesan', 'Terjadi kesalahan: ' . $e->getMessage());
                redirect('produk/edit/' . $id_produk);
            }
        }

        // Load data for the view if validation fails
        $data = array(
            'title' => 'Edit Produk',
            'header' => 'Produk',
            'kategori' => $this->m_kategori->get_all_data(),
            'produk' => $this->m_produk->get_data($id_produk),
            'isi' => 'produk/v_edit',
        );

        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    public function delete($id_produk = null)
    {
        try {
            // Get product data
            $produk = $this->m_produk->get_data($id_produk);

            // Delete the image if it exists
            if ($produk->gambar != "") {
                unlink('./gambar/' . $produk->gambar);
            }

            // Delete the product
            $data = array('id_produk' => $id_produk);
            $this->m_produk->delete($data);

            // Set SweetAlert success message
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
            redirect('produk');
        } catch (Exception $e) {
            // Set SweetAlert error message
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Terjadi kesalahan: ' . $e->getMessage());
            redirect('produk');
        }
    }

}
