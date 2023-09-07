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
                                <label style="color: black; font-weight: 1000;">Foto Produk</label>
                                <input type="file" name="gambar" class="form-control" id="preview_gambar">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <img src="<?= base_url('gambar/'. $produk->gambar) ?>" id="gambar_load" style="width: 60%; border-radius:10px;">
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
