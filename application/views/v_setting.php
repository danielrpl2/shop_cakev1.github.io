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
                                <select name="provinsi" class="form-control" id="provinsi-select">
                                    <option value="">Cari Provinsi</option> <!-- Mengubah teks Pilih Provinsi menjadi Cari Provinsi -->
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Kota</label>
                                <select name="kota" class="form-control"></select>
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
       $.ajax({
        type: "GET",
        url: "<?= base_url('rajaongkir/provinsi') ?>",
        dataType: 'json',
        success: function(data) {
            var provinsiSelect = $('#provinsi-select');
            provinsiSelect.empty();
            provinsiSelect.append('<option value="">Cari Provinsi</option>'); // Mengubah teks Pilih Provinsi menjadi Cari Provinsi

            $.each(data, function(index, value) {
                provinsiSelect.append('<option value="' + value.province_id + '">' + value.province + '</option>');
            });
        },
        error: function() {
            console.error('Terjadi kesalahan dalam mengambil data provinsi.');
        }
       });
    });
</script>

<!-- 32.17 -->