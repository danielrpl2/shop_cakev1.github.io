<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	
	<!-- Header -->
	<header class="header shop">
		<!-- Topbar -->
		<div class="topbar">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-12">
						<!-- Top Left -->
						<div class="top-left">
							<ul class="list-main">
								<li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
								<li><i class="ti-email"></i> support@shophub.com</li>
							</ul>
						</div>
						<!--/ End Top Left -->
					</div>
					<div class="col-lg-8 col-md-12 col-12">
						<!-- Top Right -->
						<div class="right-content">
							<ul class="list-main">
								<li><i class="ti-location-pin"></i> Store location</li>
								<li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li>
								<li><i class="ti-user"></i> <a href="#">My account</a></li>
								<li><i class="ti-power-off"></i><a href="<?php base_url() ?>admin">Login</a></li>
							</ul>
						</div>
						<!-- End Top Right -->
					</div>
				</div>
			</div>
		</div>

		<style>
			@media screen and (max-width: 1100px) {
				.topbar{
					display: none;
				}
			}
		</style>
		<!-- End Topbar -->
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.html"><img src="<?= base_url() ?>assets/home_template/images/logo.png" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
						<?php 
							$keranjang = $this->cart->contents();
							$jml_item = 0;
							foreach ($keranjang as $key => $value) {
								$jml_item = $jml_item + $value['qty'];
							} 
							?>
						<div class="sinlge-bar shopping">
						<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?= $jml_item ?></span></a>
								
								<!-- Shopping Item -->
								
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span><?= $jml_item ?> Items</span>
										<!-- <a href="#">View Cart</a> -->
									</div>
									<?php if (empty($keranjang)) { ?>
									<div class="dropdown-cart-header">
										<h5 href="#">Keranjang Kosong</h5>
									</div>
									<?php } else {

									foreach ($keranjang as $key => $value) { 
									$produk = $this->m_home->detail_produk($value['id']);	
									?>
									<ul class="shopping-list">
										<li>
											<a class="cart-img" href="#"><img src="<?= base_url('gambar/' .$produk->gambar) ?>" alt="#" style="object-fit: cover;"></a>
											<h4><a href="#"><?= $value['name'] ?></a></h4>
											<p class="quantity"><?= $value['qty'] ?> x<span class="amount"> Rp.<?= number_format($value['price'],0) ?></span></p>
											<p class="quantity"><i class="fa fa-calculator" aria-hidden="true"></i> Rp.<?= $this->cart->format_number($value['subtotal']); ?></p>
										</li>
									</ul>
									<?php } ?>
									<div class="bottom">
										<div class="total">
										<span>Total</span>
										<span class="total-amount">Rp.<?= $this->cart->format_number($this->cart->total()); ?></span>
									</div>
										<a href="<?= base_url('belanja') ?>" class="btn animate">View Cart</a>
										<a href="#" class="btn animate">Checkout</a>
									</div>
									<?php } ?>
							
									
								</div>
								<!--/ End Shopping Item -->
							</div>		
							
<style>
  .total-count {
    position: absolute;
    top: -10px;
    right: -10px;
    background-color: red; /* Warna latar belakang label */
    color: white; /* Warna teks label */
    border-radius: 50%; /* Membuat label menjadi lingkaran */
    padding: 1px 6px; /* Padding untuk label */
    font-size: 10px; /* Ukuran font label */
    min-width: 16px; /* Lebar minimum untuk label */
    text-align: center; /* Pusatkan teks dalam label */
}
</style>

							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<select>
									<option selected="selected">All Category</option>
									<option>watch</option>
									<option>mobile</option>
									<option>kid’s item</option>
								</select>
								<form>
									<input name="search" placeholder="Search Products Here....." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
							</div>
							<div class="sinlge-bar">
								<a href="<?php base_url() ?>admin" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
							</div>

							<?php 
							$keranjang = $this->cart->contents();
							$jml_item = 0;
							foreach ($keranjang as $key => $value) {
								$jml_item = $jml_item + $value['qty'];
							} 
							?>
							<div class="sinlge-bar shopping">
								<a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count"><?= $jml_item ?></span></a>
								
								<!-- Shopping Item -->
								
								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span><?= $jml_item ?> Items</span>
										<!-- <a href="#">View Cart</a> -->
									</div>
									<?php if (empty($keranjang)) { ?>
									<div class="dropdown-cart-header">
										<h5 href="#">Keranjang Kosong</h5>
									</div>
									<?php } else {

									foreach ($keranjang as $key => $value) { 
									$produk = $this->m_home->detail_produk($value['id']);	
									?>
									<ul class="shopping-list">
										<li>
											<a class="cart-img" href="#"><img src="<?= base_url('gambar/' .$produk->gambar) ?>" alt="#" style="object-fit: cover;"></a>
											<h4><a href="#"><?= $value['name'] ?></a></h4>
											<p class="quantity"><?= $value['qty'] ?> x<span class="amount"> Rp.<?= number_format($value['price'],0) ?></span></p>
											<p class="quantity"><i class="fa fa-calculator" aria-hidden="true"></i> Rp.<?= $this->cart->format_number($value['subtotal']); ?></p>
										</li>
									</ul>
									<?php } ?>
									<div class="bottom">
										<div class="total">
										<span>Total</span>
										<span class="total-amount">Rp.<?= $this->cart->format_number($this->cart->total()); ?></span>
									</div>
										<a href="<?= base_url('belanja') ?>" class="btn animate">View Cart</a>
										<a href="#" class="btn animate">Checkout</a>
									</div>
									<?php } ?>
							
									
								</div>
								<!--/ End Shopping Item -->

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3">
							<div class="all-category">
								<a href="<?= base_url('') ?>"><h3 class="cat-heading">Enjoy Shopping</h3></a>
							</div>
						</div>
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="#">Home</a></li>
													<li><a href="#">Product</a></li>												
													<li><a href="#">Service</a></li>

													<li><a href="<?= base_url('home/by_kategori') ?>">Kategori<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="<?= base_url('home/by_kategori') ?>">Shop By Category</a></li>
														</ul>
													</li>

													<li><a href="#">Pages</a></li>									
													<li><a href="#">Blog<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
														</ul>
													</li>
													<li><a href="contact.html">Contact Us</a></li>
												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->
	
	