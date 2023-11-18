<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <section class="content">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="box box-widget">
                                <div class="box-body">
                                    <form id="add-to-cart-form">
                                        <label for="id_produk">Id Produk</label>
                                        <div class="form-group input-group">
                                            <input type="text" id="id_produk" class="form-control" autofocus>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-item">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <label for="qty">Qty</label>
                                        <div class="form-group">
                                            <input type="number" id="qty" value="1" min="1" class="form-control">
                                        </div>
                                        <button type="button" id="add_cart" class="btn btn-primary">
                                            <i class="fa fa-cart-plus"></i> Add
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="box box-widget">
                                <div class="box-body">
                                    <!-- Form untuk memproses pembayaran -->
                                    <form id="payment-form">
                                        <label for="sub_total">Sub Total</label>
                                        <div class="form-group">
                                            <input type="number" id="sub_total" value="" class="form-control" readonly>
                                        </div>
                                        <label for="discount">Discount</label>
                                        <div class="form-group">
                                            <input type="number" id="discount" value="0" min="0" class="form-control">
                                        </div>
                                        <label for="grand_total">Grand Total</label>
                                        <div class="form-group">
                                            <input type="number" id="grand_total" value="0" min="0" class="form-control" readonly>
                                        </div>
                                        <label for="cash">Cash</label>
                                        <div class="form-group">
                                            <input type="number" id="cash" value="0" min="0" class="form-control">
                                        </div>
                                        <label for="change">Change</label>
                                        <div class="form-group">
                                            <input type="number" id="change" class="form-control" readonly>
                                        </div>
                                        <label for="note">Note</label>
                                        <div class="form-group">
                                            <textarea name="note" id="note" rows="3" class="form-control"></textarea>
                                        </div>
                                        <button id="cancel_payment" class="btn btn-flat btn-warning">
                                            <i class="fa fa-refresh"></i> Cancel
                                        </button>
                                        <br><br>
                                        <button id="process_payment" class="btn btn-flat btn-lg btn-success">
                                            <i class="fa fa-paper-plane"></i> Process Payment
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="box box-widget">
                                <div class="box-body">
                                    <div align="right">
                                        <h4>Invoice <b></b></h4>
                                        <h1><b><span id="grand_total2" style="font-size: 50pt;">0</span></b></h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="box box-widget">
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Id Produk</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cart_table">
                                            <!-- Isi tabel keranjang disini -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!-- Sertakan skrip JavaScript untuk menangani AJAX dan interaksi dengan halaman -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Simpan data keranjang di sesi
    var cartItems = [];

    // Fungsi untuk menambahkan item ke keranjang menggunakan AJAX
    $(document).ready(function () {
        $('#add_cart').click(function () {
            var id_produk = $('#id_produk').val();
            var qty = $('#qty').val();

            if (id_produk && qty) {
                // Ambil harga produk dari server
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('cashier/get_product_price') ?>/' + id_produk,
                    success: function (response) {
                        var harga = JSON.parse(response).harga;

                        // Tambahkan item ke array cartItems
                        var newItem = { id_produk: id_produk, qty: qty, harga: harga };
                        cartItems.push(newItem);

                        // Tampilkan item di tabel
                        updateCartTable();

                        // Hitung subtotal dan grand total
                        calculateTotals();

                        // Kosongkan input setelah ditambahkan
                        $('#id_produk').val('');
                        $('#qty').val('');
                    },
                    error: function () {
                        alert('Terjadi kesalahan saat mengambil harga produk.');
                    }
                });
            } else {
                alert('Pilih produk dan isi qty terlebih dahulu.');
            }
        });
    });

    // Fungsi untuk mengupdate tabel keranjang
    function updateCartTable() {
        // Kosongkan tabel terlebih dahulu
        $('#cart_table').empty();

        // Tambahkan baris baru untuk setiap item dalam cartItems
        for (var i = 0; i < cartItems.length; i++) {
            var row =
                '<tr>' +
                '<td>' + (i + 1) + '</td>' +
                '<td>' + cartItems[i].id_produk + '</td>' +
                '<td>' + cartItems[i].qty + '</td>' +
                '<td>' + cartItems[i].harga + '</td>' +
                '<td>' +
                '<button type="button" class="btn btn-danger btn-sm" onclick="removeItem(' + i + ')">Hapus</button>' +
                '</td>' +
                '</tr>';
            $('#cart_table').append(row);
        }
    }

    // Fungsi untuk menghitung subtotal, diskon, dan grand total
    function calculateTotals() {
        var subtotal = 0;

        // Hitung subtotal
        for (var i = 0; i < cartItems.length; i++) {
            subtotal += cartItems[i].qty * cartItems[i].harga;
        }

        // Hitung grand total (subtotal - diskon)
        var diskon = $('#discount').val();
        var grandTotal = subtotal - diskon;

        // Update nilai pada elemen HTML
        $('#sub_total').val(subtotal);
        $('#grand_total').val(grandTotal.toFixed(2));
        $('#grand_total2').text(grandTotal.toFixed(2));

        // Hitung dan tampilkan sisa atau kembalian
        calculateChange();
    }

    // Fungsi untuk menghitung sisa atau kembalian
    function calculateChange() {
        var cash = $('#cash').val();
        var grandTotal = parseFloat($('#grand_total').val());

        // Pastikan cash memiliki nilai numerik yang valid
        if ($.isNumeric(cash)) {
            var sisa = grandTotal - parseFloat(cash);

            // Tampilkan sisa di input change
            $('#change').val(sisa.toFixed(2));
        } else {
            // Jika cash tidak valid, kosongkan sisa
            $('#change').val('');
        }
    }

    // Fungsi untuk menghapus item dari keranjang
    function removeItem(index) {
        // Hapus item dari array cartItems berdasarkan index
        cartItems.splice(index, 1);

        // Tampilkan kembali tabel keranjang setelah menghapus item
        updateCartTable();

        // Hitung ulang subtotal dan grand total
        calculateTotals();
    }

    // Panggil fungsi calculateTotals saat halaman dimuat
    $(document).ready(function () {
        calculateTotals();
    });

    // Fungsi untuk memproses pembayaran menggunakan AJAX
    $(document).ready(function () {
        $('#process_payment').click(function () {
            var id_user = ''; // Ganti dengan cara mendapatkan ID kasir
            var id_customer = ''; // Ganti dengan cara mendapatkan ID customer
            var tanggal = ''; // Ganti dengan cara mendapatkan tanggal
            var sub_total = $('#sub_total').val();
            var diskon = $('#discount').val();
            var grand_total = $('#grand_total').val();
            var cash = $('#cash').val();
            var change_amount = $('#change').val();
            var catatan = $('#note').val();

            $.ajax({
                type: 'POST',
                url: '<?= base_url('cashier/process_payment') ?>',
                data: {
                    id_user: id_user,
                    id_customer: id_customer,
                    tanggal: tanggal,
                    sub_total: sub_total,
                    diskon: diskon,
                    grand_total: grand_total,
                    cash: cash,
                    change_amount: change_amount,
                    catatan: catatan,
                    cart: cartItems
                },
                success: function (response) {
                    // Tindakan setelah memproses pembayaran
                    // Misalnya, menampilkan pesan sukses atau mereset formulir
                },
                error: function () {
                    alert('Terjadi kesalahan saat memproses pembayaran.');
                }
            });
        });
    });
</script>


