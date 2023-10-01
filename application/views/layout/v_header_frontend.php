
    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header / Header Style Two-->
    <header class="main-header header-style-two">
    	
		<!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container">
            	<div class="clearfix">
                	
                	<div class="pull-left logo-box">
                    	<div class="logo"><a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/home2/images/orabella2.png" alt="" title=""></a></div>
                    </div>
                    
                    <div class="pull-right upper-right">
                    	<div class="info-outer clearfix">
						
							<!--Info Box-->
							<div class="upper-column info-box">
								<div class="icon-box"><span class="flaticon-pin"></span></div>
								<ul>
									<li>2130 Fulton Street San Canada <br> Gambirono Bangsalsari</li>
								</ul>
							</div>
							
							<!--Info Box-->
							<div class="upper-column info-box">
								<div class="icon-box"><span class="flaticon-phone-call"></span></div>
								<ul>
									<li>Orabella Bakery : 08:30 - 18:00 <br> <a href="tel:+62 8698097666">+62 8698097666</a></li>
								</ul>
							</div>
							
							<!--Info Box-->
							<div class="upper-column info-box">
								<a href="#" class="theme-btn btn-style-two"><span class="txt">Contact</span></a>
							</div>
							
                        </div>
						
                    </div>
                    
                </div>
				
            </div>
        </div>
        <!--End Header Upper-->
        
		<!--Header Lower-->
		<div class="header-lower">
			
			<div class="auto-container clearfix">
				<div class="nav-outer clearfix">
					<!--Mobile Navigation Toggler For Mobile--><div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
					<!-- Main Menu -->
					<nav class="main-menu navbar-expand-md">
						<div class="navbar-header">
							<!-- Toggle Button -->    	
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						
						<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
							<ul class="navigation clearfix">
								<li class="current"><a href="<?= base_url('home') ?>"><span data-hover="Home">Home</span></a>
								</li>
								
								<li class="dropdown"><a href="#"><span data-hover="Shop">Shop</span></a>
									<ul>
										<li><a href="#">Single Produk</a></li>
										<li><a href="<?= base_url('home/by_kategori') ?>">Kategori Produk</a></li>
									</ul>
								</li>

								<li><a href="contact.html"><span data-hover="Contact">Contact</span></a></li>
							</ul>
						</div>
					</nav>
					
					<!-- Main Menu End-->
					<div class="outer-box clearfix">
					
						<!--Option Box-->
						<div class="option-box">
							
							<!--Cart Box-->
							<?php 
								$keranjang = $this->cart->contents();
								$jml_item = 0;
								foreach ($keranjang as $key => $value) {
									$jml_item = $jml_item + $value['qty'];
								} 
								?>
							<div class="cart-box">
								<div class="offset-side-bar cart-box-btn"><span class="flaticon-shopping-cart-of-checkered-design"></span><span class="total-cart"><?= $jml_item ?></span></div>
							</div>
							
							<!-- Search Btn -->
							<!-- <div class="search-box-btn"><span class="icon flaticon-search"></span></div> -->
							
							<!-- Main Menu End-->
							<div class="nav-box">
								<div class="nav-btn navSidebar-button"><span class="icon flaticon-menu-1"></span></div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<!--End Header Lower-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

		<!-- sidebar cart item -->
			<div class="xs-sidebar-group cart-group">
				<div class="xs-overlay xs-bg-black"></div>
				<div class="xs-sidebar-widget">
					<div class="sidebar-widget-container">
						<div class="widget-heading media">
							<div class="media-body">
								<a href="#" class="close-side-widget"><span class="icon flaticon-cancel"></span></a>
							</div>
						</div>
						
						<div class="xs-empty-content">
							<?php if (empty($keranjang)) { ?>
								<h1>KERANJANG KOSONG</h1>
							<?php } else {
							

							foreach ($keranjang as $key => $value) { 
							$produk = $this->m_home->detail_produk($value['id']);	
							?>
							<!-- Cart Product -->
							<div class="cart-product">
								<div class="inner">
									<div class="cross-icon"><span class="icon fa fa-remove"></span></div>
									<div class="image"><img src="<?= base_url('gambar/' .$produk->gambar) ?>" alt="" /></div>
									<h3><a href="shop-single.html"><?= $value['name'] ?></a></h3>
									<div class="quantity-text">Qty : <?= $value['qty'] ?></div>
									<div class="price">Rp.<?= $this->cart->format_number($value['subtotal']); ?></div>
								</div>
							</div>
							<?php } ?>
							<p class="xs-btn-wraper">
								<a class="btn keranjang btn-style-two" href="<?= base_url('belanja') ?>"><span class="txt">View Keranjang</span></a>
								<br>
								<a class="btn keranjang btn-style-two" href="<?= base_url('belanja/cekout') ?>"><span class="txt">Cekout</span></a>
							</p>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<!-- END sidebar cart item -->

		<!--Sticky Header-->
        <div class="sticky-header">
        	<div class="auto-container clearfix">
            	<!--Logo-->
            	<div class="logo pull-left">
                	<a href="<?= base_url() ?>" class="img-responsive"><img src="<?= base_url() ?>assets/home2/images/orabella2.png" alt="" title=""></a>
                </div>
                
				<!--Right Col-->
                <div class="right-col pull-right">
					<!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
		
    	<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon far fa-window-close"></span></div>
            
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            <nav class="menu-box">
            	<div class="nav-logo"><a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/home2/images/orabella2.png" alt="" title=""></a></div>
                
                <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
            </nav>
        </div><!-- End Mobile Menu -->

    </header>
    <!-- End Main Header -->

	
<!-- sidebar cart item -->
<div class="xs-sidebar-group info-group">
	<div class="xs-overlay xs-bg-black"></div>
	<div class="xs-sidebar-widget">
		<div class="sidebar-widget-container">
			<div class="widget-heading">
				<a href="#" class="close-side-widget"><span class="icon flaticon-cancel"></span></a>
			</div>
			<div class="sidebar-textwidget">
				
				<!-- Sidebar Info Content -->
		<?php if ($this->session->userdata('email') == "") { ?>
            <div class="sidebar-info-contents">
				<div class="content-inner">
					<div class="logo">
						<a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/home2/images/orabella2.png" alt="" /></a>
					</div>
					<div class="content-box">
						<h2>Pelanggan</h2>
						<p class="text">Silahkan register terlebih dahulu agar bisa login, Jika sudah punya akun maka silahkan login</p>
						<a href="<?= base_url ('pelanggan/login') ?>" class="theme-btn btn-style-two"><span class="txt">Login</span></a>
						<a href="<?= base_url ('pelanggan/register') ?>" class="theme-btn btn-style-two"><span class="txt">Register</span></a>
					</div>
					<?php } else{ ?>
						<div class="content-inner">
					<div class="logo">
						<a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/home2/images/orabella2.png" alt="" /></a>
					</div>
					<div class="contact-info">
						<br>
						<br>
						<ul class="list-style-two">
							<li><span class="icon flaticon-map"></span><?= $this->session->userdata('nama_pelanggan')?></li>
							<li><span class="icon flaticon-telephone"></span>(111) 000-000-0000</li>
							<li><span class="icon flaticon-message-1"></span><?= $this->session->userdata('email')?></li>
							<li><span class="icon flaticon-timetable"></span>Week Days: 09.00 to 18.00 Sunday: Closed</li>
						</ul>
						<br>
						<div class="content-box">
						<a href="<?= base_url ('pesanan_saya') ?>" class="theme-btn btn-style-two"><span class="txt">Pesanan Saya</span></a>
						<a href="<?= base_url ('pelanggan/logout') ?>" class="theme-btn btn-style-two"><span class="txt">Logout</span></a>
					</div>
					</div>
					<!-- Social Box -->
					<!-- <ul class="social-box">
						<li class="facebook"><a href="#" class="fab fa-facebook-f"></a></li>
						<li class="twitter"><a href="#" class="fab fa-twitter"></a></li>
						<li class="linkedin"><a href="#" class="fab fa-linkedin-in"></a></li>
						<li class="instagram"><a href="#" class="fab fa-instagram"></a></li>
						<li class="youtube"><a href="#" class="fab fa-youtube"></a></li>
					</ul> -->
				</div>
			</div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- END sidebar widget item -->

</div>
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
				
<style>

.xs-btn-wraper{
	display: flex; /* Membuat elemen child sejajar */
    justify-content: space-between; /* Menempatkan elemen child sejajar dengan jarak di antara mereka */
}

.keranjang{
	text-align: center;
    padding: 10px 20px; /* Sesuaikan padding sesuai kebutuhan Anda */
    border-radius: 5px; /* Tambahkan sudut melengkung jika diinginkan */
}

.theme-btn {
    text-align: center;
    padding: 10px 20px; /* Sesuaikan padding sesuai kebutuhan Anda */
    border-radius: 5px; /* Tambahkan sudut melengkung jika diinginkan */
}

/* CSS untuk responsif */
@media (max-width: 768px) {
    .content-box {
        flex-direction: column; /* Tumpukan elemen child di bawah satu sama lain pada layar kecil */
        align-items: center; /* Pusatkan elemen child secara horizontal */
    }

	.xs-btn-wraper{
		flex-direction: column; /* Tumpukan elemen child di bawah satu sama lain pada layar kecil */
        align-items: center; /* Pusatkan elemen child secara horizontal */
}

.keranjang{
	margin: 5px 0; /* Berikan sedikit jarak antara tautan pada layar kecil */

}

    .theme-btn {
        margin: 5px 0; /* Berikan sedikit jarak antara tautan pada layar kecil */
    }
}

</style>