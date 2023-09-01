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
                                <h3 class="card-title" style="text-align: center;">Data <?= $title ?></h3>
                                <!-- <a href="<?= base_url('produk/add') ?>" type="button" class="btn btn-sm" style="font-size: 15px; color: black; background-color:#FF8C00; text-decoration:none;"> Add <?= $title ?> <i class="fa fa-birthday-cake" style="color: black;"></i></a> -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration" id="example1">
                                        <thead>
                                            <tr>
                                                <th style="font-weight: 600; color: black;">No</th>
                                                <th style="font-weight: 600; color: black;">Nama Produk</th>
                                                <th style="font-weight: 600; color: black;">Cover</th>
                                                <th style="font-weight: 600; color: black;">Jumlah</th>
                                                <th style="font-weight: 600; color: black;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $no = 1; 
                                            foreach ($gambarproduk as $key => $value) { ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $value->nama_produk ?></td>
                                                    <td class="text-center"><img src="<?= base_url('gambar/' . $value->gambar) ?>" width="100px" style="border-radius: 30px 10px;"></td>
                                                    <td class="text-center"><span style="color: white; font-size: 18px;" class="badge bg-primary"><?= $value->total_gambar ?></span></td>
                                                    <td class="text-center">
                                                        <a href="" style="background-color: yellow; color: black;" class="btn btn-sm"><i class="fa fa-picture-o" aria-hidden="true"></i> <i class="fa fa-plus" aria-hidden="true"></i></a>
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
        <!--**********************************
            Content body end
        ***********************************-->