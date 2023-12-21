<div class="container-fluid">
    <div class="row">
        <!-- Informasi Card -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">INFORMASI</h4>
                    <br>
                    <div class="form-group row">
                        <label for="input2" class="col-sm-2 col-form-label text-sm-center"
                            style="font-size: 14px; font-weight: 1000; color: black;">INVOICE :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?= $kode_jual; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="input1" class="col-sm-2 col-form-label text-sm-right"
                            style="font-size: 15px; font-weight: 1000; color: black;">Tanggal :</label>
                        <div class="col-sm-10">
                            <?php
                            $tanggalSekarang = date('Y-m-d');
                            $tanggalFormatIndonesia = date('d F Y', strtotime($tanggalSekarang));
                            ?>
                            <input type="text" name="tanggal_indonesia" id="tanggal_indonesia"
                                value="<?= $tanggalFormatIndonesia ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="input3" class="col-sm-2 col-form-label text-sm-right"
                            style="font-size: 15px; font-weight: 1000; color: black;">Kasir :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"
                                value="<?= $this->session->userdata('nama_user'); ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produk Card -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Produk</h4>
                    <br>
                    <div class="form-group input-group">
                        <label for="input2" class="col-sm-2 col-form-label text-sm-right"
                            style="font-size: 14px; font-weight: 1000; color: black;">PRODUK </label>
                        <div class="col-sm-10">
                            <select id="id_produk" class="form-control text-center" name="id_produk" required
                                onchange="updateTambahButton(this.value)">
                                <option value="" disabled selected> --- Pilih Produk --- </option>
                                <?php foreach ($produk as $key => $value) { ?>
                                <option value="<?php echo $value->id_produk; ?>">
                                    <?php echo $value->nama_produk; ?> - Rp.
                                    <?php echo number_format($value->harga); ?> - Stok
                                    (
                                    <?php echo $value->stok; ?>)
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <button type="button" class="btn btn-primary float-right" id="tambahButton"
                        onclick="tambahProduk()">
                        <i class="fa fa-cart-plus"></i> Tambah
                    </button>
                </div>
            </div>
        </div>


        <!-- Data Pesanan Table -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Data Pesanan</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
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
                                        <!-- Display the current quantity -->
                                        <span id="qty<?= $value->id_produk ?>">
                                            <?= $value->qty ?>
                                        </span>

                                        <!-- Button to open a modal for updating quantity -->
                                        <button style="color: blue; font-size: 18px; text-decoration: none;"
                                            type="button" class="btn btn-link" data-toggle="modal"
                                            data-target="#updateQtyModal<?= $value->id_produk ?>">
                                            &#9998;
                                        </button>

                                        <!-- Update Quantity Modal -->
                                        <div class="modal fade" id="updateQtyModal<?= $value->id_produk ?>"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="updateQtyModalLabel<?= $value->id_produk ?>"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="updateQtyModalLabel<?= $value->id_produk ?>">Update
                                                            Quantity</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form to update quantity -->
                                                        <form
                                                            action="<?= base_url('penjualan/update_qty/' . $kode_jual . '/' . $value->id_produk) ?>"
                                                            method="post">
                                                            <div class="">
                                                                <div class="col-md-11">

                                                                    <label for="new_qty">New Quantity:</label>
                                                                    <input type="number" class="form-control"
                                                                        id="new_qty" name="new_qty"
                                                                        value="<?= $value->qty ?>" min="1">

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <!-- Add any additional fields here if needed -->
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>Rp.
                                        <?= number_format((isset($value->qty) ? $value->qty : 0) * $value->harga) ?>
                                    </td>

                                    <td>
                                        <a href="<?= base_url('penjualan/hapus/'. $kode_jual.'-'.$value->id_produk) ?>"
                                            class="btn">&#x274C;</a>
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

        <!-- Bar Chart Card -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Data Bayar</h4>
                    <br>
                    <div id="morris-bar-chart"></div>
                    <form id="processForm" action="<?= base_url('penjualan/proses/' . $sub_total->total) ?>"
                        method="post">

                        <!-- Subtotal, Total, and Process Button -->
                        <div class="row mt-4">
                            <?php if (empty($sub_total->total)): ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="subtotal">Total :</label>
                                    <input type="text" class="form-control" id="grand_total" value="Rp. 0" readonly>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="subtotal">Total :</label>
                                    <input type="text" class="form-control" id="grand_total"
                                        value="Rp. <?= number_format($sub_total->total,0," ,",".") ?>" readonly>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php
                                // Menghitung total harga untuk cash
                                $totalHargaCash = 0;

                                // Iterate through each product in $detail_beli
                                foreach ($detail_beli as $item) {
                                    // Calculate the total price for each product and add it to $totalHargaCash
                                    $totalHargaCash += $item->harga * $item->qty;
                                }

                                // Menghitung subtotal untuk cash
                                $subTotalCash = $totalHargaCash - $sub_total->total;
                                ?>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cash">Bayar :</label>
                                    <!-- Updated the initial value to be a plain number -->
                                    <input type="number" name="cash" id="cash" value="0" min="0" class="form-control"
                                        oninput="hitungKembalian(this.value)">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kembali">Kembali :</label>
                                    <input type="text" name="change" id="change" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="button" onclick="clearData()" class="btn btn-danger"><i
                                        class="fa fa-exclamation-triangle" aria-hidden="true"></i> Bersihkan</button>
                                <button type="submit" class="btn btn-primary" id="processButton" disabled><i
                                        class="fa fa-paper-plane" aria-hidden="true"></i> Proses</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Fungsi untuk membuka halaman print nota dalam jendela baru
    function openPrintPage(id_penjualan) {
        var printPageUrl = "<?php echo base_url('penjualan/print_nota/'); ?>" + id_penjualan;
    }

    // Panggil fungsi openPrintPage() setelah proses penjualan selesai
    document.addEventListener("DOMContentLoaded", function () {
        var processButton = document.getElementById('processButton');
        processButton.addEventListener('click', function () {
            // Ambil ID penjualan dari form atau tempat lain sesuai kebutuhan
            var id_penjualan = "<?= $kode_jual; ?>"; // Sesuaikan dengan cara Anda mendapatkan ID penjualan
            openPrintPage(id_penjualan);
            window.onafterprint = function() {
                    window.close(); // Close the window after printing
                }
        });
    });
</script>

<script>
    function clearData() {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Anda yakin ingin menghapus data transaksi ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Get the transaction ID for the current transaction
                var id_penjualan = "<?= $kode_jual; ?>";

                // Redirect to the clear function with the transaction ID
                window.location.href = "<?= base_url('penjualan/clear/') ?>" + id_penjualan;
            }
        });
    }
