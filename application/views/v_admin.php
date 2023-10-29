
<div class="container-fluid mt-3">
    <div class="row">
    <?php if ($this->session->userdata('level_user') == '1'): ?>
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-7">
                <div class="card-body">
                    <h3 class="card-title text-white">Pesanan</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white"><?= $belum_bayar ?></h2>
                        <p class="text-white mb-0"><?php echo date("d - F Y"); ?></p>
                        <a href="<?= base_url('admin/pesanan_masuk') ?>" class="text-white mb-0">More Info <i class="fa fa-arrow-right" aria-hidden="true"></i></a>                   
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-bag"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Diproses</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white"><?= $sudah_bayar ?></h2>
                        <p class="text-white mb-0"><?php echo date("d - F Y"); ?></p>
                        <a href="<?= base_url('admin/pesanan_masuk') ?>" class="text-white mb-0">More Info <i class="fa fa-arrow-right" aria-hidden="true"></i></a>                   
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-spinner"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-9">
                <div class="card-body">
                    <h3 class="card-title text-white">Dikirim</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white"><?= $dikirim ?></h2>
                        <p class="text-white mb-0"><?php echo date("d - F Y"); ?></p>
                        <a href="<?= base_url('admin/pesanan_masuk') ?>" class="text-white mb-0">More Info <i class="fa fa-arrow-right" aria-hidden="true"></i></a>                   
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-truck"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-5">
                <div class="card-body">
                    <h3 class="card-title text-white">Selesai</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white"><?= $selesai ?></h2>
                        <p class="text-white mb-0"><?php echo date("d - F Y"); ?></p>
                        <a href="<?= base_url('admin/pesanan_masuk') ?>" class="text-white mb-0">More Info <i class="fa fa-arrow-right" aria-hidden="true"></i></a>                   
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Pendapatan</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">$ 8541</h2>
                        <p class="text-white mb-0">Jan - March 2019</p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                </div>
            </div>
        </div> -->
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Produk</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white"><?= $total_produk ?></h2>
                        <p class="text-white mb-0"><?php echo date("d - F Y"); ?></p>
                        <a href="<?= base_url('produk') ?>" class="text-white mb-0">More Info <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-birthday-cake"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Kategori Produk</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white"><?= $total_kategori ?></h2>
                        <p class="text-white mb-0"><?php echo date("d - F Y"); ?></p>
                        <a href="<?= base_url('kategori') ?>" class="text-white mb-0">More Info <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-cubes"></i></span>
                </div>
            </div>
        </div>
        <?php if ($this->session->userdata('level_user') == '1'): ?>
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Pelanggan</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white"><?= $total_pelanggan ?></h2>
                        <p class="text-white mb-0"><?php echo date("d - F Y"); ?></p>
                        <a href="<?= base_url('pelanggan') ?>" class="text-white mb-0">More Info <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card gradient-7">
                <div class="card-body">
                    <h3 class="card-title text-white">Total Pendapatan</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white" style="font-size: 48px;">Rp. <?= number_format($total_pendapatan, 0) ?></h2>
                        <p class="text-white mb-0"><?php echo date("d - F Y"); ?></p>
                    </div>
                    <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body pb-0 d-flex justify-content-between">
                            <div>
                                <h4 class="mb-1">Product Sales</h4>
                                <p>Total Earnings of the Month</p>
                                <h3 class="m-0">$ 12,555</h3>
                            </div>
                            <div>
                                <ul>
                                    <li class="d-inline-block mr-3"><a class="text-dark" href="#">Day</a>
                                    </li>
                                    <li class="d-inline-block mr-3"><a class="text-dark" href="#">Week</a>
                                    </li>
                                    <li class="d-inline-block"><a class="text-dark" href="#">Month</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="chart-wrapper">
                            <canvas id="chart_widget_2"></canvas>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="w-100 mr-2">
                                    <h6>Pixel 2</h6>
                                    <div class="progress" style="height: 6px">
                                        <div class="progress-bar bg-danger" style="width: 40%"></div>
                                    </div>
                                </div>
                                <div class="ml-2 w-100">
                                    <h6>iPhone X</h6>
                                    <div class="progress" style="height: 6px">
                                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
<!-- #/ container -->
</div>
<!--**********************************
 Content body end
***********************************-->