<!-- Page Title -->
<section class="page-title" style="background-image:url(<?= base_url()?>assets/home2/images/background/2.jpg);">
    <div class="auto-container">
        <div class="inner-box">
            <h1>Pesanan Saya</h1>
            <div class="bread-crumb"><a href="<?= base_url('home')?>">Home &nbsp; /</a> <i class="current">Pesanan
                    Saya</i></div>
        </div>
    </div>
</section>
<!-- End Page Title -->
<br>
<br>
<br>
<div class="row" style="margin:20px;">
    <div class="col-12 col-md-12 col-sm-12">
    <?php

if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success alert-dismissible" style="background-color: rgb(63, 255, 0); color: black;">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <h5><i class="icon fa fa-check"></i> Succes</h5>';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}

?>
        <div class="sec-title" style="text-align: center;">
            <h1>Pesanan Saya</h1>
            <div class="separator"></div>
        </div>
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pesanan" data-toggle="pill"
                            href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                            aria-selected="true">Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                            href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                            aria-selected="false">Diproses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill"
                            href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages"
                            aria-selected="false">Dikirim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill"
                            href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings"
                            aria-selected="false">Selesai</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                        aria-labelledby="pesanan">
                        <!-- Data Order -->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="color: black; font-weight: 1000;" class="order-1">No Order</th>
                                        <th style="color: black; font-weight: 1000;" class="order-2">Tanggal Order</th>
                                        <th style="color: black; font-weight: 1000;" class="order-3">Exspedisi</th>
                                        <th style="color: black; font-weight: 1000;" class="order-5">Total Bayar</th>
                                        <th style="color: black; font-weight: 1000;" class="order-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($belum_bayar as $key => $value) { ?>
                                        <tr>
                                            <td style="color: black; font-weight: 1000;"><?= $value->no_order ?></td>
                                            <td style="color: black; font-weight: 1000;"><?= $value->tgl_order ?></td>
                                            <td style="color: black; font-weight: 1000;">
                                                <?= $value->exspedisi ?> <br>
                                                Paket : <?= $value->paket ?> <br>
                                                Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                                            </td>
                                            <td style="color: black; font-weight: 1000;">
                                                Rp. <?= number_format($value->total_bayar, 0) ?> <br>
                                                <?php if ($value->status_bayar==0) { ?>
                                                    <small class="badge badge-danger"><i class="fas fa-exclamation"></i> Belum Bayar</small>
                                                <?php } else{ ?>
                                                    <small class="badge badge-success"><i class="fas fa-check"></i> Sudah Bayar</small><br>
                                                    <small class="badge badge-warning"><i class="fas fa-hourglass-half"></i> Menunggu Verifikasi</small>
                                                <?php } ?>
                                            </td>
                                            <td style="color: black; font-weight: 1000;">
                                            <?php if ($value->status_bayar==0) { ?>
                                                <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary"><i class="fas fa-money-bill"></i> Bayar</a>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                        aria-labelledby="custom-tabs-four-profile-tab">
                        <div class="table-responsive">
                            <!-- Data Di Proses -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="color: black; font-weight: 1000;" class="order-1">No Order</th>
                                        <th style="color: black; font-weight: 1000;" class="order-2">Tanggal Order</th>
                                        <th style="color: black; font-weight: 1000;" class="order-3">Exspedisi</th>
                                        <th style="color: black; font-weight: 1000;" class="order-5">Total Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($diproses as $key => $value) { ?>
                                        <tr>
                                            <td style="color: black; font-weight: 1000;"><?= $value->no_order ?></td>
                                            <td style="color: black; font-weight: 1000;"><?= $value->tgl_order ?></td>
                                            <td style="color: black; font-weight: 1000;">
                                                <?= $value->exspedisi ?> <br>
                                                Paket : <?= $value->paket ?> <br>
                                                Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                                            </td>
                                            <td style="color: black; font-weight: 1000;">
                                                Rp. <?= number_format($value->total_bayar, 0) ?> <br>
                                                <small class="badge badge-success"><i class="fas fa-check"></i>  Terverifikasi</small><br>
                                                <small class="badge badge-warning"><i class="fas fa-cogs"></i>   Diproses</small>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                        aria-labelledby="custom-tabs-four-messages-tab">
                        <div class="table-responsive">
                            <!-- Data Di Kirim -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="color: black; font-weight: 1000;" class="order-1">No Order</th>
                                        <th style="color: black; font-weight: 1000;" class="order-2">Tanggal Order</th>
                                        <th style="color: black; font-weight: 1000;" class="order-3">Exspedisi</th>
                                        <th style="color: black; font-weight: 1000;" class="order-5">Total Bayar</th>
                                        <th style="color: black; font-weight: 1000;" class="order-5">No Resi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dikirim as $key => $value) { ?>
                                        <tr>
                                            <td style="color: black; font-weight: 1000;"><?= $value->no_order ?></td>
                                            <td style="color: black; font-weight: 1000;"><?= $value->tgl_order ?></td>
                                            <td style="color: black; font-weight: 1000;">
                                                <?= $value->exspedisi ?> <br>
                                                Paket : <?= $value->paket ?> <br>
                                                Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                                            </td>
                                            <td style="color: black; font-weight: 1000;">
                                                Rp. <?= number_format($value->total_bayar, 0) ?> <br>
                                                <small class="badge badge-success"><i class="fas fa-truck"></i>  Dikirim</small>
                                            </td>
                                            <td>
                                                <h5 style="color: black; font-weight: 600;"><?= $value->no_resi ?></h5><br>
                                                <button type="button"  data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>" class="btn btn-primary btn-sm"><i class="fas fa-check-circle"></i> Diterima</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel"
                        aria-labelledby="custom-tabs-four-settings-tab">
                        <div class="table-responsive">
                            <!-- Data Di Kirim -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="color: black; font-weight: 1000;" class="order-1">No Order</th>
                                        <th style="color: black; font-weight: 1000;" class="order-2">Tanggal Order</th>
                                        <th style="color: black; font-weight: 1000;" class="order-3">Exspedisi</th>
                                        <th style="color: black; font-weight: 1000;" class="order-5">Total Bayar</th>
                                        <th style="color: black; font-weight: 1000;" class="order-5">No Resi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($selesai as $key => $value) { ?>
                                        <tr>
                                            <td style="color: black; font-weight: 1000;"><?= $value->no_order ?></td>
                                            <td style="color: black; font-weight: 1000;"><?= $value->tgl_order ?></td>
                                            <td style="color: black; font-weight: 1000;">
                                                <?= $value->exspedisi ?> <br>
                                                Paket : <?= $value->paket ?> <br>
                                                Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                                            </td>
                                            <td style="color: black; font-weight: 1000;">
                                                Rp. <?= number_format($value->total_bayar, 0) ?> <br>
                                                <small class="badge badge-success"><i class="fas fa-check"></i>  Selesai</small>
                                            </td>
                                            <td>
                                                <h5 style="color: black; font-weight: 600;"><?= $value->no_resi ?></h5><br>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
<br>
<br>
<br>


  <!-- Modal Untuk Pesanan Diterima-->
<?php foreach ($dikirim as $key => $value) { ?>
  <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pesanan Diterima</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Pesanan Sudah Diterima..??</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>" class="btn btn-primary">Diterima</a>
                </div>
            </div>
        </div>
    </div>
 <?php } ?>