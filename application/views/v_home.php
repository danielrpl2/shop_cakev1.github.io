<!-- Main Slider Two -->
<section class="main-slider-two">
    	
        <div class="main-slider-carousel owl-carousel owl-theme">
            
            <div class="slide" style="background-image:url(<?= base_url() ?>gambar/612ef66b4a07b.jpg)">
                <div class="auto-container">
                	<div class="content-outer">
						<div class="content">
							<div class="title">For Sale</div>
							<h1>Orrabel Bakery</h1>
							<div class="text">The best supplayer cake <br> for your family </div>
							<!-- <ul class="info-box">
                                <li><span class="icon flaticon-dimension"></span> <strong>1800</strong> Area Sq-ft</li>
                                <li><span class="icon flaticon-bed-2"></span> <strong>04</strong> Bed Room</li>
                                <li><span class="icon flaticon-shower"></span> <strong>02</strong> Toilet</li>
                            </ul> -->
						</div>
                    </div>
                </div>
            </div>
            
            <!-- <div class="slide" style="background-image:url(<?= base_url() ?>assets/home2/images/main-slider/5.jpg)">
                <div class="auto-container">
					<div class="content-outer">
						<div class="content">
							<div class="title">For Rent</div>
							<h1>Sydney New Form House</h1>
							<div class="text">The best place to find the house you want <br> for your family and future.</div>
							<ul class="info-box">
                                <li><span class="icon flaticon-dimension"></span> <strong>1800</strong> Area Sq-ft</li>
                                <li><span class="icon flaticon-bed-2"></span> <strong>04</strong> Bed Room</li>
                                <li><span class="icon flaticon-shower"></span> <strong>02</strong> Toilet</li>
                            </ul>
						</div>
					</div>
                </div>
            </div> -->
            
            <!-- <div class="slide" style="background-image:url(<?= base_url() ?>assets/home2/images/main-slider/6.jpg)">
                <div class="auto-container">
					<div class="content-outer">
						<div class="content">
							<div class="title sold">Sold Out</div>
							<h1>New York Modern Luxury House</h1>
							<div class="text">The best place to find the house you want <br> for your family and future.</div>
							<ul class="info-box">
                                <li><span class="icon flaticon-dimension"></span> <strong>1800</strong> Area Sq-ft</li>
                                <li><span class="icon flaticon-bed-2"></span> <strong>04</strong> Bed Room</li>
                                <li><span class="icon flaticon-shower"></span> <strong>02</strong> Toilet</li>
                            </ul>
						</div>
                    </div>
                </div>
            </div> -->
			
        </div>
		
		<!--Scroll Dwwn Btn-->
        <div class="mouse-btn-down scroll-to-target" data-target=".search-home-section">
			<div class="chevron"></div>
			<div class="chevron"></div>
			<div class="chevron"></div>
		</div>
    </section>
    <!-- End Main Slider Two -->
<!--Shop Section-->
<section class="shop-section">
    	<div class="auto-container">
        	
         
            
            <!--Shop Items-->
            <div class="shop-items">
                <div class="row clearfix">
                <?php foreach ($produk as $key => $value) { ?>
                    <!--Shop Item-->
                    <div class="shop-item col-lg-4 col-md-4 col-sm-12">
					<?php
						echo form_open('belanja/add');
						echo form_hidden('id', $value->id_produk);
						echo form_hidden('qty', 1);
						echo form_hidden('price', $value->harga);
						echo form_hidden('name', $value->nama_produk); // Remove extra space after 'name'
						echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
					?>
                        <div class="inner-box">
                        	<!-- <div class="off-price">-30%</div> -->
                            <?php if ($this->session->userdata('email') == "") { ?>
                            <div class="image-box">
                                <a href="<?= base_url ('pelanggan/login') ?>"><img src="<?= base_url('gambar/' .$value->gambar) ?>" alt="" /></a>
                            </div>
                            <div class="lower-box">
                            	<div class="upper-box">
                                	<h4><a href="<?= base_url ('pelanggan/login') ?>"><?= $value->nama_produk ?></a></h4>
                                </div>
                                <div class="lower-content">
                                	<div class="price">Rp. <?= number_format($value->harga,0) ?></div>
                                    <a href="<?= base_url ('pelanggan/login') ?>" class="cart-btn theme-btn">Add To Cart</a>
                                </div>
                            </div>
                            <?php } else{ ?>
                                <div class="image-box">
                                    <a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>"><img src="<?= base_url('gambar/' .$value->gambar) ?>" alt="" /></a>
                                </div>
                                <div class="lower-box">
                                    <div class="upper-box">
                                        <h4><a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>"><?= $value->nama_produk ?></a></h4>
                                    </div>
                                    <div class="lower-content">
                                        <div class="price">Rp. <?= number_format($value->harga,0) ?></div>
                                        <button type="submit" class="cart-btn theme-btn" onclick="addToCart('<?= $value->nama_produk ?>')">Add To Cart</button>
                                    </div>
                                </div>
                                <?php } ?>
                        </div>
                    </div>
					<?php echo form_close(); ?>
					<?php } ?>
                </div>
            
            </div>
            
        </div>
    </section>
    <!--End Shop Section-->

	
 <!-- untuk alert add -->
<script>
function addToCart(productName) {
// Send an AJAX request to add the product to the cart
$.ajax({
    url: 'belanja/add', // Adjust the URL to your actual endpoint
    type: 'POST',
    data: { 'product_name': productName },
    success: function(response) {
        // Update the cart item count on success
        updateCartItemCount(response.item_count);
    },
    error: function() {
        // Handle error, if any
    }
});
}

function updateCartItemCount(itemCount) {
$('.total-count').text(itemCount);
}
</script>
<!-- CSS untuk tampilan alert -->
<style>
.custom-alert {
display: none;
position: fixed;
width: auto;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
padding: 15px;
border-radius: 5px;
background-color: #4CAF50;
color: white;
z-index: 1000;
animation: slide-in 0.5s, slide-out 0.5s 2s forwards;
}

@keyframes slide-in {
0% {
    transform: translate(-50%, -150%);
}
100% {
    transform: translate(-50%, -50%);
}
}

@keyframes slide-out {
0% {
    transform: translate(-50%, -50%);
}
100% {
    transform: translate(-50%, -150%);
}
}
</style>

<!-- JavaScript untuk menampilkan alert -->
<script>
// Fungsi untuk menampilkan alert saat tombol "Add To Cart" ditekan
function addToCart(productName) {
var alertBox = document.createElement('div');
alertBox.classList.add('custom-alert');
alertBox.textContent = productName + ' sudah ditambahkan ke keranjang.';
document.body.appendChild(alertBox);

setTimeout(function () {
    alertBox.style.display = 'block';
}, 100);

setTimeout(function () {
    alertBox.style.display = 'none';
    document.body.removeChild(alertBox);
}, 2500);
}
</script>