</script>

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
        var id_produk = document.getElementById('id_produk').value;

        if (id_produk) {
            // Construct the URL with the product ID and assume quantity of 1
            var urlWithQty = tambahButton.getAttribute('data-href') + '/' + id_produk + '/1';

            // Redirect to the URL
            window.location.href = urlWithQty;
        }
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
            var harga = parseFloat(cells[1].innerText.replace('Rp. ', '').replace(/\./g, '').replace(',', ''));
            var qty = parseInt(cells[2].innerText);

            // Hitung total untuk setiap produk (harga * qty)
            var total = harga * qty;

            // Tambahkan total ke subtotal
            subTotal += total;
        }

        // Tampilkan subtotal pada elemen dengan id 'grand_total'
        subTotalElement.value = formatNumber(subTotal);

        // Hitung kembalian setelah mengupdate subtotal
        var cashInput = document.getElementById('cash');
        var cash = parseFloat(cashInput.value.replace('Rp. ', '').replace(/\./g, '').replace(',', '')) || 0;
        hitungKembalian(cash);
    }

    // Fungsi untuk menangani perubahan pembayaran dan menghitung kembali kembalian
    function hitungKembalian(cash) {
        var grandTotal = parseFloat(document.getElementById('grand_total').value.replace('Rp. ', '').replace(/\./g, '').replace(',', ''));

        // Hitung kembalian
        var changeInput = document.getElementById('change');
        var change = cash - grandTotal;

        // Tampilkan kembalian dengan format mata uang
        changeInput.value = " " + formatNumber(change);

        // Enable or disable the "Process" button based on payment sufficiency
        var processButton = document.getElementById('processButton');
        processButton.disabled = cash < grandTotal;
    }

    var tableRows = document.getElementById('cart_table').getElementsByTagName('tr');
    for (var i = 1; i < tableRows.length; i++) {
        var cells = tableRows[i].getElementsByTagName('td');

        // Ambil harga dan qty dari setiap produk
        var harga = parseFloat(cells[1].innerText.replace('Rp. ', '').replace(/\./g, '').replace(',', ''));
        var qty = parseInt(cells[2].innerText);

        // Hitung total untuk setiap produk (harga * qty)
        var total = harga * qty;

        // Tambahkan total ke subtotal
        subTotal += total;
    }

    var cashInput = document.getElementById('cash');
    cashInput.addEventListener('input', function () {
        var cash = parseFloat(cashInput.value.replace('Rp. ', '').replace(/\./g, '').replace(',', '')) || 0; // Menggunakan nilai default 0 jika input bukan angka
        hitungKembalian(cash);
    });
    // Fungsi untuk memformat angka ke format mata uang
    function formatNumber(number) {
        // Format number with commas as thousands separators
        var parts = number.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        // Combine the integer and decimal parts
        var formattedNumber = parts.join(".");

        // Tampilkan format mata uang
        return "Rp. " + formattedNumber;
    }

    var cashInput = document.getElementById('cash');
    cashInput.addEventListener('input', function () {
        var cash = cashInput.value.replace('Rp. ', ''); // Menghilangkan simbol mata uang
        hitungKembalian(cash);
    });

    // Fungsi untuk membersihkan input dan hasil kembalian
    function bersihkanForm() {
        document.getElementById('cash').value = "Rp. 0";
        document.getElementById('change').value = "Rp. 0";
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    // Untuk SweetAlert
    <?php if ($this -> session -> flashdata('swal') === 'success'): ?>
        Swal.fire({
            title: 'Success',
            text: '<?= $this->session->flashdata("pesan") ?>',
            icon: 'success',
            showConfirmButton: false, // Hide the "OK" button
            timer: 1000, // Auto close after 3 seconds
            customClass: {
                container: 'custom-swal-container',
                popup: 'custom-swal-popup',
                header: 'custom-swal-header',
                title: 'custom-swal-title',
                closeButton: 'custom-swal-close-button',
                icon: 'custom-swal-icon',
                image: 'custom-swal-image',
                content: 'custom-swal-content',
                input: 'custom-swal-input',
                actions: 'custom-swal-actions',
                confirmButton: 'custom-swal-confirm-button',
                cancelButton: 'custom-swal-cancel-button',
                footer: 'custom-swal-footer'
            }
        });
    <?php elseif($this -> session -> flashdata('swal') === 'error'): ?>
        Swal.fire({
            title: 'Error',
            text: '<?= $this->session->flashdata("pesan") ?>',
            icon: 'error',
            showConfirmButton: false, // Hide the "OK" button
            timer: 2000, // Auto close after 3 seconds
            customClass: {
                container: 'custom-swal-container',
                popup: 'custom-swal-popup',
                header: 'custom-swal-header',
                title: 'custom-swal-title',
                closeButton: 'custom-swal-close-button',
                icon: 'custom-swal-icon',
                image: 'custom-swal-image',
                content: 'custom-swal-content',
                input: 'custom-swal-input',
                actions: 'custom-swal-actions',
                confirmButton: 'custom-swal-confirm-button',
                cancelButton: 'custom-swal-cancel-button',
                footer: 'custom-swal-footer'
            }
        });
    <?php endif; ?>
</script>

<style>
    /* Define your custom styles for the larger SweetAlert here */
    .custom-swal-popup {
        width: 500px; /* Adjust the width as needed */
        height: 45vh;
    }
</style>
