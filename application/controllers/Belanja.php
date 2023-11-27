<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {
	
    
    public function __construct()
    {
        parent::__construct();       
        $this->load->model('m_transaksi');
        $this->load->model('m_home');
         
    }

	public function index()
	{
        if (empty($this->cart->contents())) {
            redirect('home');
        }
        $data = array (
            'title' => 'Keranjang Belanja',
            'blog' => $this->m_home->get_all_data_blog(),
            'isi' => 'v_cart',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name'),
    );

    $this->cart->insert($data);
    redirect($redirect_page, 'refresh');
    
    }


    public function update_qty()
    {
        $rowid = $this->input->post('rowid');
        $qty = $this->input->post('qty');
        $berat = $this->input->post('berat');
        $price = $this->input->post('price');
    
        // Update the cart session with the received qty data
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty
        );
    
        $this->cart->update($data);
    
        // Recalculate the total weight of cart items
        $total_berat = 0;
        foreach ($this->cart->contents() as $items) {
            $total_berat += $items['qty'] * $items['berat'];
        }
    
        // Recalculate the subtotal of cart items
        $sub_total = 0;
        foreach ($this->cart->contents() as $items) {
            $sub_total += $items['qty'] * $items['price'];
        }
    
        // Prepare the response data
        $response = array(
            'message' => 'Quantity updated successfully',
            'new_subtotal' => $this->cart->total(),
            'new_total_berat' => $total_berat,
            'new_sub_total' => $sub_total
        );
    
        echo json_encode($response);
    }

    
    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('belanja');
    }

    public function clear()
    {
        $this->cart->destroy();
        redirect('belanja');
    }

    public function cekout() 
    {
        $this->pelanggan_login->proteksi_halaman();
        $this->form_validation->set_rules('provinsi','Provinsi', 'required', array(
            'required'=>' %s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('kota','Kota', 'required', array(
            'required'=>' %s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('exspedisi','Exspedisi', 'required', array(
            'required'=>' %s Harus Diisi !!!'
        ));
        $this->form_validation->set_rules('paket','Paket', 'required', array(
            'required'=>' %s Harus Diisi !!!'
        ));

        
        if ($this->form_validation->run() == FALSE) {
            $data = array (
                'title' => 'Cekout Belanja',
                'blog' => $this->m_home->get_all_data_blog(),
                'isi' => 'v_cekout',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);  
        } else {
            //simpan ke tbl_transaksi
           $data = array(
            'id_pelanggan' => $this->session->userdata('id_pelanggan'),
            'no_order' => $this->input->post('no_order'),
            'tgl_order' => date('Y-m-d'),
            'nama_penerima' => $this->input->post('nama_penerima'),
            'tlp_penerima' => $this->input->post('tlp_penerima'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
            'alamat' => $this->input->post('alamat'),
            'kode_pos' => $this->input->post('kode_pos'),
            'exspedisi' => $this->input->post('exspedisi'),
            'paket' => $this->input->post('paket'),
            'estimasi' => $this->input->post('estimasi'),
            'ongkir' => $this->input->post('ongkir'),
            'berat' => $this->input->post('berat'),
            'grand_total' => $this->input->post('grand_total'),
            'total_bayar' => $this->input->post('total_bayar'),
            'status_bayar' => '0',
            'status_order' => '0',
        );
        $this->m_transaksi->simpan_transaksi($data);
        
        //simpan ke tbl_detail_transaksi
        $i = 1;
        foreach ($this->cart->contents() as $item) {
            $data_detail = array(
                'no_order' => $this->input->post('no_order'),
                'id_produk' => $item['id'],
                'qty' => $this->input->post('qty' . $i++),
            );
            $this->m_transaksi->simpan_detail_transaksi($data_detail);
        }
        //end tbl_detail_transaksi
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses !');
        $this->cart->destroy();
        redirect('pesanan_saya');
        
        
        } 
       
    }
    // public function cekout() 
    // {
    //     $data = array (
    //         'title' => 'Cekout Belanja',
    //         'isi' => 'v_cekout1',
    //     );
    //     $this->load->view('v_cekout1', $data, FALSE);  
    // }

   

    // public function cekout()
	// {
    //     $this->pelanggan_login->proteksi_halaman();
    //     $data = array (
    //         'title' => 'Cekout Keranjang',
    //         'isi' => 'v_cekout',
    //     );
    //     $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	// }    

}
