<!-- Page Title -->
<section class="page-title" style="background-image:url(<?= base_url()?>assets/home2/images/background/2.jpg);">
    <div class="auto-container">
        <div class="inner-box">
            <h1>Pembayaran</h1>
            <div class="bread-crumb"><a href="<?= base_url('home')?>">Home &nbsp; /</a> <i class="current">Pembayaran
                   </i></div>
        </div>
    </div>
</section>
<!--Checkout Page-->
<div class="checkout-page">
        <div class="auto-container">

            <!--Billing Details-->
            <div class="billing-details">
                <div class="shop-form">
                        <div class="row clearfix">
                            <div class="col-lg-7 col-md-12 col-sm-12">
                				<div class="sec-title">
									<h1>Upload Bukti Pembayaran</h1>
									<div class="separator"></div>
								</div>
                        		<div class="billing-inner">
                                        <?php 
                                        echo form_open_multipart('pesanan_saya/bayar/' . $pesanan->id_transaksi);
                                        ?>
                                    <div class="row clearfix">
                                        <!--Form Group-->
                                        <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                            <div class="field-label">Atas Nama <sup>*</sup></div>
                                            <input type="text" name="atas_nama" required placeholder="Atas Nama">
                                        </div>
                                        
                                        <!--Form Group-->
                                        <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                            <div class="field-label">Nama Bank <sup>*</sup></div>
                                            <input type="text" name="nama_bank" required placeholder="Nama Bank">
                                        </div>
                                        
                                        <!--Form Group-->
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <div class="field-label">No Rekening </div>
                                            <input type="text" name="no_rek" required placeholder="No Rekening">
                                        </div>
                                        
                                        <!--Form Group-->
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                           <input type="file" name="bukti_bayar" class="form-control">
                                        </div>
                                        <!-- <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <label for="bukti_bayar">Bukti Pembayaran</label>
                                            <div id="myDropZone" class="dropzone dropzone-design">
                                                <input type="file" id="bukti_bayar" name="bukti_bayar" accept="image/*" style="display: none;">
                                                <label for="bukti_bayar" class="custom-file-upload">
                                                    <i class="fas fa-cloud-upload-alt"></i> Pilih Berkas
                                                </label>
                                                <div class="dz-default dz-message">
                                                    <span>Drag & Drop atau klik di sini untuk mengunggah bukti bayar</span>
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="button-container col-lg-5 col-md-12 col-sm-12">
                                            <a href="<?= base_url('pesanan_saya') ?>" class="theme-btn btn-style-two order-btn"><span class="txt">Back</span></a>
                                            <button type="submit" class="theme-btn btn-style-two order-btn">Transfer</button>
                                        </div>
									</div>
                                        <?php 
                                    echo form_close();
                                     ?>
                                </div>
                            </div>
                          
                            <div class="col-lg-5 col-md-12 col-sm-12">
                            <br>
                            <br>
                            <br>
                                <div class="sec-title">
									<h1>No Rekening Toko</h1>
									<div class="separator"></div>
								</div>
                                <div class="shop-order-box">
                                	<ul class="order-list">
                                    	<li style="color: black;">Silahkan Trsansfer Uang Ke No Rekening Di Bawah Ini Sebesar :</li>
                                        <li style="color: black; font-size: 25px;" class="text-success">Rp. <?= number_format($pesanan->total_bayar, 0) ?></li>
                                    </ul>
                                    
                                    <!--Place Order-->
                                    <div class="place-order">
                                        <!--Payment Options-->
                                        <div class="payment-options">
                                           <table class="table">
                                                <tr>
                                                    <th>Bank</th>
                                                    <th>No Rekening</th>
                                                    <th>Atas Nama</th>
                                                </tr>
                                                <?php foreach ($rekening as $key => $value) { ?>
                                                    <tr>
                                                        <td><?= $value->nama_bank ?></td>    
                                                        <td><?= $value->no_rek ?></td>    
                                                        <td><?= $value->atas_nama ?></td>    
                                                    </tr>
                                                <?php } ?>
                                           </table>
                                        </div>
                                        
                                       
                                    </div>
                                    <!--End Place Order-->
                                 
                                </div>
                            </div>
                        </div>                             
                    
                </div>
                
            </div><!--End Billing Details-->
    	</div>
    </div>

<style>
    .button-container {
    display: flex;
    justify-content: space-between; /* Membuat tombol berjarak secara horizontal */
    align-items: center; /* Memusatkan tombol secara vertikal */
    margin-top: 20px; /* Sesuaikan jarak sesuai kebutuhan */
}
.button-container a{
    margin: 10px;
}

/* Responsif: Mengubah tata letak tombol untuk perangkat berukuran kecil */
@media (max-width: 768px) {
    .button-container {
        display: flex;
    }

    /* Menambahkan margin antara tombol ketika di tumpuk */
    .theme-btn {
        margin-bottom: 10px; /* Sesuaikan jarak sesuai kebutuhan */
    }
}

</style>