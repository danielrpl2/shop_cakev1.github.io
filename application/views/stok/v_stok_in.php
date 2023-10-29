<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" style="text-align: center;">Tambah Stok</h3>
                   
                        <?php
                       if ($this->session->flashdata('success')) {
                        echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-info"></i>' . $this->session->flashdata('success') . '</h5>
                        </div>';
                    }
                    
                    // Menampilkan pesan notifikasi form kosong (validation_errors)
                    echo validation_errors('<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-info"></i>', '</h5>
                    </div>');
                        echo form_open('stok/proses') ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Tanggal</label>
                                <input name="date" type="date" value="<?= date('Y-m-d') ?>" class="form-control" placeholder="Tanggal">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label style="color: black; font-weight: 1000;" for="produk">Produk</label>
                            <div class="form-group input-group">
                                <input type="hidden" name="id_produk" id="id_produk">
                                <input type="text" name="id_produk" id="id_produk_ha" class="form-control" required autofocus>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;" for="nama_produk">Nama Produk</label>
                                <input name="nama_produk" id="nama_produk" type="text" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;" for="harga">Harga</label>
                                <input name="harga" id="harga" type="text" value="-" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;" for="stok">Stok</label>
                                <input name="stok" id="stok" type="text" value="-" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Detail</label>
                                <input name="detail" type="text" class="form-control" placeholder="Tambahan" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Supplier</label>
                                <select name="supplier" class="form-control">
                                    <option value="">--Pilih Supplier--</option>
                                    <?php foreach ($supplier as $key => $value) { 
                                        echo '<option value="'.$value->id_supplier.'">'.$value->nama_supplier.'</option>';
                                     } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Qty</label>
                                <input name="qty" type="number" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <a href="<?= base_url('produk') ?>" class="btn btn-danger float-right"><i class="fa fa-times" aria-hidden="true"></i> Kembali</a>
                            <button type="submit" name="tambah_stok" class="btn btn-primary float-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->


                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-item">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Id Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Kategori</th>
                                                <th>Berat</th>
                                                <th>Stok</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($produk as $key => $value) { ?>
                                            <tr>
                                                <td><?= $value->id_produk ?></td>
                                                <td><?= $value->nama_produk ?></td>
                                                <td><?= $value->harga ?></td>
                                                <td><?= $value->nama_kategori ?></td>
                                                <td><?= $value->berat ?></td>
                                                <td><?= $value->stok ?></td>
                                                <td>
                                                    <button class="btn btn-xs btn-info" id="select" 
                                                    data-id="<?= $value->id_produk ?>"
                                                    data-nama_produk="<?= $value->nama_produk ?>"
                                                    data-harga="<?= $value->harga ?>"
                                                    data-nama_kategori="<?= $value->nama_kategori ?>"
                                                    data-berat="<?= $value->berat ?>"
                                                    data-stok="<?= $value->stok ?>">
                                                        <i class="fa fa-check"> Select</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function(){
        $(document).on('click', '#select', function(){
            var id_produk = $(this).data('id');
            var nama_produk = $(this).data('nama_produk');
            var harga = $(this).data('harga');
            var nama_kategori= $(this).data('nama_kategori');
            var berat = $(this).data('berat');
            var stok = $(this).data('stok');

            $('#id_produk_ha').val(id_produk);
            $('#nama_produk').val(nama_produk);
            $('#harga').val(harga);
            $('#stok').val(stok);
            $('#modal-item').modal('hide');
            
        })
    })
</script>

  