<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Checkout -->
<section class="shop checkout section">
    <div class="container">
        <div class="row"> 
        <div class="col-lg-8 col-md-12 col-12"> <!-- Lebar diubah menjadi 8 pada layar besar dan tetap 12 pada layar kecil -->
    <div class="checkout-form">
        <h2>Make Your Checkout Here</h2>
        <p>Please register in order to checkout more quickly</p>
        <!-- Form -->
        <div class="row">
        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Provinsi</label>
                                <select name="provinsi" class="form-control"></select>
                                <option value=""></option>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Kota</label>
                                <select name="kota" class="form-control">
                                </select>
                               
                            </div>
                        </div>
            </div>
       
        <!--/ End Form -->
                    <!-- Data Pesanan -->
                    <div class="col-12 col-md-12">
                    <h2>Order Details</h2>
                    <br>
                    <div class="table-responsive table-responsive-lg">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th style="text-align: center;" >Qty</th>
                                <th style="text-align: center;" >Product</th>
                                <th style="text-align: center;" >Harga</th>
                                <th style="text-align: center;" >Total Harga</th>
                                <th style="text-align: center;" >Berat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                   
                                    $total_berat = 0;
                                    foreach ($this->cart->contents() as $items) {
                                    $produk = $this->m_home->detail_produk($items['id']);
                                    $berat = $items['qty'] * $produk->berat;
                                    $total_berat =  $total_berat + $berat; 
                                    ?>
                                <tr>
                                        
                                            <td style="text-align: center;"><?php echo $items['qty'] ?></td>
                                        <td class="product-des" data-title="Name" style="text-align: center;">
                                                <p class="product-name"><p style="font-size: 15px; font-weight: 500; text-align: center;"><?php echo $items['name']; ?></p></p>
                                        </td>
                                            <td  style="text-align: center;" class="price" data-title="Price"><span>Rp. <?php echo number_format($items['price'],0); ?></span></td>
                                            <td  style="text-align: center;" class="subtotal" data-title="Price"><span>Rp. <?php echo number_format($items['subtotal'],0); ?></span></td>
                                            <td style="text-align: center;" data-title="Berat"><?= $berat ?> Gram.</td>
                                      
                                            
                                        </tr>
                                        <?php } ?>
                                <!-- Tambahkan baris lain untuk setiap produk yang ada di keranjang -->
                            </tbody>
                        </table>
                    </div>
                </div>

                </div>
            </div>
            
            <div class="col-lg-4 col-md-12 col-12"> <!-- Lebar diubah menjadi 4 pada layar besar dan tetap 12 pada layar kecil -->
                <div class="order-details">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>CART  TOTALS</h2>
                        <div class="content">
                            <ul>
                                <li>Sub Total<span>$330.00</span></li>
                                <li>(+) Shipping<span>$10.00</span></li>
                                <li class="last">Total<span>$340.00</span></li>
                            </ul>
                        </div>
                    </div>
                    <!--/ End Order Widget -->
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>Payments</h2>
                        <div class="content">
                            <div class="checkbox">
                                <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label>
                                <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Cash On Delivery</label>
                                <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox"> PayPal</label>
                            </div>
                        </div>
                    </div>
                    <!--/ End Order Widget -->
                    <!-- Payment Method Widget -->
                    <div class="single-widget payement">
                        <div class="content">
                            <img src="images/payment-method.png" alt="#">
                        </div>
                    </div>
                    <!--/ End Payment Method Widget -->
                    <!-- Button Widget -->
                    <div class="single-widget get-button">
                        <div class="content">
                            <div class="button">
                                <a href="#" class="btn">proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                    <!--/ End Button Widget -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Checkout -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Mengimpor jQuery -->
<script>
   $(document).ready(function() {
    //data provinsi
    $.ajax({
        type: "POST", 
        url: "<?= base_url('rajaongkir/provinsi') ?>",
        success: function(hasil_provinsi) {
            $("select[name=provinsi]").html(hasil_provinsi);
        }
    });

    //data kota
       $("select[name=provinsi]").on("change", function() {
        var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/kota') ?>",
            data : 'id_provinsi=' + id_provinsi_terpilih,
            success : function(hasil_kota){
                $("select[name=kota]").html(hasil_kota);
            }
        });
     });
  });
</script>