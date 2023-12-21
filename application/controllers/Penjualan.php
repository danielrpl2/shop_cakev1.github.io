<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
        $id_penjualan = $this->M_penjualan->tampil_pesanan('id_penjualan', 'tbl_penjualan', 'DESC')->row();

        // Mengambil waktu sekarang untuk dijadikan bagian dari kode invoice
        $waktu_sekarang = date('Ymd');

        // Menambahkan 000 sebagai angka unik, disesuaikan dengan transaksi keberapa sekarang
        $angka_unik = sprintf('%03d', $this->M_penjualan->getTransaksiCount());

        // Membuat kode invoice dengan format TRSyyyyMMddHHmmss000
        $kode_jual = 'TRS' . $waktu_sekarang . $angka_unik;

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
        $data['sub_total'] = $this->M_penjualan->total('tbl_detail_penjualan', 'total_harga', ['id_penjualan' => $kode_jual])->row();

        // Pindahkan penyesuaian $data['detail_beli'] di sini
        $data['detail_beli'] = $this->M_penjualan->tampil_join('tbl_produk', 'tbl_detail_penjualan', 'tbl_produk.id_produk=tbl_detail_penjualan.id_produk', ['id_penjualan' => $kode_jual])->result();

        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    public function beli($id)
    {
        $this->load->model('M_penjualan');

        if ($id === 'clear') {
            $this->M_penjualan->clearTable();
            $this->session->set_flashdata('swal', 'success');
            $this->session->set_flashdata('pesan', 'Keranjang berhasil dihapus.');
            redirect('penjualan');
        }

        // Menampilkan harga produk
        $where['id_produk'] = $id;
        $produk = $this->M_penjualan->tampil_id('tbl_produk', $where)->row();

        // Mengambil id penjualan terakhir
        $id_penjualan = $this->M_penjualan->tampil_pesanan('id_penjualan', 'tbl_penjualan', 'DESC')->row();

        // Mengambil waktu sekarang untuk dijadikan bagian dari kode invoice
        $waktu_sekarang = date('Ymd');

        // Menambahkan 000 sebagai angka unik, disesuaikan dengan transaksi keberapa sekarang
        $angka_unik = sprintf('%03d', $this->M_penjualan->getTransaksiCount());

        // Membuat kode invoice dengan format TRSyyyyMMddHHmmss000
        $kode_jual = 'TRS' . $waktu_sekarang . $angka_unik;

        // Check if the stock is initially zero or empty
        if ($produk->stok === 0 || empty($produk->stok)) {
            // Display an error message if the stock is initially zero
            $this->session->set_flashdata('swal', 'error');
            $this->session->set_flashdata('pesan', 'Stok produk sudah habis.');
        } else {
            // Cek produk di keranjang
            $wherecek['id_produk'] = $id;
            $wherecek['id_penjualan'] = $kode_jual;
            $cekpenjualan = $this->M_penjualan->tampil_id('tbl_detail_penjualan', $wherecek)->row();

            if (empty($cekpenjualan)) {
                // Jika tidak ada, tambahkan produk baru ke keranjang
                $field['id_produk'] = $id;
                $field['id_penjualan'] = $kode_jual;
                $field['qty'] = 0; // Menetapkan qty ke 1
                $field['total_harga'] = $produk->harga;
                $this->M_penjualan->tambah('tbl_detail_penjualan', $field);
                $this->session->set_flashdata('swal', 'success');
                $this->session->set_flashdata('pesan', 'Produk berhasil ditambahkan ke keranjang.');
            } else {
                // Jika sudah ada, hapus produk lama dan tambahkan produk baru
                $this->M_penjualan->hapus('tbl_detail_penjualan', $wherecek);

                $field['id_produk'] = $id;
                $field['id_penjualan'] = $kode_jual;
                $field['qty'] = 1; // Menetapkan qty ke 1
                $field['total_harga'] = $produk->harga;
                $this->M_penjualan->tambah('tbl_detail_penjualan', $field);
                $this->session->set_flashdata('swal', 'success');
                $this->session->set_flashdata('pesan', 'Produk berhasil diupdate di keranjang.');
            }

            // Kurangi stok produk
        }

        redirect('penjualan');
    }

    public function hapus($id)
    {
        $this->load->model('M_penjualan');
        $pecah = explode('-', $id);
        $where['id_penjualan'] = $pecah[0];
        $where['id_produk'] = $pecah[1];
        $this->M_penjualan->hapus('tbl_detail_penjualan', $where);

        $this->session->set_flashdata('swal', 'success');
        $this->session->set_flashdata('pesan', 'Data transaksi berhasil dihapus.');
        redirect('penjualan');
    }

    public function proses($subtotal)
    {
        $this->load->model('M_penjualan');

        // Mendapatkan waktu sekarang untuk dijadikan bagian dari kode invoice
        $waktu_sekarang = date('Ymd');

        // Menambahkan 000 sebagai angka unik, disesuaikan dengan transaksi keberapa sekarang
        $angka_unik = sprintf('%03d', $this->M_penjualan->getTransaksiCount());

        // Membuat kode invoice dengan format TRSyyyyMMddHHmmss000
        $id_penjualan = 'TRS' . $waktu_sekarang . $angka_unik;

        // Menyiapkan data untuk disimpan
        $field['tanggal_jual'] = date('Y-m-d H:i:s');
        $field['sub_total'] = $subtotal; // Pastikan $id sesuai dengan kebutuhan aplikasi Anda
        $field['id_user'] = $_SESSION['id_user'];
        $field['id_penjualan'] = $id_penjualan;

        // Menambahkan informasi pembayaran ke dalam data yang akan disimpan
        $field['cash'] = $this->input->post('cash');
        $field['change'] = $this->input->post('change');
        $field['note'] = $this->input->post('note');

        // Menyimpan data ke dalam database
        $this->M_penjualan->tambah('tbl_penjualan', $field);

        $this->session->set_flashdata('swal', 'success');
        $this->session->set_flashdata('pesan', 'Penjualan berhasil diproses.');
        redirect('penjualan/print_nota/' . $field['id_penjualan']);
    }

    public function clear($id_penjualan)
    {
        $this->load->model('M_penjualan');

        // Clear data for the specified transaction ID
        $this->M_penjualan->clearTable($id_penjualan);

        // Display SweetAlert notification
        $this->session->set_flashdata('swal', 'success');
        $this->session->set_flashdata('pesan', 'Data transaksi berhasil dihapus.');

        redirect('penjualan');
    }

    public function riwayat_penjualan()
    {
        $this->load->model('M_penjualan');

        // Get user information
        $idUser = $_SESSION['id_user'];
        $levelUser = $_SESSION['level_user'];

        $data = array(
            'title' => 'Riwayat Penjualan',
            'sales_history' => $this->M_penjualan->getSalesHistory($levelUser, $idUser),
            'isi' => 'kasir/v_riwayat_penjualan',
        );

        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    public function print_nota($id_penjualan)
    {
        $this->load->model('M_penjualan');
        $nota = new stdClass();
    
        // Retrieve sales information
        $penjualanDetail = $this->M_penjualan->getPenjualanDetail($id_penjualan);
    
        if ($penjualanDetail && $penjualanDetail->num_rows() > 0) {
            $nota = $penjualanDetail->row();
            $nota->items = $this->M_penjualan->getCartDetails($id_penjualan);
        } else {
            // Handle the case where no data is found
            // You can redirect to an error page or show an error message
            echo "Data penjualan tidak ditemukan";
            return;
        }
    
        // Load the view to display the receipt
        $this->load->view('kasir/v_print_nota', ['nota' => $nota]);
    
        // Add JavaScript code to trigger automatic printing
        echo '<script type="text/javascript">
        window.onload = function() {
            window.print(); // Trigger automatic printing

            // Wait for the print job to be sent to the printer
            setTimeout(function() {
                window.location.href = "' . site_url('penjualan') . '"; // Redirect back to penjualan
            }, 1000); // Adjust the delay (in milliseconds) as needed
        }
      </script>';
    }
    

    public function update_qty($id_penjualan, $id_produk)
    {
        $this->load->model('M_penjualan');
    
        // Handle the form submission to update quantity
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $new_qty = $this->input->post('new_qty');
    
            // Get the existing quantity for the product in the current transaction
            $where = array(
                'id_penjualan' => $id_penjualan,
                'id_produk' => $id_produk,
            );
            $existing_qty = $this->M_penjualan->tampil_id('tbl_detail_penjualan', $where)->row()->qty;
    
            // Calculate the difference between the existing quantity and the new quantity
            $qty_difference = $new_qty - $existing_qty;
    
            // Retrieve product information
            $product = $this->M_penjualan->tampil_id('tbl_produk', array('id_produk' => $id_produk))->row();
    
            // Check if the stock is sufficient for the new quantity
            if ($product->stok >= $qty_difference) {
                // Update the quantity in the database
                $this->M_penjualan->update_quantity($id_penjualan, $id_produk, $new_qty);
    
                // Update stok produk
                $this->M_penjualan->updateStok($id_produk, $qty_difference);
    
                // Set success message
                $this->session->set_flashdata('swal', 'success');
                $this->session->set_flashdata('pesan', 'Quantity berhasil diupdate.');
    
                // Redirect back to the main page or any desired location
                redirect('penjualan');
            } else {
                // Display an error message if the stock is insufficient for the new quantity
                $this->session->set_flashdata('swal', 'error');
                $this->session->set_flashdata('pesan', 'Stok produk tidak mencukupi.');
                redirect('penjualan');
            }
        }
    }
    

}
