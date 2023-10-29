<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" style="text-align: center;">Edit Data <?= $header ?></h3>
                   
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
                        echo form_open_multipart('blog/edit/' . $blog->id_blog) ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Judul</label>
                                <input name="judul" class="form-control" placeholder="Judul" value="<?= $blog->judul ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Tanggal</label>
                                <input name="tanggal" class="form-control" placeholder="Tanggal" value="<?= $blog->tanggal ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Deskripsi</label>
                                <input name="tanggal" class="form-control" placeholder="Deskripsi" type="date" value="<?= $blog->tanggal ?>">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" cols="30" rows="5" placeholder="Deskripsi"><?= $blog->deskripsi ?></textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Foto</label>
                                <input type="file" name="gambar" class="form-control" id="preview_gambar">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <img src="<?= base_url('assets/blog/'. $blog->gambar) ?>" id="gambar_load" style="width: 60%; border-radius:10px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <a href="<?= base_url('blog') ?>" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->


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
