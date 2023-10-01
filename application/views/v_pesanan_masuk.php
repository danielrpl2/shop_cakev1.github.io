<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?= $title ?></h4>
                    <!-- Nav tabs -->
                    <?php

                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible" style="background-color: rgb(63, 255, 0); color: black;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> Succes</h5>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }

                    ?>
                    <div class="default-tab">
                        <ul class="nav nav-tabs mb-4">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#pesanan_masuk">Pesanan Masuk</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#diproses">Diproses</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#dikirim">Dikirim</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#selesai">Selesai</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pesanan_masuk">
                                <div class="p-t-15">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th style="color: black; font-weight: 1000;">No Order</th>
                                                    <th style="color: black; font-weight: 1000;">Tanggal Order</th>
                                                    <th style="color: black; font-weight: 1000;">Exspedisi</th>
                                                    <th style="color: black; font-weight: 1000;">Total Bayar</th>
                                                    <th style="color: black; font-weight: 1000;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($pesanan as $key => $value) { ?>
                                                <tr>
                                                <td style="color: black; font-weight: 600;"><?= $value->no_order ?></td>
                                            <td style="color: black; font-weight: 600;"><?= $value->tgl_order ?></td>
                                            <td style="color: black; font-weight: 600;">
                                                <?= $value->exspedisi ?> <br>
                                                Paket : <?= $value->paket ?> <br>
                                                Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                                            </td>
                                            <td style="color: black; font-weight: 600;">
                                                Rp. <?= number_format($value->total_bayar, 0) ?> <br>
                                                <?php if ($value->status_bayar==0) { ?>
                                                    <small class="badge badge-danger"><i class="fa fa-exclamation"></i> Belum Bayar</small>
                                                <?php } else{ ?>
                                                    <small class="badge badge-success"><i class="fa fa-check"></i> Sudah Bayar</small><br>
                                                    <small class="badge badge-warning"><i class="fa fa-hourglass-half"></i> Menunggu Verifikasi</small>
                                                <?php } ?>
                                            </td>
                                            <td style="color: black; font-weight: 600;">
                                            <?php if ($value->status_bayar==1) { ?>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Cek Bukti Bayar</button>
                                                <a href="<?= base_url('admin/proses/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-money-bill"></i> Proses</a>
                                            <?php } ?>
                                            </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="diproses">
                                <div class="p-t-15">
                                <div class="table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th style="color: black; font-weight: 1000;">No Order</th>
                                                    <th style="color: black; font-weight: 1000;">Tanggal Order</th>
                                                    <th style="color: black; font-weight: 1000;">Exspedisi</th>
                                                    <th style="color: black; font-weight: 1000;">Total Bayar</th>
                                                    <th style="color: black; font-weight: 1000;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($pesanan_diproses as $key => $value) { ?>
                                                <tr>
                                                <td style="color: black; font-weight: 600;"><?= $value->no_order ?></td>
                                            <td style="color: black; font-weight: 600;"><?= $value->tgl_order ?></td>
                                            <td style="color: black; font-weight: 600;">
                                                <?= $value->exspedisi ?> <br>
                                                Paket : <?= $value->paket ?> <br>
                                                Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                                            </td>
                                            <td style="color: black; font-weight: 600;">
                                                Rp. <?= number_format($value->total_bayar, 0) ?> <br>
                                                <small class="badge badge-success"><i class="fa fa-hourglass-half"></i> Diproses</small>
                                            </td>
                                            <td style="color: black; font-weight: 600;">
                                            <?php if ($value->status_bayar==1) { ?>
                                                <button type="button" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-paper-plane"></i> Kirim</button>
                                            <?php } ?>
                                            </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="dikirim">
                                <div class="p-t-15">
                                <div class="table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th style="color: black; font-weight: 1000;">No Order</th>
                                                    <th style="color: black; font-weight: 1000;">Tanggal Order</th>
                                                    <th style="color: black; font-weight: 1000;">Exspedisi</th>
                                                    <th style="color: black; font-weight: 1000;">Total Bayar</th>
                                                    <th style="color: black; font-weight: 1000;">No Resi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($pesanan_dikirim as $key => $value) { ?>
                                                <tr>
                                                <td style="color: black; font-weight: 600;"><?= $value->no_order ?></td>
                                            <td style="color: black; font-weight: 600;"><?= $value->tgl_order ?></td>
                                            <td style="color: black; font-weight: 600;">
                                                <?= $value->exspedisi ?> <br>
                                                Paket : <?= $value->paket ?> <br>
                                                Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                                            </td>
                                            <td style="color: black; font-weight: 600;">
                                                Rp. <?= number_format($value->total_bayar, 0) ?> <br>
                                                <small class="badge badge-success"><i class="fa fa-truck"></i> Dikirim</small>
                                            </td>
                                            <td style="color: black; font-weight: 600;"><?= $value->no_resi ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="selesai">
                                <div class="p-t-15">
                                <div class="table-responsive">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th style="color: black; font-weight: 1000;">No Order</th>
                                                    <th style="color: black; font-weight: 1000;">Tanggal Order</th>
                                                    <th style="color: black; font-weight: 1000;">Exspedisi</th>
                                                    <th style="color: black; font-weight: 1000;">Total Bayar</th>
                                                    <th style="color: black; font-weight: 1000;">No Resi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($pesanan_selesai as $key => $value) { ?>
                                                <tr>
                                                <td style="color: black; font-weight: 600;"><?= $value->no_order ?></td>
                                            <td style="color: black; font-weight: 600;"><?= $value->tgl_order ?></td>
                                            <td style="color: black; font-weight: 600;">
                                                <?= $value->exspedisi ?> <br>
                                                Paket : <?= $value->paket ?> <br>
                                                Ongkir : Rp. <?= number_format($value->ongkir, 0) ?>
                                            </td>
                                            <td style="color: black; font-weight: 600;">
                                                Rp. <?= number_format($value->total_bayar, 0) ?> <br>
                                                <small class="badge badge-success"><i class="fa fa-check"></i> Diterima</small>
                                            </td>
                                            <td style="color: black; font-weight: 600;"><?= $value->no_resi ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
</div>


<!-- Modal Untuk Kirim -->
<?php foreach ($pesanan_diproses as $key => $value) { ?>
<div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">No Order : <?= $value->no_order ?></h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

              <?php echo form_open('admin/kirim/' . $value->id_transaksi); ?>

                  <table class="table">
                        <tr>
                            <th>Exspedisi</th>
                            <th>:</th>
                            <td><?= $value->exspedisi ?></td>
                        </tr>
                        <tr>
                            <th>Paket</th>
                            <th>:</th>
                            <td><?= $value->paket ?></td>
                        </tr>
                        <tr>
                            <th>Ongkir</th>
                            <th>:</th>
                            <td> Rp. <?= number_format($value->ongkir, 0) ?></td>
                        </tr>
                        <tr>
                            <th>No Resi</th>
                            <th>:</th>
                            <td><input class="form-control" name="no_resi" placeholder="No Resi" required></td>
                        </tr>
                    </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="sumbit" class="btn btn-primary">Kirim</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php } ?>



<!-- modal untuk cek bukti bayar -->
<?php foreach ($pesanan as $key => $value) { ?>
    <div class="modal fade" id="cek<?= $value->id_transaksi ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">No Order : <?= $value->no_order ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Nama Bank</th>
                            <th>:</th>
                            <td><?= $value->nama_bank ?></td>
                        </tr>
                        <tr>
                            <th>No Rek</th>
                            <th>:</th>
                            <td><?= $value->no_rek ?></td>
                        </tr>
                        <tr>
                            <th>Atas Nama</th>
                            <th>:</th>
                            <td><?= $value->atas_nama ?></td>
                        </tr>
                        <tr>
                            <th>Total Bayar</th>
                            <th>:</th>
                            <td> Rp. <?= number_format($value->total_bayar, 0) ?></td>
                        </tr>
                    </table>
                    <img style="width: 100%; height: 100%; object-fit: cover;" src="<?= base_url('bukti_bayar/' . $value->bukti_bayar) ?>" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>