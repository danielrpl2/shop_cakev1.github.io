<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Laporan Stok Keluar</h4><br>
                    <!-- Display the data in a table or any other preferred format -->
                    <button class="btn btn-success" onclick="exportToExcel()"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel</button>
<button class="btn btn-danger" onclick="exportToPdf()"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</button>
<button class="btn btn-primary" onclick="printTable()"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
<a href="<?= base_url('laporan/laporan_stok') ?>" class="btn btn-primary float-right"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
<br>
<br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered " id="example1">
                            <!-- Your table headers -->
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Kasir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($laporan as $row): ?>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->nama_produk; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->total_qty; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->tanggal; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->nama_user; ?>
                                    </td>
                                    <!-- Add more columns as needed -->
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function printTable() {
        // Hide non-table elements
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = '<h4 class="text-center">Laporan Stok Keluar</h4><br>' + document.getElementById("example1").outerHTML;

        // Call the print function
        window.print();

        // Restore the original body content
        document.body.innerHTML = originalContent;
    }

    function exportToExcel() {
        // Get the current date
        var currentDate = new Date().toLocaleDateString();
        
        /* Get table data as an array of arrays */
        var table = document.getElementById("example1");
        var rows = Array.from(table.rows).map(row => Array.from(row.cells).map(cell => cell.innerText));

        /* Create a worksheet */
        var ws = XLSX.utils.aoa_to_sheet([["No", "Nama Produk", "Qty", "Tanggal Keluar", "Kasir"], ...rows]);

        /* Create a workbook */
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Laporan Stok Keluar - " + currentDate);

        /* Save the workbook to a file */
        XLSX.writeFile(wb, "laporan_stok_keluar_" + currentDate + ".xlsx");
    }

    function exportToPdf() {
        // Get the current date
        var currentDate = new Date().toLocaleDateString();

        /* Use html2pdf to export the table to PDF */
        var element = document.getElementById("example1");

        html2pdf(element, {
            margin: 10,
            filename: 'Laporan_Stok_Keluar_' + currentDate + '.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });
    }
</script>
<!-- SheetJS (xlsx) -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>

<!-- jspdf and html2pdf -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
