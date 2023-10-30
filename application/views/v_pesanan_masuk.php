<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <h4 class="card-title text-center">
                                <?= $title ?>
                            </h4>
                            <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible" style="background-color: rgb(63, 255, 0); color: black;">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> Succes</h5>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }

                    ?>
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-three-pesanan-tab" data-toggle="pill"
                                        href="#custom-tabs-three-pesanan" role="tab"
                                        aria-controls="custom-tabs-three-pesanan" aria-selected="true">Pesanan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-diproses-tab" data-toggle="pill"
                                        href="#custom-tabs-three-diproses" role="tab"
                                        aria-controls="custom-tabs-three-diproses" aria-selected="false">Diproses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-dikirim-tab" data-toggle="pill"
                                        href="#custom-tabs-three-dikirim" role="tab"
                                        aria-controls="custom-tabs-three-dikirim" aria-selected="false">Dikirim</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-three-selesai-tab" data-toggle="pill"
                                        href="#custom-tabs-three-selesai" role="tab"
                                        aria-controls="custom-tabs-three-selesai" aria-selected="false">Selesai</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="custom-tabs-three-tabContent">

                            <div class="tab-pane fade show active" id="custom-tabs-three-pesanan" role="tabpanel"
                                aria-labelledby="custom-tabs-three-pesanan-tab">
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
                                            <?php
                                               $pesanan = array_reverse($pesanan);
                                               $isNewest = true;

                                                foreach ($pesanan as $key => $value) {
                                                    $tgl_order = strtotime($value->tgl_order);
                                                    $tgl_sekarang = time();
                                                    $selisih = date_diff(date_create($value->tgl_order), date_create(date("Y-m-d H:i:s")));
                                            
                                                ?>
                                            <tr>
                                                <td style="color: black; font-weight: 600;">
                                                    <?= $value->no_order ?>
                                                </td>
                                                <td style="color: black; font-weight: 600;">
                                                    <?= $value->tgl_order ?><br>
                                                    <?php
                                                            $tgl_order = new DateTime($value->tgl_order);
                                                            $tgl_sekarang = new DateTime();
                                                            $selisih = $tgl_sekarang->diff($tgl_order);
                                                            
                                                            if ($selisih->days <= 1) { // Tampilkan "New" jika pesanan terbaru (dalam 7 hari)
                                                                echo '<span class="badge badge-info">New</span>';
                                                            } else { // Tampilkan berapa lama jika pesanan sudah lama
                                                                echo '<span class="badge badge-secondary">' . $selisih->days . ' hari lalu</span>';
                                                            }

                                                            ?>
                                                </td>
                                                <td style="color: black; font-weight: 600;">
                                                    Exspedisi :
                                                    <?= $value->exspedisi ?> <br>
                                                    Paket :
                                                    <?= $value->paket ?> <br>
                                                    Ongkir : Rp.
                                                    <?= number_format($value->ongkir, 0) ?>
                                                </td>
                                                <td style="color: black; font-weight: 600;">
                                                    Rp.
                                                    <?= number_format($value->total_bayar, 0) ?> <br>
                                                    <?php if ($value->status_bayar == 0) { ?>
                                                    <small class="badge badge-danger"><i class="fa fa-exclamation"></i>
                                                        Belum Bayar</small>
                                                    <?php } else { ?>
                                                    <small class="badge badge-success"><i class="fa fa-check"></i> Sudah
                                                        Bayar</small><br>
                                                    <small class="badge badge-warning"><i
                                                            class="fa fa-hourglass-half"></i> Menunggu
                                                        Verifikasi</small>
                                                    <?php } ?>
                                                </td>
                                                <td style="color: black; font-weight: 600;">
                                                    <?php if ($value->status_bayar == 1) { ?>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#cek<?= $value->id_transaksi ?>">Cek Bukti
                                                        Bayar</button>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#proses<?= $value->id_transaksi ?>">Proses</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-three-diproses" role="tabpanel"
                                aria-labelledby="custom-tabs-three-diproses-tab">
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

                            <div class="tab-pane fade" id="custom-tabs-three-dikirim" role="tabpanel"
                                aria-labelledby="custom-tabs-three-dikirim-tab">
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

                            <div class="tab-pane fade" id="custom-tabs-three-selesai" role="tabpanel"
                                aria-labelledby="custom-tabs-three-selesai-tab">
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
    <!-- #/ container -->
</div>

<!-- Modal Untuk Kirim -->
<?php foreach ($pesanan_diproses as $key => $value) { ?>
<div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header">
                <h5 class="modal-title">No Order :
                    <?= $value->no_order ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open('admin/kirim/' . $value->id_transaksi); ?>

                <table class="table">
                    <tr>
                        <th>Exspedisi</th>
                        <th>:</th>
                        <td>
                            <?= $value->exspedisi ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Paket</th>
                        <th>:</th>
                        <td>
                            <?= $value->paket ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Ongkir</th>
                        <th>:</th>
                        <td> Rp.
                            <?= number_format($value->ongkir, 0) ?>
                        </td>
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


<!-- modal untuk proses -->
<?php foreach ($pesanan as $key => $value) { ?>
<div class="modal fade" id="proses<?= $value->id_transaksi ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header">
                <h5 class="modal-title">Yakin Akan Memproses Pesanan Ini ? : (
                    <?= $value->no_order ?> )
                </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open('admin/proses/' . $value->id_transaksi); ?>
                <table class="table">
                    <tr>
                        <th>Exspedisi</th>
                        <th>:</th>
                        <td>
                            <?= $value->exspedisi ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Paket</th>
                        <th>:</th>
                        <td>
                            <?= $value->paket ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Ongkir</th>
                        <th>:</th>
                        <td>Rp.
                            <?= number_format($value->ongkir, 0) ?>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="sumbit" class="btn btn-primary">Proses</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?php } ?>

<!-- modal untuk cek bukti bayar -->
<?php foreach ($pesanan as $key => $value) { ?>
<div class="modal fade" id="cek<?= $value->id_transaksi ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">No Order :
                    <?= $value->no_order ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <th>Nama Bank</th>
                        <th>:</th>
                        <td>
                            <?= $value->nama_bank ?>
                        </td>
                    </tr>
                    <tr>
                        <th>No Rek</th>
                        <th>:</th>
                        <td>
                            <?= $value->no_rek ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Atas Nama</th>
                        <th>:</th>
                        <td>
                            <?= $value->atas_nama ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Bayar</th>
                        <th>:</th>
                        <td> Rp.
                            <?= number_format($value->total_bayar, 0) ?>
                        </td>
                    </tr>
                </table>
                <img style="width: 100%; height: 100%; object-fit: cover;"
                    src="<?= base_url('bukti_bayar/' . $value->bukti_bayar) ?>" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>