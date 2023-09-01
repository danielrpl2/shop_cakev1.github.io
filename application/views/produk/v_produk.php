

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
                                <a href="<?= base_url('produk/add') ?>" type="button" class="btn btn-sm" style="font-size: 15px; color: black; background-color:#FF8C00; text-decoration:none;"> Add <?= $title ?> <i class="fa fa-birthday-cake" style="color: black;"></i></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Deskripsi</th>
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
                                                <td><?= $value->deskripsi ?></td>
                                                <td>
                                                    <img src="<?= base_url('gambar/' .$value->gambar) ?>" width="150px" style="border-radius: 50px;"alt="">
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('produk/edit/' . $value->id_produk) ?>" class="btn btn-warning btn-sm" style="color: black; background-color: yellow; border: none;"><i class="fa fa-edit"></i></a>
                                                    <a href="" class="btn btn-danger btn-sm" style="color: white; border: none;"><i class="fa fa-trash"></i></a>
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
        <!--**********************************
            Content body end
        ***********************************-->
        <!-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> -->