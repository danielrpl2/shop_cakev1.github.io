<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cashier_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function add_to_cart($data) {
        $cart = $this->session->userdata('cart');

        // If the cart is empty, initialize it
        if (!$cart) {
            $cart = array();
        }

        // Add the item to the cart
        $cart[] = array(
            'id_produk' => $data['id_produk'],
            'qty' => $data['qty'],
            'harga' => $data['harga'],
            'diskon_item' => $data['diskon_item'],
            'total' => $data['harga'] * $data['qty'] - $data['diskon_item']
        );

        // Update the session with the new cart data
        $this->session->set_userdata('cart', $cart);
    }

    public function calculate_subtotal($cart_items) {
        $subtotal = 0;

        foreach ($cart_items as $item) {
            $subtotal += $item['total'];
        }

        return $subtotal;
    }

    public function process_payment($data) {
        // Insert data into tbl_transaksi
        $transaksi_data = array(
            'id_user' => $data['id_user'],
            'id_customer' => $data['id_customer'],
            'tanggal' => $data['tanggal'],
            'sub_total' => $data['sub_total'],
            'diskon' => $data['diskon'],
            'grand_total' => $data['grand_total'],
            'cash' => $data['cash'],
            'change_amount' => $data['change_amount'],
            'catatan' => $data['catatan']
        );

        $this->db->insert('tbl_transaksi', $transaksi_data);
        $id_transaksi_kasir = $this->db->insert_id();

        // Insert data into tbl_detail_transaksi
        foreach ($data['cart'] as $item) {
            $detail_data = array(
                'id_transaksi_kasir' => $id_transaksi_kasir,
                'id_produk' => $item['id_produk'],
                'qty' => $item['qty'],
                'harga' => $item['harga'],
                'diskon_item' => $item['diskon_item'],
                'total' => $item['total']
            );

            $this->db->insert('tbl_detail_transaksi', $detail_data);
        }

        // Clear the cart session
        $this->session->unset_userdata('cart');
    }

    // Function to get product price by ID
    public function get_product_price($id_produk) {
        $this->db->select('harga');
        $this->db->from('tbl_produk');
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->harga;
        } else {
            return 0; // You can handle this case as per your application logic
        }
    }
}
