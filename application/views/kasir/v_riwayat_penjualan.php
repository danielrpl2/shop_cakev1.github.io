<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" style="text-align: center;">Riwayat Penjualan</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration" id="example1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Invoice</th>
                                    <th>Tanggal Jual</th>
                                    <th>Grand Total</th>
                                    <th>Bayar</th>
                                    <th>Kembali</th>                                    
                                    <th>Kasir</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($sales_history as $sale) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $sale->id_penjualan ?></td>
                                        <td><?= $sale->tanggal_jual ?></td>
                                        <td>Rp. <?= number_format($sale->sub_total,0) ?></td>
                                        <td>Rp. <?= number_format($sale->cash,0) ?></td>
                                        <td><?= $sale->change ?></td>                                       
                                        <td><?= $sale->nama_user ?></td>
                                        <td>
                                        <a href="javascript:void(0);" onclick="printNota('<?= $sale->id_penjualan ?>')" class="btn btn-success btn-sm" title="Print Nota" id="printButton_<?= $sale->id_penjualan ?>">
                                            <i class="fa fa-print"></i>
                                        </a>

                                        </td>
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
<script>
    function printNota(idPenjualan) {
        // Kirim request ke server untuk menghasilkan halaman print
        // Berdasarkan ID Penjualan atau cara lain sesuai kebutuhan
        // Jangan lupa sesuaikan URL dengan endpoint yang benar di aplikasi Anda
        fetch(`<?= base_url('penjualan/print_nota/') ?>${idPenjualan}`)
            .then(response => response.text())
            .then(data => {
                // Buat elemen iframe untuk menyimpan halaman print
                const iframe = document.createElement('iframe');
                iframe.style.display = 'none';
                document.body.appendChild(iframe);

                // Isi iframe dengan halaman print
                iframe.contentDocument.write(data);
                iframe.contentDocument.close();

                // Panggil fungsi print pada iframe
                iframe.contentWindow.print();

                // Hapus iframe setelah mencetak
                document.body.removeChild(iframe);
            })
            .catch(error => console.error('Error:', error));
    }
</script>
