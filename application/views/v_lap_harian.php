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
                                    <th>Tanggal</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1; 
                                    $grand_total = 0;
                                    foreach ($laporan as $value) { 
                                        $total_harga = $value->total_bayar;
                                        $grand_total = $grand_total + $total_harga; 
                                ?>
                                <tr>
                                    <th><?= $no++ ?></th>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td><?= $value->provinsi ?></td>
                                    <td><?= $value->kota ?></td>
                                    <td>Rp. <?= number_format($total_harga, 0) ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <h2>Grand Total : Rp.<?= number_format($grand_total,0) ?></h2>
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
