
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                               
                                <h3 class="card-title" style="text-align: center;">Table <?= $title ?></h3>
                                <button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-sm" style="font-size: 15px; color: white;"> Add <?= $title ?> <i class="fa fa-user-plus" aria-hidden="true"></i></button>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama User</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Email</th>
                                                <th>No Tlp</th>
                                                <th>Level</th>
                                                <th>Profil Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($user as $key => $value) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value->nama_user ?></td>
                                                <td><?= $value->username ?></td>
                                                <td><?= $value->password ?></td>
                                                <td><?= $value->email ?></td>
                                                <td><?= $value->no_tlp ?></td>
                                                <td><?php
                                                if ($value->level_user==1) {
                                                    echo '<span style="color: white;" class="badge bg-primary">Admin</span>';
                                                } else {
                                                    echo '<span style="color: white;" class="badge bg-success">User</span>';
                                                }
                                                ?></td>
                                                
                                                <td>
                                                    <?php if ($value->profile_image) { ?>
                                                        <img src="<?= base_url('assets/profileimg/' . $value->profile_image) ?>" alt="Profile Image" style="border-radius: 10px; height: 10vh; width: 50%; object-fit: cover;">
                                                    <?php } else { ?>
                                                        No Image
                                                    <?php } ?>
                                                </td>
                                               <td>
                                                    <button class="btn btn-warning btn-sm" style="color: black; background-color: yellow; border: none;" data-toggle="modal" data-target="#edit<?= $value->id_user ?>"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-sm delete-user" data-user-id="<?= $value->id_user ?>" style="color: white; border: none;"><i class="fa fa-user-times" aria-hidden="true"></i></button>
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
            echo form_open_multipart('user/add'); // Use form_open_multipart for file upload
            ?>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Nama User <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="nama_user" required placeholder="Masukan name..">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Username <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="username" required placeholder="Masukan username..">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Email <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="email" class="form-control" name="email" required placeholder="Masukan email..">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">No Tlp <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="number" class="form-control" name="no_tlp" required placeholder="Masukan no_tlp..">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Password <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="password" class="form-control" name="password" required placeholder="Masukan password..">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Level <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                   <select name="level_user" class="form-control">
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                   </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Profile Image</label>
                <div class="col-lg-6">
                    <input type="file" class="form-control" name="profile_image">
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
                window.location.href = '<?= base_url('user/delete/') ?>' + userId;
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
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_user ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 10px;">
                <div class="modal-body">

                    <?php 
                    echo form_open_multipart('user/edit/' . $value->id_user); // Use form_open_multipart for file upload
                    ?>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Nama User <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?= $value->nama_user ?>" name="nama_user" required placeholder="Masukan name..">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Username <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?= $value->username ?>" name="username" required placeholder="Masukan username..">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Password <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?= $value->password ?>" name="password" required placeholder="Masukan password..">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Email <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?= $value->email ?>" name="email" required placeholder="Masukan email..">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">No Tlp <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?= $value->no_tlp ?>" name="no_tlp" required placeholder="Masukan no_tlp..">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Level <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <select name="level_user" class="form-control">
                            <option value="1" <?php if($value->level_user==1){echo 'selected';} ?>>Admin</option>
                            <option value="2"  <?php if($value->level_user==2){echo 'selected';} ?>>User</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Profile Image</label>
                    <div class="col-lg-6">
                        <?php if ($value->profile_image) { ?>
                            <img src="<?= base_url('assets/profileimg/' . $value->profile_image) ?>" alt="Profile Image" width="100" style="border-radius: 10px; height: 10vh; width: 50%; object-fit: cover;">
                            <br><br>
                        <?php } ?>
                        <input type="file" class="form-control" name="profile_image">
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
