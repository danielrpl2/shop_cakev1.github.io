<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" style="text-align: center;">Setting <?= $header ?></h3>

                    <?php echo form_open_multipart('produk/add') ?>

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
                                <select name="kota" class="form-control"></select>
                                <option value=""></option>
                            </div>
                        </div>
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


<!-- 32.17 -->