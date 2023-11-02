
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
                                <a href="<?= base_url('blog/add') ?>" type="button" class="btn btn-sm" style="font-size: 15px; color: white; background-color:#279EFF; text-decoration:none;"> Add <?= $title ?> <i class="fa fa-book" style="color: white;"></i></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Tanggal</th>
                                                <th>Gambar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($blog as $key => $value) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $value->judul ?></td>
                                                <td><?= $value->tanggal ?></td>
                                                <td>
                                                    <img src="<?= base_url('assets/blog/' .$value->gambar) ?>" width="150px" style="border-radius: 10px;"alt="">
                                                </td>                                                
                                              <td>
                                                <a href="<?= base_url('blog/edit/' . $value->id_blog) ?>" class="btn btn-warning btn-sm" style="color: black; background-color: yellow; border: none;"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger btn-sm" style="color: white; border: none;" data-toggle="modal" data-target="#delete<?= $value->id_blog ?>"><i class="fa fa-trash"></i></button>
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
<?php foreach ($blog as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_blog ?>">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 10px;">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data : <?= $value->judul ?> ??</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h3>Judul : <?= $value->judul ?></h3>
                    <img src="<?= base_url('assets/blog/' .$value->gambar) ?>" width="100%" style="border-radius: 10px;"alt="">
                   
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                <a href="<?= base_url('blog/delete/' . $value->id_blog) ?>" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i> Ya Hapus</a>
            </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>
