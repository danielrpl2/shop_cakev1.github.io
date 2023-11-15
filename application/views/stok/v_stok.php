<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php 
                                
                                if ($this->session->flashdata('success')) {
                                    echo '<div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5><i class="icon fa fa-info"></i>' . $this->session->flashdata('success') . '</h5>
                                    </div>';
                                }
                                
                                ?>
                    <h3 class="card-title" style="text-align: center;">Data
                        <?= $title ?>
                    </h3>
                    <a href="<?= base_url('stok/tambah_stok') ?>" type="button" class="btn btn-sm"
                        style="font-size: 15px; color: white; background-color:#279EFF; text-decoration:none;"> Add
                        <?= $title ?> <i class="fa fa-cubes" style="color: white;"></i>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                            foreach ($stok as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $value->id_produk ?>
                                    </td>
                                    <td>
                                        <?= $value->nama_produk ?>
                                    </td>
                                    <td>
                                        <?= $value->qty ?>
                                    </td>
                                    <td>
                                        <?= date('d-m-Y', strtotime($value->date)) ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" style="color: white; border: none;"
                                            data-toggle="modal" data-target="#delete<?= $value->id_stok?>"><i
                                                class="fa fa-trash"></i></button>

                                        <button id="set-detail" class="btn btn-primary btn-sm" style="color: white; border: none;"
                                            data-toggle="modal" data-target="#modal-detail"
                                            data-idproduk="<?= $value->id_produk ?>" data-namaproduk="<?= $value->nama_produk ?>" data-detail="<?= $value->detail ?>"
                                            data-supplier="<?= $value->nama_supplier ?>" data-qty="<?= $value->qty ?>"
                                            data-date="<?= date('d-m-Y', strtotime($value->date)) ?>">
                                            <i class="fa fa-eye"></i></button>

                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
</div>
<!--**********************************
            Content body end
***********************************-->


<!-- model delete -->
<?php foreach ($stok as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_stok ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 15px;">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data :
                    <?= $value->id_produk ?> ??
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h3>Nama :
                    <?= $value->nama_produk ?>
                </h3>
                <h3>Qty :
                    <?= $value->qty ?>
                </h3>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"
                        aria-hidden="true"></i> Close</button>
                <a href="<?= base_url('stok/delete_stok/'.$value->id_stok.'/'.$value->id_produk) ?>"
                    class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i> Ya Hapus</a>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
<?php } ?>


<!-- Modal Detail -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Stok In</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered no-margin">
                        <tbody>
                            <tr>
                                <th>ID PRODUK</th>
                                <td><span id="id_produk"></span></td>
                            </tr>
                            <tr>
                                <th>NAMA PRODUK</th>
                                <td><span id="nama_produk"></span></td>
                            </tr>
                            <tr>
                                <th>DETAIL</th>
                                <td><span id="detail"></span></td>
                            </tr>
                            <tr>
                                <th>SUPPLIER</th>
                                <td><span id="nama_supplier"></span></td>
                            </tr>
                            <tr>
                                <th>QTY</th>
                                <td><span id="qty"></span></td>
                            </tr>
                            <tr>
                                <th>DATE</th>
                                <td><span id="date"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function(){
        $(document).on('click', '#set-detail', function(){
            var idproduk = $(this).data('idproduk');
            var namaproduk = $(this).data('namaproduk');
            var detail = $(this).data('detail');
            var supplier = $(this).data('supplier');
            var qty = $(this).data('qty');
            var date = $(this).data('date');
            
            $('#id_produk').text(idproduk);
            $('#nama_produk').text(namaproduk);
            $('#detail').text(detail);
            $('#nama_supplier').text(supplier);
            $('#qty').text(qty);
            $('#date').text(date);
            
        })
    })
</script>