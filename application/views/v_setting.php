<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" style="text-align: center;">Setting <?= $header ?></h3>

                    <?php echo form_open('setting'); ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Provinsi</label>
                                <select name="provinsi" class="form-control"></select>
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
                            <a href="<?= base_url('admin') ?>" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Kembali</a>
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
            // Memasukkan ke select provinsi
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/provinsi') ?>",
                success: function(hasil_provinsi){
                    // console.log(hasil_provinsi);
                    $("select[name=provinsi]").html(hasil_provinsi);
                } 
            });
            
            $("select[name=provinsi]").on("change", function(){
                var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
                
                $.ajax({
                    type: "POST",
                    url: "<?= base_url("rajaongkir/kota") ?>",
                    data: 'id_provinsi=' + id_provinsi_terpilih,
                    success: function(hasil_kota){
                        // console.log(hasil_kota);
                        $("select[name=kota]").html(hasil_kota);
                    }
                });
            });
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
// Cuntuk sweet alert
<?php if ($this->session->flashdata('swal') === 'success'): ?>
    Swal.fire({
        title: 'Success',
        text: '<?= $this->session->flashdata("pesan") ?>',
        icon: 'success',
        confirmButtonText: 'OK'
    });
<?php elseif ($this->session->flashdata('swal') === 'error'): ?>
    Swal.fire({
        title: 'Error',
        text: '<?= $this->session->flashdata("pesan") ?>',
        icon: 'error',
        confirmButtonText: 'OK'
    });
<?php endif; ?>
</script>