<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>



<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4><?= $title ?></h4>
                    </div>
                    <!-- Tanggal di atas tabel -->
                    <p class="text-center" id="printDate">
                    Data Laporan Pendapatan Penjualan Toko Online Orabella Bakery <br>
                    <img src="<?= base_url() ?>favicon2.png" alt="Logo" width="20%"><br>
                        Tanggal: <?= $tanggal ?>/<?= $bulan ?>/<?= $tahun ?>
                    </p>
                    <div class="table-responsive">
    <table class="table table-striped" id="printTable">
        <thead>
            <tr>
                <th>#</th>
                <th>No Order</th>
                <th>Nama Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Ongkir</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $grand_total = 0;

            // Inisialisasi array untuk menyimpan data produk berdasarkan nomor order
            $order_products = array();

            foreach ($laporan as $value) {
                // Inisialisasi data produk untuk nomor order tertentu
                if (!isset($order_products[$value->no_order])) {
                    $order_products[$value->no_order] = array(
                        'nama_produk' => array(),
                        'harga' => array(),
                        'qty' => array(),
                        'ongkir' => $value->ongkir,
                        'total_harga' => $value->total_bayar // Total harga diinisialisasi dengan total_bayar
                    );
                }

                // Menambahkan nama produk, qty, dan harga ke dalam array data produk
                $order_products[$value->no_order]['nama_produk'][] = $value->nama_produk;
                $order_products[$value->no_order]['harga'][] = $value->harga;
                $order_products[$value->no_order]['qty'][] = $value->qty;
            }

            // Menampilkan data produk dalam tabel
            foreach ($order_products as $order => $product_data) {
            ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <td><?= $order ?></td>
                    <td><?= implode("<br/>", $product_data['nama_produk']) ?></td>
                    <td><?= implode("<br/>", $product_data['qty']) ?></td>
                    <td><?= implode("<br/>", array_map(function($harga) { return "Rp." . number_format($harga, 0); }, $product_data['harga'])) ?></td>
                    <td>Rp.<?= number_format($product_data['ongkir'], 0) ?></td>
                    <td>Rp. <?= number_format($product_data['total_harga'], 0) ?></td>
                </tr>
                <?php
                // Menghitung grand total dari total bayar
                $grand_total += $product_data['total_harga'];
            }
            ?>
        </tbody>
    </table>
    <h2>Grand Total : Rp.<?= number_format($grand_total, 0) ?></h2>
</div>


                    <!-- Tombol cetak tabel -->
                    <div class="d-flex justify-content-between align-items-center no-print">
                        <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> <a href="<?= base_url('laporan') ?>" style="color: white;">Kembali</a></button>
                        <div class="mt-2">
                            <button onclick="printTable()" class="btn btn-warning"><i class="fa fa-print"></i> Print</button>
                            <button onclick="exportToExcel()" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</button>
                            <button onclick="exportToPDF()" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printTable() {
    // Cetak tanggal, tabel, dan Grand Total
    var printDate = document.getElementById("printDate").outerHTML;
    var printContents = document.getElementById("printTable").outerHTML;
    var grandTotal = document.getElementsByTagName("h2")[0].outerHTML; // Ambil elemen Grand Total
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printDate + printContents + grandTotal;
    window.print();
    document.body.innerHTML = originalContents;
}


    function exportToPDF() {
        var doc = new jsPDF();
        doc.autoTable({ html: '#printTable' });
        doc.save('table.pdf');
    }

    function exportToExcel() {
        /* Fungsi ekspor ke Excel */
        var table = document.getElementById("printTable");
        var workbook = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });
        XLSX.writeFile(workbook, "table.xlsx");
    }
</script>
