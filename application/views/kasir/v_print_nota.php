<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 210mm; /* A4 paper width */
            height: 297mm; /* A4 paper height */
            margin: auto;
        }

        @page {
            size: 100%;
            margin: 0.3cm;
        }

        body {
            margin: 0;
            width: 48mm;
            font-size: 12px; /* Adjusted font size for printing */
        }

        header {
            text-align: center;
            margin-bottom: 5px; /* Reduced margin for header */
            font-size: 12px;
        }

        h1 {
            margin: 0;
            font-size: 12px; /* Adjusted font size for title */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px; /* Reduced margin for table */
        }

        th,
        td {
            padding: 3px; /* Adjusted padding for table cells */
            font-size: 12px; /* Adjusted font size for table cells */
        }

        span {
            font-weight: bold;
            font-size: 12px; /* Adjusted font size for span */
        }

        div {
            margin-bottom: 4px; /* Adjusted margin for div */
            display: flex;
            justify-content: space-between;
        }

        /* img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
            margin-bottom: 8px;
        } */

        hr {
            border: 1px dashed black;
            margin-bottom: 4px; /* Adjusted margin for hr */
        }
    </style>
</head>

<body>
        <br>
    <header>
        <!-- <img src="<?=base_url()?>assets/gambar_tambahan/kosong.jpg" alt="Berkaa Shop Logo"> -->
        <h1 style="font-size: 15px;">Orabella Bakery</h1>
        <p>J1. Pb Sudirman no 53 Kecamatan Bangsalsari/Phone: 81529620220414142434</p>
        <!-- <p>Phone: 81529620220414142434</p> -->
    </header>
    <hr>
    <div>
        <span style="font-weight: 600;">Invoice</span>
        <div><?=isset($nota->id_penjualan) ? $nota->id_penjualan : 'N/A'?></div>
    </div>
    <div>
        <span>Tanggal</span>
        <div><?=isset($nota->tanggal_jual) ? date('d-m-Y', strtotime($nota->tanggal_jual)) : 'N/A'?></div>
    </div>
    <div>
        <span>Jam</span>
        <div><?=isset($nota->tanggal_jual) ? date('H:i:s', strtotime($nota->tanggal_jual)) : 'N/A'?></div>
    </div>
    <div>
        <span>Kasir</span>
        <div><?=isset($nota->nama_user) ? $nota->nama_user : 'N/A'?></div>
    </div>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nota->items as $item) {?>
                <tr>
                    <td><?=isset($item->nama_produk) ? $item->nama_produk : 'N/A'?></td>
                    <td><?=isset($item->qty) ? $item->qty : 'N/A'?></td>
                    <td>Rp. <?=isset($item->harga) ? number_format($item->harga) : 'N/A'?></td>
                    <td>Rp.<?=isset($item->total_harga) ? number_format($item->total_harga) : 'N/A'?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
    <hr>
    <div>
        <span>Total</span>
        <div>Rp. <?=isset($nota->sub_total) ? number_format($nota->sub_total) : 'N/A'?></div>
    </div>
    <div>
        <span>Bayar</span>
        <div>Rp. <?=isset($nota->cash) ? number_format($nota->cash) : 'N/A'?></div>
    </div>
    <div>
        <span>Kembali</span>
        <div><?=isset($nota->change) ? $nota->change : 'N/A'?></div>
    </div>
    <br>

    <h4 style="text-align: center; margin: 0; font-size: 15px;">==== Terimakasih ====</h4>

</body>

</html>
