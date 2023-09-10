<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" style="text-align: center;">Setting <?= $header ?></h3>

                    <?php 
                     if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible" style="background-color: rgb(63, 255, 0); color: black;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> Succes</h5>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    
                    echo form_open_multipart('admin/setting'); ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Provinsi</label>
                                <select name="provinsi" class="form-control"></select>
                                <option value=""></option>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Kota</label>
                                <select name="kota" class="form-control">
                                <option value="<?= $setting->lokasi ?>"><?= $setting->lokasi ?></option>
                                </select>
                               
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Nama Toko</label>
                               <input type="text" name="nama_toko" class="form-control" value="<?= $setting->nama_toko ?>" required placeholder="Nama Toko">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">No Telepon</label>
                               <input type="number" name="no_telepon" class="form-control" value="<?= $setting->no_telepon ?>" required placeholder="No Telepon">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Alamat Toko</label>
                                <textarea name="alamat_toko" class="form-control" value="<?= $setting->alamat_toko ?>" cols="30" rows="5" required placeholder="Alamat Toko"><?= $setting->alamat_toko ?></textarea>
                            </div>
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Mengimpor jQuery -->
<script>
   $(document).ready(function() {
    //data provinsi
    $.ajax({
        type: "POST", 
        url: "<?= base_url('rajaongkir/provinsi') ?>",
        success: function(hasil_provinsi) {
            $("select[name=provinsi]").html(hasil_provinsi);
        }
    });

    //data kota
       $("select[name=provinsi]").on("change", function() {
        var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/kota') ?>",
            data : 'id_provinsi=' + id_provinsi_terpilih,
            success : function(hasil_kota){
                $("select[name=kota]").html(hasil_kota);
            }
        });
     });
  });
</script>