<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" style="text-align: center;">Stok Keluar</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="example1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah Keluar</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Kasir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($stok_keluar as $stok) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $stok->nama_produk ?></td>
                                        <td><?= $stok->total_qty ?></td>
                                        <td><?= $stok->tanggal ?></td>
                                        <td><?= $stok->nama_user ?></td>
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
