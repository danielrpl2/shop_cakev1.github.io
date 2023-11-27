<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>

    <header class="main-header header-style-three">
        
		<!-- Header Upper -->
        <div class="header-upper" style="background-color: black;">
            <div class="inner-container clearfix">
                
				<!--Info-->
				<div class="logo-outer">
					<div class="logo"><a href="#"><img src="<?= base_url() ?>assets/home2/images/nav-orb.png" alt="" title=""></a></div>
				</div>

				<!--Nav Box-->
				<div class="nav-outer clearfix">
					<!--Mobile Navigation Toggler For Mobile--><div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
					<nav class="main-menu navbar-expand-md navbar-light">
						<div class="navbar-header">
							<!-- Togg le Button -->      
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="icon flaticon-menu"></span>
							</button>
						</div>
						
						<div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
							<ul class="navigation clearfix">
                                <li><a href="<?= base_url('home') ?>"><span data-hover="Home">Home</span></a></li>
								<li><a href="<?= base_url('home/by_kategori') ?>"><span data-hover="Product">Product</span></a></li>
								<li><a href="<?= base_url ('home/blog') ?>"><span data-hover="Blog">Blog</span></a></li>
								<li><a href="<?= base_url ('home/about') ?>"><span data-hover="About">About</span></a></li>
							</ul>
						</div>
					</nav>
					<!-- Main Menu End-->

						
					<!-- Main Menu End-->
					<?php if ($this->session->userdata('email') == "") { ?>
						<div class="outer-box clearfix">

                        <?php 
								$keranjang = $this->cart->contents();
								$jml_item = 0;
								foreach ($keranjang as $key => $value) {
									$jml_item = $jml_item + $value['qty'];
								} 
								?>

                <div class="search-box-btn">
                    <span class="icon flaticon-shopping-cart"></span>
                </div>
                         <!-- User -->
                         <div class="search-button">
                         <a href="<?= base_url ('pelanggan/login') ?>">
                            <span class="icon flaticon-user"></span>
                         </a>
                        </div>
				
                         <!-- Tombol Pencarian -->
                         <div id="search-button" class="search-button">
                            <span class="icon flaticon-search"></span>
                        </div>

                        <!-- Pop-up Pencarian -->
                        <div id="search-popup1" class="search-popup1">
                            <div class="search-content">
                                <span class="close-button" id="close-button">&times;</span>

                                <?php echo form_open('home/search') ?>                                
                                <div id="search-form">
                                    <input type="text" name="keyword" placeholder="Cari produk...">
                                    <button type="submit">Cari</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
						<div class="nav-box">
							<div class="nav-btn nav-toggler navSidebar-button"><span class="icon flaticon-menu-1"></span></div>
						</div>
					</div>
                        <?php } else{ ?>

					<div class="outer-box clearfix">
					    <?php 
								$keranjang = $this->cart->contents();
								$jml_item = 0;
								foreach ($keranjang as $key => $value) {
									$jml_item = $jml_item + $value['qty'];
								} 
								?>
						<!-- Search Btn -->
						<div class="search-box-btn"><span class="icon flaticon-shopping-cart"></span></div>
                                                
                        <!-- Tombol Pencarian -->
                        <div id="search-button" class="search-button">
                            <span class="icon flaticon-search"></span>
                        </div>

                        <!-- Pop-up Pencarian -->
                        <div id="search-popup1" class="search-popup1">
                            <div class="search-content">
                                <span class="close-button" id="close-button">&times;</span>

                                <?php echo form_open('home/search') ?>                                
                                <div id="search-form">
                                    <input type="text" name="keyword" placeholder="Cari produk...">
                                    <button type="submit">Cari</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                       
						<!-- Main Menu End-->
						<div class="nav-box">
							<div class="nav-btn nav-toggler navSidebar-button"><span class="icon flaticon-menu-1"></span></div>
						</div>
						<div class="number-badge"><?= $jml_item ?></div> <!-- Ubah angka 5 sesuai dengan angka yang Anda inginkan -->
					</div>
					<?php } ?>
				</div>
                
            </div>
        </div>
        <!--End Header Upper-->



		<!--Sticky Header-->
        <div class="sticky-header">
        	<div class="auto-container clearfix">
            	<!--Logo-->
            	<div class="logo pull-left">
                	<a href="#" class="img-responsive"><img src="<?= base_url() ?>assets/home2/images/nav-orb.png" alt="" title=""></a>
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
            	<div class="nav-logo"><a href="#"><img src="<?= base_url() ?>assets/home2/images/nav-orb.png" alt="" title=""></a></div>
                
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
						<a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/home2/images/orabella3.png" alt="" /></a>
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
								<a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/home2/images/orabella3.png" alt="" /></a>
							</div>
							<div class="contact-info">
								<!-- <div class="profile-info">
									<div class="profile-image">
										<img src="<?= base_url() ?>assets/home2/images/resource/author-2.jpg" alt="Profile Image" />
									</div>
								</div> -->
								<br>
								<br>
								<ul class="list-style-two">
									<li><span class="icon flaticon-user-1"></span><?= $this->session->userdata('nama_pelanggan') ?></li>
									<li><span class="icon flaticon-message-1"></span><?= $this->session->userdata('email') ?></li>
								</ul>
								<br>
								<br>
								<div class="content-box">
									<a href="<?= base_url('pesanan_saya') ?>" class="theme-btn btn-style-two"><span class="txt">Pesanan</span></a>
									<a href="<?= base_url('pelanggan/logout') ?>" class="theme-btn btn-style-two"><span class="txt">Logout</span></a>
								</div>
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
.content-box {
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.theme-btn {
    flex: 1;
    overflow: hidden; /* Menyembunyikan teks yang melebihi lebar tombol */
    white-space: nowrap; /* Mencegah teks pindah ke baris baru */
}

@media screen and (max-width: 767px) {
	.content-box {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    padding: 10px; /* Padding untuk memberi jarak antara kotak dengan elemen di dalamnya */
}

.theme-btn {
	width: 100%;

    flex: 1;
    overflow: hidden; /* Menyembunyikan teks yang melebihi lebar tombol */
    white-space: nowrap; /* Mencegah teks pindah ke baris baru */
}
}


.profile-info {
    display: flex;
    align-items: center;
}

.profile-image {
    width: 90px; /* Ukuran gambar profil */
    height: 90px; /* Ukuran gambar profil */
    border-radius: 50%; /* Membuat gambar menjadi bulat */
    overflow: hidden; /* Mengatasi masalah gambar yang melebihi lingkaran */
}

.profile-image img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Menyesuaikan gambar dengan lingkaran */
}

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
	.number-badge {
    background-color: #0077B6;
    color: #FFFFFF;
    border-radius: 50%;
    width: 15px;
    height: 20px;
    text-align: center;
    line-height: 20px;
    position: absolute;
  
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
<style>
    /* Gaya tombol pencarian */
.search-button {
    position:relative;
	float:left;
	cursor:pointer;
	margin:8px 0px;
}

.search-button span{
    position:relative;
	font-size:20px;
	color:#25a9e0;
    position:relative;
	margin:0px;
	padding:10px 10px;
	background-color:#ffffff;
    border-radius:50%;

}

/* Gaya pop-up pencarian */
.search-popup1 {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 999;
}

.search-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.close-button {
    position: absolute;
    bottom: 35vh; /* Menggeser ke atas */
    right: 20vh; /* Menggeser ke kanan */
    font-size: 45px;
    color: #ffffff;
    cursor: pointer;
    z-index: 5;
}

/* Gaya form pencarian dalam pop-up */
#search-form {
    display: flex;
}

#search-form input[type="text"] {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#search-form button {
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
}

#search-form button:hover {
    background-color: #0056b3;
}

</style>
<script>
    // Fungsi untuk menampilkan pop-up pencarian
document.getElementById("search-button").addEventListener("click", function () {
    document.getElementById("search-popup1").style.display = "block";
});

// Fungsi untuk menutup pop-up pencarian
document.getElementById("close-button").addEventListener("click", function () {
    document.getElementById("search-popup1").style.display = "none";
});

</script>