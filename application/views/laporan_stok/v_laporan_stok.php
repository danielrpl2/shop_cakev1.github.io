<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Form Laporan Stok Masuk</h5>
                    <p class="card-text">Silahkan Klik Button DI Bawah!</p>
                    <a href="<?php echo base_url('laporan/laporan_stok_masuk'); ?>" class="btn btn-primary">Laporan Stok
                        Masuk</a>
                </div>
                <?php
                            $tanggalSekarang = date('Y-m-d');
                            $tanggalFormatIndonesia = date('d F Y', strtotime($tanggalSekarang));
                            ?>
                <div class="card-footer text-muted"><?= $tanggalFormatIndonesia ?></div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Form Laporan Stok Keluar</h5>
                    <p class="card-text">Silahkan Klik Button DI Bawah!</p>
                    <a href="<?php echo base_url('laporan/laporan_stok_keluar'); ?>" class="btn btn-primary">Laporan
                        Stok Keluar</a>
                </div>
                <?php
                            $tanggalSekarang = date('Y-m-d');
                            $tanggalFormatIndonesia = date('d F Y', strtotime($tanggalSekarang));
                            ?>
                <div class="card-footer text-muted"><?= $tanggalFormatIndonesia ?></div>
            </div>
        </div>
    </div>
</div>