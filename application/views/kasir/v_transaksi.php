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
                                                    <input type="date" name="" id="date" value="<?= date('Y-m-d') ?>"
                                                        class="form-control">
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
    <label for="id_produk">Pilih Produk</label>
    <div class="input-group">
        <select id="id_produk" class="form-control" name="id_produk" required onchange="updateTambahButton(this.value)">
            <?php foreach ($produk as $key => $value) { ?>
                <option value="<?php echo $value->id_produk; ?>">
                    <?php echo $value->nama_produk; ?> - Rp. <?php echo number_format($value->harga); ?>
                </option>
            <?php } ?>
        </select>
        <input type="number" id="qty" class="form-control" name="qty" value="1" min="1">
    </div>
</div>

<button type="button" class="btn btn-primary" id="tambahButton" onclick="tambahProduk()">
    <i class="fa fa-cart-plus"></i> Tambah
</button>

        </div>
    </div>
</div>
<!-- File: nama_view.php -->
<script>
    function updateTambahButton(id_produk) {
        var tambahButton = document.getElementById('tambahButton');
        var base_url = "<?php echo base_url(); ?>";
        tambahButton.setAttribute('data-href', base_url + 'penjualan/beli/' + id_produk);
    }

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
</script>




                  




                    <div class="col-lg-4 col-md-12">
                        <div class="box box-widget">
                            <div class="box-body">
                                <div align="right">
                                    <h4>Invoice <b></b></h4>
                                    <h1><b><span id="grand_total2" style="font-size: 50pt;"><?php echo $kode_jual; ?></span></b></h1>
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
                                           <?php $no = 1; foreach ($detail_beli as $key => $value): ?>
                                               <tr>
                                                   <td><?= $value->nama_produk ?></td>
                                                   <td>Rp. <?= number_format($value->harga) ?></td>
                                                   <td><?= $value->qty ?></td>
                                                   <td>Rp. <?= number_format($value->total_harga) ?></td>
                                                   <td>
                                                       <a href="<?= base_url('penjualan/hapus/'. $kode_jual.'-'.$value->id_produk) ?>">Hapus</a>
                                                   </td>
                                               </tr>
                                           <?php endforeach; ?>
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
                                                        <input type="text" id="grand_total" value="<?php echo $sub_total->total ?>" class="form-control" readonly>
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
                                            <tr>
                                                <td style="vertical-align: top; width: 30%;">
                                                    <label for="cash">Bayar</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" id="cash" value="0" min="0"
                                                            class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: top;">
                                                    <label for="change">Kembali</label>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" id="change" class="form-control" readonly>
                                                    </div>
                                                </td>
                                            </tr>
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
                                                        <textarea name="" id="note" rows="3"
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
                                    <button id="cancel_payment" class="btn btn-flat btn-warning">
                                        <i class="fa fa-refresh"></i> Cancel
                                    </button><br><br>
                                    <a href="<?= base_url('penjualan/proses/' . $sub_total->total) ?>" class="btn btn-flat btn-lg btn-success">
    <i class="fa fa-paper-plane"></i> Proses
</a>                                       
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
            </section>

        </div>
    </div>
</div>
</div>