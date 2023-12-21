<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" style="text-align: center;">Table
                        <?= $title ?>
                    </h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                            foreach ($pelanggan as $key => $value) { ?>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $value->nama_pelanggan ?>
                                    </td>
                                    <td>
                                        <?= $value->email ?>
                                    </td>
                                    <td>
                                        <?= $value->password ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" style="color: white; border: none;"
                                            data-toggle="modal" data-target="#delete<?= $value->id_pelanggan?>"><i
                                                class="fa fa-trash"></i></button>
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
<!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->



<!-- model delete -->
<?php foreach ($pelanggan as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value->id_pelanggan ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data :
                    <?= $value->nama_pelanggan ?> ??
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h3>Pelanggan :
                    <?= $value->nama_pelanggan ?>
                </h3>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"
                        aria-hidden="true"></i> Batal</button>
                <a href="<?= base_url('pelanggan/delete/' . $value->id_pelanggan) ?>" class="btn btn-primary"><i
                        class="fa fa-trash" aria-hidden="true"></i> Ya Hapus</a>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
// Cuntuk sweet alert
<?php if ($this -> session -> flashdata('swal') === 'success'): ?>
        Swal.fire({
            title: 'Success',
            text: '<?= $this->session->flashdata("pesan") ?>',
            icon: 'success',
            confirmButtonText: 'OK'
        });
<?php elseif($this -> session -> flashdata('swal') === 'error'): ?>
        Swal.fire({
            title: 'Error',
            text: '<?= $this->session->flashdata("pesan") ?>',
            icon: 'error',
            confirmButtonText: 'OK'
        });
<?php endif; ?>
</script>