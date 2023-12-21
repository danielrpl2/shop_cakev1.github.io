
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               
                                <h3 class="card-title" style="text-align: center;">Table <?= $title ?></h3>
                                <button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-sm" style="font-size: 15px; color: white;"> Add <?= $title ?></button>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Bank</th>
                                                <th>No Rek</th>
                                                <th>Atas Nama</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($rekening as $key => $value) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value->nama_bank ?></td>
                                                <td><?= $value->no_rek ?></td>
                                                <td><?= $value->atas_nama ?></td>
                                               <td>
                                                    <button class="btn btn-warning btn-sm" style="color: black; background-color: yellow; border: none;" data-toggle="modal" data-target="#edit<?= $value->id_rekening ?>"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-sm delete-user" data-user-id="<?= $value->id_rekening ?>" style="color: white; border: none;"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
        
       <!-- model add -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header">
                <h4 class="modal-title">Add <?= $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <?php 
            echo form_open_multipart('admin/add'); // Use form_open_multipart for file upload
            ?>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Nama Bank <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="nama_bank" required placeholder="Masukan Nama Bank..">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">No Rek <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="no_rek" required placeholder="Masukan No Rek..">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Atas Nama <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="atas_nama" required placeholder="Masukan Atas Nama..">
                </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Batal</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
            </div>
            <?php 
            echo form_close();
            ?>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
      // Use SweetAlert2 for delete confirmation
      $('.delete-user').on('click', function () {
        var userId = $(this).data('user-id');

        Swal.fire({
            title: 'Are you sure?',
            text: "Kamu akan menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the delete URL
                window.location.href = '<?= base_url('admin/delete/') ?>' + userId;
            }
        });
    });
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


   <!-- Model edit -->
<?php foreach ($rekening as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_rekening ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 10px;">
                <div class="modal-body">

                    <?php 
                    echo form_open_multipart('admin/edit/' . $value->id_rekening); // Use form_open_multipart for file upload
                    ?>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Nama Bank <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?= $value->nama_bank ?>" name="nama_bank" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">No Rek <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?= $value->no_rek ?>" name="no_rek" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Atas Nama <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?= $value->atas_nama ?>" name="atas_nama" required>
                    </div>
                </div>
            
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Batal</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
            </div>
                <?php 
                echo form_close();
                ?>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>
