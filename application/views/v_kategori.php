
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
                                <button data-toggle="modal" data-target="#add" type="button" class="btn btn-primary btn-sm" style="font-size: 15px; color: white;"> Add  <?= $title ?> <i class="fa fa-th-list" aria-hidden="true"></i></button>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kategori</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($kategori as $key => $value) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value->nama_kategori ?></td>
                                              <td>
                                                    <button class="btn btn-warning btn-sm" style="color: black; background-color: yellow; border: none;" data-toggle="modal" data-target="#edit<?= $value->id_kategori?>"><i class="fa fa-edit"></i></button>
                                                    <button class="btn btn-danger btn-sm" style="color: white; border: none;" data-toggle="modal" data-target="#delete<?= $value->id_kategori?>"><i class="fa fa-trash"></i></button>
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
            echo form_open_multipart('kategori/add'); // Use form_open_multipart for file upload
            ?>

            <div class="form-group row">
                <label class="col-lg-4 col-form-label">Nama Kategori <span class="text-danger">*</span>
                </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" name="nama_kategori" required placeholder="Enter a category..">
                </div>
            </div>
            
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
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

<!-- Model edit -->
<?php foreach ($kategori as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_kategori ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit <?= $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">

                    <?php 
                    echo form_open_multipart('kategori/edit/' . $value->id_kategori); // Use form_open_multipart for file upload
                    ?>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Nama Kategori <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" value="<?= $value->nama_kategori ?>" name="nama_kategori" required placeholder="Enter a name..">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
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




     <!-- model delete -->
<?php foreach ($kategori as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_kategori ?>">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data : <?= $value->nama_kategori ?> ??</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h3>Kategori : <?= $value->nama_kategori ?></h3>
                   
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                <a href="<?= base_url('kategori/delete/' . $value->id_kategori) ?>" class="btn btn-success"><i class="fa fa-trash" aria-hidden="true"></i> Ya Hapus</a>
            </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>
