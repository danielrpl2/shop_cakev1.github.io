<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Laporan Harian</h4>
                    <p class="text-muted"><code></code>
                    </p>
                    <div id="accordion-one" class="accordion">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa" aria-hidden="true"></i> Tanggal</h5>
                            </div>
                            <div id="collapseOne" class="collapse" data-parent="#accordion-one">

                                <?php echo form_open('laporan/harian') ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <select name="tanggal" class="form-control">
                                        <?php
                                            $mulai = date("j"); // Mendapatkan tanggal saat ini (format 1-31)

                                            for ($i = $mulai; $i <= $mulai + 30; $i++) {
                                                $tanggal = ($i <= 31) ? $i : $i - 31; // Kembali ke tanggal 1 setelah 31
                                                echo '<option value="' . $tanggal . '">' . $tanggal . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa" aria-hidden="true"></i> Bulan</h5>
                            </div>
                            <div id="collapseTwo" class="collapse" data-parent="#accordion-one">
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <select name="bulan" class="form-control">
                                            <?php
                                                $bulanSekarang = date("n"); // Mengambil bulan saat ini (format 1-12)
                                                $namaBulan = array(
                                                    1 => "Januari",
                                                    2 => "Februari",
                                                    3 => "Maret",
                                                    4 => "April",
                                                    5 => "Mei",
                                                    6 => "Juni",
                                                    7 => "Juli",
                                                    8 => "Agustus",
                                                    9 => "September",
                                                    10 => "Oktober",
                                                    11 => "November",
                                                    12 => "Desember"
                                                );

                                                // Letakkan "Januari" paling atas
                                                echo '<option value="' . $bulanSekarang . '">' . $namaBulan[$bulanSekarang] . '</option>';

                                                for ($i = 1; $i <= 12; $i++) {
                                                    $bulanIndex = ($bulanSekarang + $i > 12) ? $bulanSekarang + $i - 12 : $bulanSekarang + $i;
                                                    if ($bulanIndex != $bulanSekarang) {
                                                        echo '<option value="' . $bulanIndex . '">' . $namaBulan[$bulanIndex] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa" aria-hidden="true"></i> Tahun</h5>
                            </div>
                            <div id="collapseThree" class="collapse" data-parent="#accordion-one">
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <select name="tahun" class="form-control">
                                            <?php
                                                $tahunSekarang = date('Y'); // Mendapatkan tahun saat ini

                                                $mulai = $tahunSekarang - 5; // 10 tahun sebelumnya
                                                $akhir = $tahunSekarang + 1000; // 1000 tahun ke depan

                                                for ($i = $mulai; $i <= $akhir; $i++) {
                                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Cetak Laporan</button>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Laporan Bulanan</h4>
                    <p class="text-muted"><code></code>
                    </p>
                    <div id="accordion-two" class="accordion">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo2"
                                    aria-expanded="false" aria-controls="collapseTwo2"><i class="fa"
                                        aria-hidden="true"></i> Accordion Header Two</h5>
                            </div>
                            <div id="collapseTwo2" class="collapse" data-parent="#accordion-two">
                                <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life
                                    accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Laporan Tahunan</h4>
                    <p class="text-muted"><code></code>
                    </p>
                    <div id="accordion-three" class="accordion">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo5"
                                    aria-expanded="false" aria-controls="collapseTwo5"><i class="fa"
                                        aria-hidden="true"></i> Accordion Header Two</h5>
                            </div>
                            <div id="collapseTwo5" class="collapse" data-parent="#accordion-three">
                                <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life
                                    accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                                    skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->