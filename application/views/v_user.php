
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php 
                                
                                if ($this->session->flashdata('pesan')) {
                                    echo '<div class="alert alert-success alert-dismissible" style="background-color: rgb(63, 255, 0); color: black;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fa fa-check"></i> Succes</h5>';
                                    echo $this->session->flashdata('pesan');
                                    echo '</div>';
                                }
                                
                                ?>
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
                                                <td><?php
                                                if ($value->level_user==1) {
                                                    echo '<span style="color: white;" class="badge bg-primary">Admin</span>';
                                                } else {
                                                    echo '<span style="color: white;" class="badge bg-success">User</span>';
                                                }
                                                ?></td>
                                                
                                                <td>
                                                    <?php if ($value->profile_image) { ?>
                                                        <img src="<?= base_url('assets/profile_img/' . $value->profile_image) ?>" alt="Profile Image" width="50" style="border-radius: 50px;">
                                                    <?php } else { ?>
                                                        No Image
                                                    <?php } ?>
                                                </td>
                                               <td>
                                                    <button class="btn btn-warning btn-sm" style="color: black; background-color: yellow; border: none;" data-toggle="modal" data-target="#edit<?= $value->id_user ?>"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-sm" style="color: white; border: none;" data-toggle="modal" data-target="#delete<?= $value->id_user ?>"><i class="fa fa-trash"></i></button>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
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
                    <input type="text" class="form-control" name="nama_user" required placeholder="Enter a name..">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Username <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="username" required placeholder="Enter a username..">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Password <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="password" class="form-control" name="password" required placeholder="Enter a password..">
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
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
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

      

   <!-- Model edit -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_user ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">

                    <?php 
                    echo form_open_multipart('user/edit/' . $value->id_user); // Use form_open_multipart for file upload
                    ?>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Nama User <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?= $value->nama_user ?>" name="nama_user" required placeholder="Enter a name..">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Username <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?= $value->username ?>" name="username" required placeholder="Enter a username..">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Password <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?= $value->password ?>" name="password" required placeholder="Enter a password..">
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
                            <img src="<?= base_url('assets/profile_img/' . $value->profile_image) ?>" alt="Profile Image" width="100">
                            <br><br>
                        <?php } ?>
                        <input type="file" class="form-control" name="profile_image">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
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




     <!-- model delete -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_user ?>">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data : <?= $value->nama_user ?> | <?= $value->username ?>??</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h3>Nama : <?= $value->nama_user ?></h3>
                    <h3>Username : <?= $value->username ?></h3>
                    <h3>Profile Image :</h3>
                    <?php if ($value->profile_image) { ?>
                        <img src="<?= base_url('assets/profile_img/' . $value->profile_image) ?>" style="border-radius: 50px;" alt="Profile Image" width="100">
                    <?php } else { ?>
                        <p>Tidak ada gambar profil</p>
                    <?php } ?>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Batalkan</button>
                    <a href="<?= base_url('user/delete/' . $value->id_user) ?>" class="btn btn-danger">Ya Hapus <i class="fa fa-user-times" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>
