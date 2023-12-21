<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penjualan extends CI_Model
{
    public function tampil($table)
    {
        return $this->db->get($table);
    }

    public function tambah($table, $field)
    {
        return $this->db->insert($table, $field);

    }

    public function tampil_id($table, $id)
    {
        return $this->db->get_where($table, $id);

    }

    public function edit($table, $field, $id)
    {
        $this->db->where($id);
        return $this->db->update($table, $field);

    }

    public function hapus($table, $id)
    {
        return $this->db->delete($table, $id);

    }

    public function tampil_pesanan($field, $table, $pesanan)
    {
        $this->db->order_by($field, $pesanan);
        return $this->db->get($table);

    }

    public function tampil_join($table, $tablejoin, $join, $where)
    {
        $this->db->join($tablejoin, $join);
        $this->db->where($where);
        return $this->db->get($table);

    }

    public function total($table, $total, $where)
    {
        $this->db->select('SUM(' . $total . ') as total');
        $this->db->where($where);
        return $this->db->get($table);
    }

    public function clearTable($id_penjualan = null)
    {
        if ($id_penjualan) {
            // If a transaction ID is provided, delete data for that specific transaction
            $this->db->where('id_penjualan', $id_penjualan);
        }

        // Delete data from the table
        $this->db->delete('tbl_detail_penjualan');
    }

    //untuk print nota
    public function getPenjualanDetail($id_penjualan)
    {
        $this->db->select('tbl_detail_penjualan.*, tbl_penjualan.tanggal_jual, tbl_penjualan.cash, tbl_penjualan.change, tbl_penjualan.sub_total, tbl_produk.nama_produk, tbl_user.nama_user');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk = tbl_detail_penjualan.id_produk');
        $this->db->join('tbl_penjualan', 'tbl_penjualan.id_penjualan = tbl_detail_penjualan.id_penjualan');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_penjualan.id_user');
        $this->db->where('tbl_detail_penjualan.id_penjualan', $id_penjualan);
        return $this->db->get('tbl_detail_penjualan');
    }

    public function getCartDetails($id_penjualan)
    {
        $this->db->select('tbl_detail_penjualan.id_produk, tbl_detail_penjualan.qty, tbl_detail_penjualan.total_harga, tbl_produk.nama_produk, tbl_produk.harga');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk = tbl_detail_penjualan.id_produk');
        $this->db->where('id_penjualan', $id_penjualan);
        return $this->db->get('tbl_detail_penjualan')->result();
    }

    //riwayat penjualan
    // public function getSalesHistory($id_user)
    public function getSalesHistory($levelUser, $idUser)
    {
        $this->db->select('tbl_penjualan.id_penjualan, tbl_penjualan.tanggal_jual, tbl_penjualan.sub_total, tbl_penjualan.cash, tbl_penjualan.change, tbl_user.nama_user');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_penjualan.id_user', 'left');

        if ($levelUser == '1') {
            // If the user is an admin, retrieve all sales history records
            $this->db->order_by('tbl_penjualan.tanggal_jual', 'DESC');
        } else {
            // If the user is not an admin, retrieve records only for the logged-in user
            $this->db->where('tbl_penjualan.id_user', $idUser);
            $this->db->order_by('tbl_penjualan.tanggal_jual', 'DESC');
        }

        return $this->db->get('tbl_penjualan')->result();
    }

    public function getTransaksiCount()
    {
        $this->db->from('tbl_penjualan');
        return $this->db->count_all_results() + 1;
    }

    public function getTotalRevenueByUserId($id_user)
    {
        $this->db->select_sum('sub_total', 'total_revenue');
        $this->db->where('id_user', $id_user);
        $result = $this->db->get('tbl_penjualan')->row();

        return ($result) ? $result->total_revenue : 0;
    }

    public function getTotalSalesCountByUserId($id_user)
    {
        $this->db->where('id_user', $id_user);
        $result = $this->db->count_all_results('tbl_penjualan');

        return $result;
    }

    public function update_quantity($id_penjualan, $id_produk, $new_qty)
    {
        // Retrieve product information
        $product = $this->tampil_id('tbl_produk', array('id_produk' => $id_produk))->row();

        // Calculate the new total price based on the updated quantity and product price
        $new_total_harga = $new_qty * $product->harga;

        // Update the quantity and total price in the database
        $data = array(
            'qty' => $new_qty,
            'total_harga' => $new_total_harga,
            // You can add more fields to update if needed
        );

        $where = array(
            'id_penjualan' => $id_penjualan,
            'id_produk' => $id_produk,
        );

        $this->edit('tbl_detail_penjualan', $data, $where);

        // You may need to update the subtotal in tbl_penjualan as well
        $this->updateSubtotal($id_penjualan);
    }

    // Add this function to update the subtotal in tbl_penjualan
    public function updateSubtotal($id_penjualan)
    {
        // Calculate the new subtotal based on the updated details
        $new_subtotal = $this->total('tbl_detail_penjualan', 'total_harga', array('id_penjualan' => $id_penjualan))->row()->total;

        // Update the subtotal in tbl_penjualan
        $this->edit('tbl_penjualan', array('sub_total' => $new_subtotal), array('id_penjualan' => $id_penjualan));
    }

    public function updateStok($id_produk, $qty_difference)
    {
        // Update stok produk
        $this->db->set('stok', 'stok - ' . $qty_difference, false);
        $this->db->where('id_produk', $id_produk);
        $this->db->update('tbl_produk');
    }

}
