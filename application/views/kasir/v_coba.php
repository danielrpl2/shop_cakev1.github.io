<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <section class="content">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="box box-widget">
                                <div class="box-body">
                                    <table width="100%">
                                        <tr>
                                            <td style="vertical-align: top;">
                                                <label for="date">Data</label>
                                            </td>
                                            <div>
                                            <td class="form-group">
                                                <?php
                                                $tanggalSekarang = date('Y-m-d');
                                                $tanggalFormatIndonesia = date('d F Y', strtotime($tanggalSekarang));
                                                ?>
                                                <input type="text" name="tanggal_indonesia" id="tanggal_indonesia" value="<?= $tanggalFormatIndonesia ?>" class="form-control" readonly>
                                            </td>

                                            </div>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top; width: 30%;">
                                                <div class="mt-4">
                                                    <label for="user">Kasir</label>
                                            </td>
                                </div>
                                <td>
                                    <div class="mb-3 mt-3">
                                        <input type="text" class="form-control"
                                            value="<?= $this->session->userdata('nama_user'); ?>" readonly="readonly">
                                    </div>
                                </td>
                                </tr>

                                </table>
                            </div>
                        </div>
                    </div>


                    <!-- File: nama_view.php -->
                    <div class="col-lg-4 col-md-6">
                        <div class="box box-widget">
                            <div class="box-body">
                                <div class="form-group">
                                    <!-- <label for="id_produk">Pilih Produk</label> -->
                                    <div class="input-group">
                                        <select id="id_produk" class="form-control" name="id_produk" required
                                            onchange="updateTambahButton(this.value)">
                                            <option value="" disabled selected> --- Pilih Produk --- </option>
                                            <?php foreach ($produk as $key => $value) { ?>
                                            <option value="<?php echo $value->id_produk; ?>">
                                                <?php echo $value->nama_produk; ?> - Rp.
                                                <?php echo number_format($value->harga); ?> - Stok 
                                                (<?php echo $value->stok; ?>)
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <input style="text-align: center;" type="number" id="qty" class="form-control"
                                    name="qty" value="1" min="1">
                                <br>
                                <button type="button" class="btn btn-primary" id="tambahButton"
                                    onclick="tambahProduk()">
                                    <i class="fa fa-cart-plus"></i> Tambah
                                </button>

                            </div>
                        </div>
                    </div>
                    <!-- File: nama_view.php -->
                  <script>
    // Fungsi untuk mengupdate button tambah dengan URL berdasarkan produk yang dipilih
    function updateTambahButton(id_produk) {
        var tambahButton = document.getElementById('tambahButton');
        var base_url = "<?php echo base_url(); ?>";
        tambahButton.setAttribute('data-href', base_url + 'penjualan/beli/' + id_produk);
    }

    // Fungsi untuk menambah produk ke keranjang
    function tambahProduk() {
        var tambahButton = document.getElementById('tambahButton');
        var qtyInput = document.getElementById('qty');
        var href = tambahButton.getAttribute('data-href');

        if (href) {
            // Construct the URL with the quantity parameter
            var urlWithQty = href + '/' + qtyInput.value;

            // Redirect to the URL
            window.location.href = urlWithQty;
        }
    }

    function formatNumber(number) {
        return 'Rp. ' + number.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    // Fungsi untuk menghitung total belanja dan menampilkan pada elemen dengan id 'grand_total'
    function hitungGrandTotal() {
        var subTotalElement = document.getElementById('grand_total');
        var subTotal = 0;

        // Loop melalui elemen-elemen produk pada tabel
        var tableRows = document.getElementById('cart_table').getElementsByTagName('tr');
        for (var i = 1; i < tableRows.length; i++) {
            var cells = tableRows[i].getElementsByTagName('td');

            // Ambil harga dan qty dari setiap produk
            var harga = parseFloat(cells[1].innerText.replace('Rp. ', '').replace(',', ''));
            var qty = parseInt(cells[2].innerText);

            // Hitung total untuk setiap produk
            var total = harga * qty;

            // Tambahkan total ke subtotal
            subTotal += total;
        }

        // Tampilkan subtotal pada elemen dengan id 'grand_total'
        subTotalElement.value = formatNumber(subTotal);
    }

    var cashInput = document.getElementById('cash');
    cashInput.addEventListener('input', function() {
        var cash = parseFloat(cashInput.value) || 0; // Menggunakan nilai default 0 jika input bukan angka
        hitungKembalian(cash);
    });

    // Fungsi untuk menangani perubahan pembayaran dan menghitung kembali kembalian
  // Fungsi untuk menangani perubahan pembayaran dan menghitung kembali kembalian
function hitungKembalian(cash) {
    var changeInput = document.getElementById('change');
    var grandTotal = parseFloat(document.getElementById('grand_total').value.replace('Rp. ', '').replace(',', ''));

    // Hitung kembalian
    var change = cash - grandTotal;

    // Tampilkan kembalian pada elemen dengan id 'change'
    // Hapus pemanggilan fungsi formatNumber di bawah
    changeInput.value = change;
}


// Fungsi untuk memformat angka ke format mata uang
function formatNumber(number) {
    return 'Rp. ' + number.toFixed(0).replace(/\d(?=(\d{3})+$)/g, '$&,');
}
</script>



                    <div class="col-lg-4 col-md-12">
                        <div class="box box-widget">
                            <div class="box-body">
                                <div align="right">
                                    <h4>Invoice <b></b></h4>
                                    <h1><b><span id="grand_total2" style="font-size: 10x;">
                                                <?php echo $kode_jual; ?>
                                            </span></b></h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="box box-widget">
                                    <div class="box-body table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Produk</th>
                                                    <th>Harga</th>
                                                    <th>Qty</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cart_table">
                                                <?php if (empty($detail_beli)): ?>
                                                <tr>
                                                    <td colspan="5" class="text-center">Tidak ada data transaksi</td>
                                                </tr>
                                                <?php else: ?>
                                                <?php $no = 1; foreach ($detail_beli as $key => $value): ?>
                                                <tr>
                                                    <td>
                                                        <?= $value->nama_produk ?>
                                                    </td>
                                                    <td>Rp.
                                                        <?= number_format($value->harga) ?>
                                                    </td>
                                                    <td>
                                                        <?= $value->qty ?>
                                                    </td>
                                                    <td>Rp.
                                                        <?= number_format($value->total_harga) ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('penjualan/hapus/'. $kode_jual.'-'.$value->id_produk) ?>"
                                                            class="btn btn-danger"><i class="fa fa-trash"
                                                                aria-hidden="true"></i> Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="box box-widget">
                                    <div class="box-body">
                                        <table width="100%">
                                            <tr>
                                                <td style="vertical-align: top;">
                                                    <label for="grand_total">Grand Total</label>
                                                </td>
                                                <td>
                                                <td>
                                                    <div class="form-group">
                                                       

                                                            <?php if (empty($sub_total->total)): ?>
                                                                <input type="text" id="grand_total"
                                                            value="Rp. <?= $sub_total->total ?>" class="form-control"
                                                            readonly>
                                                <?php else: ?>
                                                    <input type="text" id="grand_total"
                                                            value="Rp. <?= $sub_total->total ?>" class="form-control"
                                                            readonly>
                                                <?php endif; ?>
                                                
                                                    </div>
                                                </td>

                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-lg-3 col-md-6">
                                <div class="box box-widget">
                                    <div class="box-body">
                                        <table width="100%">
                                       <!-- Formulir -->
<form action="<?= base_url('penjualan/proses/' . $sub_total->total) ?>" method="post">
    <!-- ... bagian formulir lainnya ... -->

    <!-- Input Bayar -->
    <tr>
        <td style="vertical-align: top; width: 30%;">
            <label for="cash">Bayar</label>
        </td>
        <td>
            <div class="form-group">
                <input type="number" name="cash" id="cash" value="0" min="0" class="form-control" oninput="hitungKembalian(this.value)">
            </div>
        </td>
    </tr>

    <!-- Input Kembali -->
    <tr>
        <td style="vertical-align: top;">
            <label for="change">Kembali</label>
        </td>
        <td>
            <div class="form-group">
                <input type="text" name="change" id="change" class="form-control" readonly>
            </div>
        </td>
    </tr>

    <!-- Tombol Submit -->
    <tr>
        <td colspan="2">
            <button type="submit" class="btn btn-flat btn-lg btn-primary" style="border-radius: 5px;">
                <i class="fa fa-paper-plane"></i> Proses
            </button>
        </td>
    </tr>
</form>

                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-12">
                                <div class="box box-widget">
                                    <div class="box-body">
                                        <table width="100%">
                                            <tr>
                                                <td style="vertical-align: top;">
                                                    <label for="note">Note</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <textarea name="note" id="note" rows="3"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-12">
                                <div>
                                    <a href="<?= base_url('penjualan/beli/clear') ?>"
                                        class="btn btn-flat btn-lg btn-warning"
                                        style="border-radius: 5px; font-size: 15px;">
                                        <i class="fa fa-exclamation-triangle"></i> Clear</a>
                                    <br><br>
                                    <a href="<?= base_url('penjualan/proses/' . $sub_total->total) ?>"
                                        class="btn btn-flat btn-lg btn-primary" style="border-radius: 5px;">
                                        <i class="fa fa-paper-plane"></i> Proses

                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Tambahkan file CSS Toastify -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<!-- Tambahkan file JavaScript Toastify -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    function showNotification(message, type) {
        var toast = Toastify({
            text: message,
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            className: `toastify toastify-${type}`, // Sesuaikan dengan gaya notifikasi
            stopOnFocus: true,
            onClick: function(){}
        });

        toast.showToast();

        // Tambahkan event listener untuk animasi menghilang
        toast.el.addEventListener('Toastify:hide', function(){
            // Gunakan jQuery untuk mengatur animasi dengan kecepatan yang lebih lambat
            $(toast.el).animate({
                opacity: 0,
                top: '-20px'
            }, 800, function() {
                // Hapus notifikasi setelah animasi selesai
                toast.el.remove();
            });
        });
    }

    <?php if ($this->session->flashdata('swal') === 'success'): ?>
        showNotification('<?= $this->session->flashdata("pesan") ?>', 'success');
    <?php elseif($this->session->flashdata('swal') === 'error'): ?>
        showNotification('<?= $this->session->flashdata("pesan") ?>', 'error');
    <?php endif; ?>
</script>

<style>
    /* Animasi jatuh dan memantul */
    @keyframes fallBounce {
        0% {
            opacity: 0;
            transform: translateY(-50px);
        }
        50% {
            opacity: 1;
            transform: translateY(0);
        }
        100% {
            transform: translateY(-20px);
        }
    }

    /* Animasi memudar dan menghilang ke atas */
    @keyframes fadeOutUpSlow {
        0% {
            opacity: 1;
            transform: translateY(0);
        }
        50% {
            opacity: 0.5;
            transform: translateY(-10px);
        }
        100% {
            opacity: 0;
            transform: translateY(-20px);
        }
    }

    /* Gaya notifikasi */
    .toastify {
        font-family: 'Arial', sans-serif;
        padding: 10px 15px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        animation: fallBounce 1s ease-in-out;
        animation-iteration-count: 1; /* Set agar animasi hanya berjalan sekali */
    }

    .toastify.toastify-success {
        background-color: #28a745;
        color: #fff;
    }

    .toastify.toastify-error {
        background-color: #dc3545;
        color: #fff;
    }
</style>



