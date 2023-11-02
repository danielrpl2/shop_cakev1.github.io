<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
<!-- Page Title -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<section style="text-align: center;" >
	<div class="auto-container">
		<div class="inner-box">
			<strong><h1 style="font-weight: 1000;">Halaman Keranjang</h1></strong>
			<div class="bread-crumb"><a href="<?= base_url('home') ?>">Home &nbsp; /</a> <i class="current">Halaman Keranjang</i></div>
		</div>
	</div>
</section>
<!-- End Page Title -->
<!--Cart Section-->
<section class="cart-section">
        <div class="auto-container">

            <!--Cart Outer-->
            <div class="cart-outer">
            <div class="table-outer">
                <?php 
                                
    if ($this->session->flashdata('pesan')) {
     echo '<div class="alert alert-success alert-dismissible" style="background-color: rgb(63, 255, 0); color: black;">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <h5><i class="icon fa fa-check"></i> Succes</h5>';
     echo $this->session->flashdata('pesan');
     echo '</div>';
    }
                                
    ?>
				<?php echo form_open('belanja/update'); ?>
                    <table class="cart-table">
                        <thead class="cart-header">
                            <tr>
                            	<th>Preview</th>
                            	<th class="prod-column">Produk</th>
                                <th class="harga">Harga</th>
                                <th class="berat">Berat</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>

						<?php $i = 1; ?>
                        <?php
						 $total_berat = 0;
						 $sub_total = 0;
						foreach ($this->cart->contents() as $items) {
						 $produk = $this->m_home->detail_produk($items['id']);
						 $berat = $items['qty'] * $produk->berat;
						 $total_berat =  $total_berat + $berat; 

                         $sub_total = $items['qty'] * $items['price'];
                         $sub_total + $items['price'];
						?>
                        <tbody>
                        	<tr>
                                <td class="prod-column">
                                    <div class="column-box">
                                        <figure class="prod-thumb"><a href="#"><img src="<?php echo base_url('gambar/') . $produk->gambar1; ?>" style="border-radius: 10px; width: 100%;"></a></figure>
                                    </div>
                                </td>
                                <td><h4 class="prod-title"><?php echo $items['name']; ?></h4></td>
                                    <!-- tambahan -->
                                <td><h4 class="prod-title">Rp. <?= number_format($produk->harga,0); ?></h4></td>
                                    <!-- end -->
                                <td class="sub-total"><?= $berat ?> Gram.</td>
                                <td class="qty" >
                                    <input type="number" class="form-control qty-input" data-rowid="<?= $items['rowid'] ?>" data-price="<?= $items['price'] ?>" data-berat="<?= $berat ?>" value="<?= $items['qty'] ?>" min="1">
                                </td>
								   <td class="price">Rp. <?php echo number_format($sub_total,0); ?></td>
                                <td><a href="<?= base_url('belanja/delete/' .$items['rowid']) ?>" class="remove-btn"><span class="flaticon-cancel"></span></a></td>
                            </tr>
							<?php $i++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="cart-options clearfix">
                    <div class="pull-left">
                        <div class="apply-coupon clearfix">
                            <div class="form-group clearfix">
							<a href="<?= base_url('belanja/clear') ?>" class="btn btn-warning cart-btn btn-style-one" style="border-radius: 50px; color: white; background-color: red;"><span class="txt"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Clear Cart</span></a>
                            </div>
                            <div class="form-group clearfix">
							<button type="submit" class="theme-btn cart-btn btn-style-two" style="background-color: yellow; border-radius: 50px; color: black;"><span class="txt"><i class="fa fa-check" aria-hidden="true"></i> Update Cart</span></button>
                            </div>
                        </div>
                    </div>

                    <div class="pull-right">
                        <a href="<?= base_url('home') ?>" class="theme-btn cart-btn btn-style-two" style="text-align: center;"><span class="txt">Continue Shoping <i class="fa fa-arrow-right"></i></span></a>
                    </div>

                </div>
			
                <div class="row clearfix">

                    <div class="column pull-right col-md-5 col-sm-8 col-xs-12">
                        <!--Totals Table-->
                        <ul class="totals-table">
                        	<li><h3>Cart Totals</h3></li>
                            <li class="clearfix"><span class="col">Total</span><span class="col">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></span></li>
                            <li class="clearfix total"><span class="col">Total Berat</span><span class="col price"><?= $total_berat ?> Gram.</span></li>
                            <li class="text-right"><a href="<?= base_url('belanja/cekout') ?>"  class="theme-btn btn-style-two proceed-btn"><span class="txt"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Checkout</span></a></li>
                        </ul>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
        </div>
    </section>
    <!--End Cart Section-->
<!-- Include jQuery -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-refreferrer"></script>
<script>
$(document).ready(function() {
    // Memantau perubahan pada elemen input qty
    $('.qty-input').on('input', function() {
        updateQty($(this));
        updateCartNotification(); // Panggil fungsi untuk memperbarui notifikasi keranjang
    });

    function updateQty(inputElement) {
        var rowid = inputElement.data('rowid');
        var qty = inputElement.val();   

        $.ajax({
            url: '<?= base_url('belanja/update_qty') ?>',
            type: 'post',
            data: {
                rowid: rowid,
                qty: qty
            },
            success: function(data) {
                // Tampilkan notifikasi atau perbarui keranjang lainnya jika diperlukan
                console.log('Qty berhasil diperbarui');
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Function to update cart notification
    function updateCartNotification() {
        var totalQty = 0;

        // Calculate the total quantity of items in the cart
        $('.qty-input').each(function() {
            var qty = parseFloat($(this).val());
            totalQty += qty;
        });

        // Update the cart notification
        $('.number-badge').text(totalQty);
    }
});
</script>


