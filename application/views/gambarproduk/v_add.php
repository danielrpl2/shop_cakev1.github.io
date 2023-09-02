<div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title" style="text-align: center;"><?= $title ?> : </h3> <h3 class="card-title" style="text-align: center; color: red;">-> <?= $produk->nama_produk ?> <-</h3>
                                <?php 
                                
                                if ($this->session->flashdata('pesan')) {
                                    echo '<div class="alert alert-success alert-dismissible" style="background-color: rgb(63, 255, 0); color: black;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5><i class="icon fa fa-check"></i> Succes</h5>';
                                    echo $this->session->flashdata('pesan');
                                    echo '</div>';
                                }
                                ?>
                                <?php
                                    //nontifikasi form kosong
                                    echo validation_errors('<div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h5> <i class="icon fa fa-info"></i>' ,'</h5> </div>');
                                    //nontifikasi gagal upload gambar
                                    if (isset($error_upload)) {
                                        echo '<div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h5> <i class="icon fa fa-info"></i>' .$error_upload. '</h5> </div>';
                                    }
                                    echo form_open_multipart('') ?>
                            <div class="row">    
                            <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="color: black; font-weight: 1000;">Ket Gambar</label>
                                        <input name="ket" class="form-control" placeholder="Ket Gambar" value="<?= set_value('ket') ?>">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="color: black; font-weight: 1000;">Foto Produk</label>
                                        <input type="file" name="gambar" class="form-control" id="preview_gambar" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <img src="<?= base_url('assets/gambar_tambahan/noimage.jpg') ?>" id="gambar_load" style="width: 90%; border-radius:10px;">
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <a href="<?= base_url('gambarproduk') ?>" class="btn btn-" style="background-color: yellow;"><i class="fa fa-times" aria-hidden="true"></i> Kembali</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan</button>
                                </div>
                                <?php echo form_close() ?>

                                <hr>
                                <div class="row">

                                <?php foreach ($gambar as $key => $value) { ?>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <img src="<?= base_url('gambar/' . $value->gambar) ?>" id="gambar_load" style="width: 100%; border-radius:10px;" height="auto">
                                        </div>
                                        <p for="">Ket : <?= $value->ket ?></p>
                                        <a href="#" class="btn btn-danger btn-block"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                                    </div>
                                <?php } ?>

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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function () {
        $("#preview_gambar").change(function () {
            bacaGambar(this);
        });
    });
</script>