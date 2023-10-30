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
                        echo form_open_multipart('produk/edit/' . $produk->id_produk) ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Nama Produk</label>
                                <input name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?= $produk->nama_produk ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Kategori</label>
                                <select name="id_kategori" class="form-control">
                                    <option value="<?= $produk->id_kategori ?>"><?= $produk->nama_kategori ?></option>
                                    <?php foreach ($kategori as $key => $value) { ?>
                                        <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Harga Produk</label>
                                <input name="harga" class="form-control" placeholder="Harga Produk" value="<?= $produk->harga ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Berat (Gram)</label>
                                <input name="berat" class="form-control" placeholder="Berat" type="number" min="0" value="<?= $produk->berat ?>">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" cols="30" rows="5" placeholder="Deskripsi Produk"><?= $produk->deskripsi ?></textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Gambar 1</label>
                                <input type="file" name="gambar1" class="form-control" id="preview_gambar1">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Gambar 2</label>
                                <input type="file" name="gambar2" class="form-control" id="preview_gambar2">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Gambar 3</label>
                                <input type="file" name="gambar3" class="form-control" id="preview_gambar3">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Gambar 4</label>
                                <input type="file" name="gambar4" class="form-control" id="preview_gambar4">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Gambar 5</label>
                                <input type="file" name="gambar5" class="form-control" id="preview_gambar5">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Gambar 6</label>
                                <input type="file" name="gambar6" class="form-control" id="preview_gambar6">
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                            <label style="color: black; font-weight: 1000;">Prev 1</label>
                                <?php if (!empty($produk->gambar1)) : ?>
                                    <img src="<?= base_url('gambar/' . $produk->gambar1) ?>" id="gambar_load1" class="form-control" style="border-radius: 10px; height: 25vh; object-fit: cover;">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/gambar_tambahan/kosong.jpg') ?>" class="form-control img-responsive" id="gambar_load1" style="border-radius: 10px; height: 20vh;">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                            <label style="color: black; font-weight: 1000;">Prev 2</label>
                                <?php if (!empty($produk->gambar2)) : ?>
                                    <img src="<?= base_url('gambar/' . $produk->gambar2) ?>" id="gambar_load2" class="form-control" style="border-radius: 10px; height: 25vh; object-fit: cover;">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/gambar_tambahan/kosong.jpg') ?>" class="form-control img-responsive" id="gambar_load2" style="border-radius: 10px; height: 20vh;">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                            <label style="color: black; font-weight: 1000;">Prev 3</label>
                                <?php if (!empty($produk->gambar3)) : ?>
                                    <img src="<?= base_url('gambar/' . $produk->gambar3) ?>" id="gambar_load3" class="form-control" style="border-radius: 10px; height: 25vh; object-fit: cover;">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/gambar_tambahan/kosong.jpg') ?>" class="form-control img-responsive" id="gambar_load3" style="border-radius: 10px; height: 20vh;">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                            <label style="color: black; font-weight: 1000;">Prev 4</label>
                                <?php if (!empty($produk->gambar4)) : ?>
                                    <img src="<?= base_url('gambar/' . $produk->gambar4) ?>" id="gambar_load4" class="form-control" style="border-radius: 10px; height: 25vh; object-fit: cover;">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/gambar_tambahan/kosong.jpg') ?>" class="form-control img-responsive" id="gambar_load4" style="border-radius: 10px; height: 20vh;">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                            <label style="color: black; font-weight: 1000;">Prev 5</label>
                                <?php if (!empty($produk->gambar5)) : ?>
                                    <img src="<?= base_url('gambar/' . $produk->gambar5) ?>" id="gambar_load5" class="form-control" style="border-radius: 10px; height: 25vh; object-fit: cover;">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/gambar_tambahan/kosong.jpg') ?>" class="form-control img-responsive" id="gambar_load5" style="border-radius: 10px; height: 20vh;">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                            <label style="color: black; font-weight: 1000;">Prev 6</label>
                                <?php if (!empty($produk->gambar6)) : ?>
                                    <img src="<?= base_url('gambar/' . $produk->gambar6) ?>" id="gambar_load6" class="form-control" style="border-radius: 10px; height: 25vh; object-fit: cover;">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/gambar_tambahan/kosong.jpg') ?>" class="form-control img-responsive" id="gambar_load6" style="border-radius: 10px; height: 20vh;">
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <a href="<?= base_url('produk') ?>" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Kembali</a>
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
    function bacaGambar(input, previewID) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(previewID).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function () {
        for (var i = 1; i <= 6; i++) {
            (function (i) {
                $("#preview_gambar" + i).change(function () {
                    bacaGambar(this, "#gambar_load" + i);
                });
            })(i);
        }
    });
</script>
