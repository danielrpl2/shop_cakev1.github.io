<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_blog');
    }

    public function index()
    {
        $data = array(
            'title' => 'Blog',
            'blog' => $this->m_blog->get_all_data(),
            'isi' => 'blog/v_blog',
        );
        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required', array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', array('required' => '%s Harus Diisi !!!'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required' => '%s Harus Diisi !!!'));

        if ($this->form_validation->run() == true) {
            $config['upload_path'] = './assets/blog/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
            $config['max_size'] = '10000';
            $this->upload->initialize($config);
            $field_name = "gambar";

            if (!$this->upload->do_upload($field_name)) {
                // If image upload fails
                $this->session->set_flashdata('swal', 'error');
                $this->session->set_flashdata('pesan', 'Failed to upload image: ' . $this->upload->display_errors());
                redirect('blog');
            } else {
                // If image upload is successful
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/blog/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'judul' => $this->input->post('judul'),
                    'tanggal' => $this->input->post('tanggal'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );

                // Insert data into the database
                $this->m_blog->add($data);

                // Set SweetAlert success message
                $this->session->set_flashdata('swal', 'success');
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
                redirect('blog');
            }
        }

        // If form validation fails or when initially loading the page
        $data = array(
            'title' => 'Blog Add',
            'header' => 'Blog',
            'kategori' => $this->m_blog->get_all_data(),
            'isi' => 'blog/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    // Update one item
    public function edit($id_blog = null)
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required', array(
            'required' => '%s Harus Diisi !!!',
        ));
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', array(
            'required' => '%s Harus Diisi !!!',
        ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => '%s Harus Diisi !!!',
        ));

        if ($this->form_validation->run() == true) {
            $config['upload_path'] = './assets/blog/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
            $config['max_size'] = '10000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Blog',
                    'header' => 'Blog',
                    'blog' => $this->m_blog->get_data($id_blog),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'blog/v_edit',
                );
                $this->load->view('layout/v_wrapper_backend', $data, false);
            } else {
                //hapus gambar
                if ($blog->gambar != "") {
                    unlink('./assets/blog/' . $blog->gambar);
                }
                //end
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/blog/' . $upload_data['uploads']['file_name'];
                // $this->load->library('image_lib', $config);
                $data = array(
                    'id_blog' => $id_blog,
                    'judul' => $this->input->post('judul'),
                    'tanggal' => $this->input->post('tanggal'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_blog->edit($data);
                $this->session->set_flashdata('swal', 'success');
                $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
                redirect('blog');
            }
            //jika tanpa ganti gambar
            $data = array(
                'id_blog' => $id_blog,
                'judul' => $this->input->post('judul'),
                'tanggal' => $this->input->post('tanggal'),
                'deskripsi' => $this->input->post('deskripsi'),
            );
            $this->m_blog->edit($data);
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
            redirect('blog');
        }

        $data = array(
            'title' => 'Edit Blog',
            'header' => 'Blog',
            'blog' => $this->m_blog->get_data($id_blog),
            'isi' => 'blog/v_edit',
        );
        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    // Delete one item
    public function delete($id_blog = null)
    {
        try {
            // Get blog data
            $blog = $this->m_blog->get_data($id_blog);

            // Delete the image file if it exists
            if ($blog->gambar != "") {
                unlink('./assets/blog/' . $blog->gambar);
            }

            // Data for deletion
            $data = array('id_blog' => $id_blog);

            // Delete data from the database
            $this->m_blog->delete($data);

            // Set SweetAlert success message
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
        } catch (Exception $e) {
            // Set SweetAlert error message
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        // Redirect to the blog page
        redirect('blog');
    }

}
