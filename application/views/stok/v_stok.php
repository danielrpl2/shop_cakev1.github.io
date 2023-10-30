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
                                        <button class="btn btn-primary btn-sm" style="color: white; border: none;"
                                            data-toggle="modal" data-target="#delete<?= $value->id_produk?>"><i
                                                class="fa fa-eye"></i></button>
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
                <a href="<?= base_url('stok/delete_stok/'.$value->id_stok.'/'.$value->id_produk) ?>" class="btn btn-primary"><i
                        class="fa fa-trash" aria-hidden="true"></i> Ya Hapus</a>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
<?php } ?>