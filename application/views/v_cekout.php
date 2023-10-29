<!-- Page Title -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<section style="text-align: center;" >
	<div class="auto-container">
		<div class="inner-box">
			<strong><h1 style="font-weight: 1000;">Halaman Cekout</h1></strong>
			<div class="bread-crumb"><a href="<?= base_url('home') ?>">Home &nbsp; /</a> <i class="current">Halaman Cekout</i></div>
		</div>
	</div>
</section>
<!-- End Page Title -->
<!--Checkout Page-->
<div class="checkout-page">
    <div class="auto-container">

        <!--Billing Details-->
        <div class="billing-details">
            <div class="shop-form">
                <div class="row clearfix">
                    <div class="form-group col-lg-12 col-md-12 col-xs-12">
                        <div class="sec-title">
                            <h1>Data Pesanan</h1>
                            
                        </div>

                        <div class="responsive-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Preview</th>
                                        <th>Product</th>
                                        <th>Harga</th>
                                        <th>Berat</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php   
                                        $i = 1;
                                        $total_berat = 0;
                                        foreach ($this->cart->contents() as $items) {
                                            $produk = $this->m_home->detail_produk($items['id']);
                                            $berat = $items['qty'] * $produk->berat;
                                            $total_berat =  $total_berat + $berat;
                                        ?>
                                    <tr>
                                        <td data-label="Preview"><img class="previewimg text-center"
                                                src="<?php echo base_url('gambar/') . $produk->gambar; ?>" alt=""></td>
                                        <td data-label="Product">
                                            <?php echo $items['name']; ?>
                                        </td>
                                        <td data-label="Harga">Rp.
                                            <?php echo number_format($items['price'], 0); ?>
                                        </td>
                                        <td data-label="Berat">
                                            <?= $berat ?> Gram.
                                        </td>
                                        <td data-label="Qty">
                                            <?php echo $items['qty'] ?>
                                        </td>
                                        <td data-label="Total">Rp.
                                            <?php echo number_format($items['subtotal'], 0); ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <!-- Add more rows for other products -->
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="sec-title">
                            <h1>Tujuan</h1>
                            <?php 
                                         echo validation_errors('<div class="alert alert-danger alert-dismissible">
                                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> ' ,'</div>');
                                        ?>
                            
                        </div>
                        <div class="billing-inner">

                            <?php echo form_open('belanja/cekout'); 
                                    $no_order = date('Ymd') . strtoupper(random_string('alnum',8));
                                   
                                    ?>

                            <div class="row clearfix">

                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Provinsi <sup>*</sup> </div>
                                    <select name="provinsi"></select>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Kota <sup>*</sup> </div>
                                    <select name="kota"></select>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                    <div class="field-label">Exspedisi <sup>*</sup> </div>
                                    <select name="exspedisi"></select>
                                    <option value=""></option>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                    <div class="field-label">Paket <sup>*</sup> </div>
                                    <select name="paket"></select>
                                    <option value=""></option>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-8 col-sm-12 col-xs-12">
                                    <div class="field-label">Alamat <sup>*</sup> </div>
                                    <input type="text" name="alamat" required>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                    <div class="field-label">Kode Pos <sup>*</sup> </div>
                                    <input type="text" name="kode_pos" required>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                    <div class="field-label">Nama Penerima <sup>*</sup> </div>
                                    <input type="text" name="nama_penerima" required>
                                </div>

                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                    <div class="field-label">No Hp Penerima <sup>*</sup> </div>
                                    <input type="text" name="tlp_penerima" required>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="sec-title">
                            <h1>Data Pembayaran</h1>
                            
                        </div>

                        <div class="shop-order-box">
                            <ul class="order-list">
                                <li>Subtotal<span class="dark">Rp.
                                        <?php echo $this->cart->format_number($this->cart->total()); ?>
                                    </span></li>
                                <li>Berat<span>
                                        <?= $total_berat ?> Gram.
                                    </span></li>
                                <li>Ongkir<span id="ongkir"></span></li>
                                <li class="total">Total<span id="total_bayar" class="dark"></span></li>
                            </ul>


                            <!-- Simpan Transaksi-->
                            <input name="no_order" value="<?= $no_order ?>" hidden>
                            <input name="estimasi" hidden>
                            <input name="ongkir" hidden>
                            <input name="berat" value="<?= $total_berat ?>" hidden>
                            <input name="grand_total" value="<?= $this->cart->format_number($this->cart->total()); ?>"
                                hidden>
                            <input name="total_bayar" hidden>
                            <!--End Simpan Transaksi-->

                            <!--Simpan Detail Transaksi-->
                            <?php 
                                    $i = 1;
                                    foreach ($this->cart->contents() as $items) {
                                        echo form_hidden('qty' . $i++, $items['qty']);
                                        
                                    }
                                    ?>
                            <!--End Simpan Detail Transaksi-->

                            <div class="place-order">
                                <!--Payment Options-->
                                <button type="submit" class="theme-btn btn-style-two order-btn"><span class="txt">Proses
                                        Checkout</span></button>
                            </div>
                            <!--End Place Order-->

                            <?php echo 
                                form_close();
                                ?>
                        </div>
                    </div>
                </div>

            </div>

        </div><!--End Billing Details-->
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Mengimpor jQuery -->
<script>
    $(document).ready(function () {
        //data provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function (hasil_provinsi) {
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });

        //data kota
        $("select[name=provinsi]").on("change", function () {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function (hasil_kota) {
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });

        //data exspedisi
        $("select[name=kota]").on("change", function () {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/exspedisi') ?>",
                success: function (hasil_exspedisi) {
                    $("select[name=exspedisi]").html(hasil_exspedisi);
                }
            });
        });

        //data paket
        $("select[name=exspedisi]").on("change", function () {
            //mendapatkan exspedisi terpillih
            var exspedisi_terpilih = $("select[name=exspedisi]").val();
            //mendapatkan kota tujuan
            var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
            //mengambil data berat
            var total_berat = <?= $berat ?>;
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/paket') ?>",
                data: 'exspedisi=' + exspedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                success: function (hasil_paket) {
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });

        // Fungsi untuk memformat angka sebagai mata uang Rupiah
        function formatRupiah(angka) {
            var number_string = angka.toString();
            var split = number_string.split(',');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return 'Rp. ' + rupiah;
        }

        // Ketika pilihan paket berubah
        $("select[name=paket]").on("change", function () {
            // Menampilkan ongkir
            var dataongkir = $("option:selected", this).attr('ongkir');
            $("#ongkir").html(formatRupiah(dataongkir));

            // Menghitung total bayar
            var data_total_bayar = parseInt(dataongkir) + parseInt(<?= $this -> cart -> total() ?>);
            $("#total_bayar").html(formatRupiah(data_total_bayar));

            //estimasi dan ogkir
            var estimasi = $("option:selected", this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(dataongkir);
            $("input[name=total_bayar]").val(data_total_bayar);
        });

    });
</script>

<style>
    /* CSS for Responsive Table */
    .responsive-table {
        overflow-x: auto;
    }

    .responsive-table table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
    }

    .responsive-table th,
    .responsive-table td {
        padding: 12px;
        /* Mengatur padding agar lebih dekat antara gambar dan teks */
        text-align: left;
    }

    .responsive-table thead {
        background-color: #f2f2f2;
    }

    .previewimg {
        width: 20%;
        border-radius: 10px;
        margin-left: 10px;
        /* Menambahkan margin kanan agar lebih dekat dengan teks */
    }

    .responsive-table th {
        font-weight: bold;
    }

    /* Style for small screens */
    @media screen and (max-width: 600px) {
        .responsive-table table {
            border: 1px solid #ccc;
        }

        .previewimg {

            width: 100% auto;
            margin-right: 0;
            /* Menghilangkan margin kanan pada layar kecil */
        }

        .responsive-table th,
        .responsive-table td {

            border-bottom: 1px solid #ddd;
            display: block;
        }

        .responsive-table th {
            text-align: center;
        }

        .responsive-table td::before {
            content: attr(data-label);
            font-weight: bold;
            display: block;
        }
    }
</style>