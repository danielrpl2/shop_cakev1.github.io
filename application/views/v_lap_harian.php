
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.4/xlsx.full.min.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Laporan Harian</h4>
                        </div>
                        <div class="table-responsive">
                        <p class="text-center">Tanggal: January 1, 2023</p>
                            <table class="table table-striped" id="printTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>Kolor Tea Shirt For Man</td>
                                    <td><span class="badge badge-primary px-2">Sale</span>
                                    </td>
                                    <td>January 22</td>
                                    <td class="color-primary">$21.56</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        <!-- Tombol cetak tabel -->
                        <div class="text-left">
                            <button onclick="printTable()" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                            <div class="float-right">
                                <button onclick="exportToPDF()" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</button>
                                <button onclick="exportToExcel()" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    @media print {
        body * {
            visibility: hidden;
        }
        #printTable, #printTable * {
            visibility: visible;
        }
        #printTable {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        #printTable table {
            border-collapse: collapse; /* Menghilangkan garis tepi pada tabel */
            width: 100%;
            max-width: 100%;
        }
        #printTable th, #printTable td {
            padding: 8px;
            font-size: 12px; /* Atur ukuran font sesuai dengan kebutuhan Anda */
        }
        @media print and (min-width: 992px) {
            #printTable {
                left: 0;
                right: 0;
            }
            /* Menampilkan kembali sidebar saat mencetak pada tampilan desktop */
            .sidebar {
                display: none;
            }
    }
    }
</style>


    <script>
        // Fungsi untuk mencetak tabel
        function printTable() {
            window.print();
        }

        // Fungsi untuk mengekspor ke PDF
        function exportToPDF() {
            const doc = new jsPDF();
            doc.autoTable({ html: '#printTable', theme: 'striped' });
            doc.save('table.pdf');
        }

        // Fungsi untuk mengekspor ke Excel
        function exportToExcel() {
            const table = document.querySelector('#printTable');
            const ws = XLSX.utils.table_to_sheet(table);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
            XLSX.writeFile(wb, 'table.xlsx');
        }
    </script>
