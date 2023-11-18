<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Cashier_model');
    }

    public function index() {
        $data = array (
            'title' => 'Stok',
          
            'isi' => 'cashier_view',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Controller (Cashier.php)
public function get_product_price($id_produk) {
    // Sesuaikan dengan cara Anda mengambil harga dari tabel_produk
    $harga = $this->Cashier_model->get_product_price($id_produk);

    echo json_encode(['harga' => $harga]);
}


    public function add_to_cart() {
        // Get product data from POST request
        $data = array(
            'id_produk' => $this->input->post('id_produk'),
            'qty' => $this->input->post('qty'),
            'harga' => $this->input->post('harga'),
            'diskon_item' => $this->input->post('diskon_item')
        );

        // Add item to cart using the model
        $this->Cashier_model->add_to_cart($data);

        // Redirect back to cashier page
        redirect('cashier');
    }

    public function calculate_subtotal() {
        // Get cart data from session
        $cart_items = $this->session->userdata('cart');

        // Calculate subtotal using the model
        $subtotal = $this->Cashier_model->calculate_subtotal($cart_items);

        // Return subtotal as JSON response
        echo json_encode(array('subtotal' => $subtotal));
    }

    public function process_payment() {
        // Get payment data from POST request
        $data = array(
            'id_user' => $this->input->post('id_user'),
            'id_customer' => $this->input->post('id_customer'),
            'tanggal' => $this->input->post('tanggal'),
            'sub_total' => $this->input->post('sub_total'),
            'diskon' => $this->input->post('diskon'),
            'grand_total' => $this->input->post('grand_total'),
            'cash' => $this->input->post('cash'),
            'change_amount' => $this->input->post('change_amount'),
            'catatan' => $this->input->post('catatan'),
            'cart' => $this->session->userdata('cart')
        );

        // Process payment using the model
        $this->Cashier_model->process_payment($data);

        // Redirect back to cashier page
        redirect('cashier');
    }

    // Add more functions as needed
}
