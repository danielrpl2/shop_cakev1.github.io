<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title" style="text-align: center;">Table <?= $title ?></h3>
                                <?php if ($this->session->userdata('level_user') == '1'): ?>
                                <a href="<?= base_url('produk/add') ?>" type="button" class="btn btn-sm" style="font-size: 15px; color: white; background-color:#279EFF; text-decoration:none;"> Add <?= $title ?> <i class="fa fa-birthday-cake" style="color: white;"></i></a>
                                <?php endif; ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Gambar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($produk as $key => $value) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value->nama_produk ?></td>
                                                <td><?= $value->nama_kategori ?></td>
                                                <td>Rp. <?= number_format($value->harga,0) ?></td>
                                                <td><?= $value->stok ?></td>
                                                <td>
                                                     <img src="<?= base_url('gambar/' . $value->gambar1) ?>" width="100px" style="border-radius: 10px; height: 10vh; object-fit: cover;" alt="">
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('produk/edit/' . $value->id_produk) ?>" class="btn btn-warning btn-sm" style="color: black; background-color: yellow; border: none;"><i class="fa fa-edit"></i></a>
                                                    <?php if ($this->session->userdata('level_user') == '1'): ?>
                                                    <button class="btn btn-danger btn-sm" style="color: white; border: none;" data-toggle="modal" data-target="#delete<?= $value->id_produk?>"><i class="fa fa-trash"></i></button>
                                                    <?php endif; ?>
                                                </td>
                                             </tr> 
                                            <?php } ?>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
// Cuntuk sweet alert
<?php if ($this->session->flashdata('swal') === 'success'): ?>
    Swal.fire({
        title: 'Success',
        text: '<?= $this->session->flashdata("pesan") ?>',
        icon: 'success',
        confirmButtonText: 'OK'
    });
<?php elseif ($this->session->flashdata('swal') === 'error'): ?>
    Swal.fire({
        title: 'Error',
        text: '<?= $this->session->flashdata("pesan") ?>',
        icon: 'error',
        confirmButtonText: 'OK'
    });
<?php endif; ?>
</script>
     <!-- model delete -->
     <?php foreach ($produk as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_produk ?>">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 10px;">
                <div class="modal-header">
                    <h4 class="modal-title">Apakah Anda Yakin Akan Menghapus Data <?= $value->nama_produk ?>...??</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <img src="<?= base_url('gambar/' .$value->gambar1) ?>" width="100%" style="border-radius: 10px; height: 50vh; object-fit: cover;"alt="">
                    <!-- <h3>Apakah Anda Yakin Akan Menghapus Data Ini...??</h3> -->
                   
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                <a href="<?= base_url('produk/delete/' . $value->id_produk) ?>" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i> Ya Hapus</a>
            </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>