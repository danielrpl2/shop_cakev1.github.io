<br>
<br>
<br>
<br>
<style>
@media (max-width: 768px) {

	br {
		display: none;
	}
}
</style>

<section class="video-banner-section">
    	<!--Video-->
        <video class="bg-video" preload="auto" autoplay="" loop="" muted="" style="filter: invert(0);">
            <source src="<?= base_url()?>assets/home2/videos/video.mp4" type="video/mp4">
            <source src="<?= base_url()?>assets/home2/videos/video.mp4" type="video/mp4">
            <h3>This browser does not happen to support video</h3>
		</video>
    	<div class="auto-container">
        	<div class="inner-container">
                <h1 class="variable-text">Home Industri <span class="theme_color">Orabella Bakery</span><i class="ti-placeholder" style="display:inline-block;width:0;line-height:0;overflow:hidden;">iwufwinfwhfnwh</i><span style="display:inline;position:relative;font:inherit;color:inherit;" class="ti-container"> <span class="theme_color">Everest</span></span><span style="display: inline; position: relative; font: inherit; color: inherit; opacity: 0.654508;" class="ti-cursor">|</span></h1>
				<p style="color: white;">Jika ingin belanja anda harus mempunyai akun terlebih dahulu. <br> Tidak punya akun? <a href="<?= base_url('pelanggan/register') ?>">Buat Akun</a> Sudah punya akun? <a href="<?= base_url('pelanggan/login') ?>">login</a></p>
                <div class="text"></div>
                <a href="#produk" class="theme-btn btn-style-two btn-group-sm"><span class="txt">Belanja Sekarang</span></a>
            </div>
        </div>
    </section>
    <!-- End Main Slider Two -->

	<!-- Produk -->
    <section class="properties-page-section" id="produk">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h1 style="font-weight: 1000;">Produk</h1>
				<!-- <div class="separator"></div> -->
			</div>
			
			
            <!-- Property Block --->
            <div class="row clearfix">
            <?php foreach ($produk as $key => $value) { ?>
				<div class="property-block col-lg-4 col-md-6 col-sm-12">
                    	<?php
						echo form_open('belanja/add');
						echo form_hidden('id', $value->id_produk);
						echo form_hidden('qty', 1);
						echo form_hidden('price', $value->harga);
						echo form_hidden('name', $value->nama_produk); // Remove extra space after 'name'
						echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
					?>
					<div class="inner-box" style="width: 100%;">
                    <?php if ($this->session->userdata('email') == "") { ?>
                        <div class="lower-content">
							<h3 class="text-center" ><a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>" style="font-size: 30px;"><strong><?= $value->nama_produk ?></strong></a></h3>
						</div>
						<div class="upper-box clearfix">
							<div class="pull-left">
								<div class="price">Rp. <?= number_format($value->harga,0) ?></div>
							</div>
							<div class="pull-right">
								<a class="read-more" href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>">Read More <span class="fas fa-angle-double-right"></span></a>
							</div>
						</div>
						<div class="image">
							<a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>"><img src="<?= base_url('gambar/' .$value->gambar1) ?>" alt="" style="filter: invert(0); width: 0 700px; height: 40vh; object-fit: cover;"></a>
							<div class="overlay-box">
								<li>For Sale</li>
								<li class="sold"><?= $value->nama_kategori ?></li>
							</div>
						</div>
						
                        <?php } else{ ?>
                            <div class="upper-box clearfix">
							<div class="pull-left">
								<div class="price">Rp. <?= number_format($value->harga,0) ?></div>
							</div>
							<div class="pull-right">
								<a class="read-more" href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>">Read More <span class="fas fa-angle-double-right"></span></a>
							</div>
						</div>
						<div class="image">
							<a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>"><img src="<?= base_url('gambar/' .$value->gambar1) ?>" alt="" style="filter: invert(0); width: 0 700px; height: 43vh; object-fit: cover;"></a>
							<div class="overlay-box">
								<li>For Sale</li>
								<li class="sold"><?= $value->nama_kategori ?></li>
							</div>
						</div>
						<div class="lower-content">
							<h3 style="font-size: 25px; font-weight: 1000;"><a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>"><?= $value->nama_produk ?></a></h3>
							<br>
                            <div class="text">
                                <button class="add-to-cart-button" onclick="addToCart('<?= $value->nama_produk ?>')">
                                    <i class="fas fa-shopping-cart"></i> Masukan Keranjang +
                                </button>
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
	

<!-- Gallery Section -->
<section class="gallery-section alternate">
		<div class="auto-container">
			<!--Sec Title-->
            <div class="sec-title centered">
            	<h1 style="font-weight: 1000;">Gallery Produk</h1>
                <!-- <div class="separator"></div> -->
            </div>
		</div>
		
		<div class="gallery-carousel owl-carousel owl-theme">
            <?php foreach ($galery as $key => $value) { ?>
            <!-- Project item -->
			<div class="gallery-item">
				<div class="image-box">
					<figure class="image">
						<img src="<?= base_url('gambar/' .$value->gambar1) ?>" style="width: 0 700px; height: 30vh; object-fit: cover;" alt="">
					</figure>
					<div class="overlay-box">
						<div class="icon-box">
							<a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>" class="link"><span class="icon fa flaticon-unlink"></span></a>
							<a href="<?= base_url('gambar/' .$value->gambar1) ?>" class="link" data-fancybox="gallery-two" data-caption=""><span class="icon fa fa-expand-arrows-alt"></span></a>
							<h3><a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>"><?= $value->nama_produk ?></a></h3>
						</div>
					</div>
				</div>
			</div>
            <?php } ?>
         </div>
		 
</section>
<!-- End Gallery Section -->

	<!-- Call To Action Section -->
    <section class="call-to-action-section" style="background-image: url(<?= base_url()?>assets/home2/images/background/walpaper.jpg)">
    	<div class="auto-container">
			<h2 style="font-weight: 1000;">Anda Memiliki Masalah ?</h2>
			<div class="text">Jika anda mempunyai masalah atau kebingungan saat ingin memesan atau ingin tau lebih lanjut tentang Orabella Bakery silahkan pegi ke halaman About.</div>
			<a href="<?= base_url('home/about') ?>" class="theme-btn btn-style-two"><span class="txt">About</span></a>
        </div>
	</section>		
	<!-- Call To Action Section -->



	


<!-- untuk alert add -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- untuk alert add -->
<script>
    // Function to show a notification when adding a product to the cart
    function addToCart(productName) {
        // Create a promise for the SweetAlert2 notification
        const successNotification = Swal.fire({
            icon: 'success',
            title: productName + ' berhasil ditambahkan!!',
            showConfirmButton: false,
			timer: 5000 // Tampilkan tombol OK
        }).then(function(result) {
            if (result.isConfirmed) {
                // Setelah pengguna mengklik OK, segarkan halaman
                location.reload();
            }
        });

        // Send an AJAX request to add the product to the cart
        $.ajax({
            url: 'belanja/add', // Sesuaikan URL dengan endpoint sebenarnya
            type: 'POST',
            data: { 'product_name': productName },
        }).then(function(response) {
            // Update the cart item count on success
            updateCartItemCount(response.item_count);
            // Resolve the promise to show the notification
            successNotification.then(() => successNotification.close());
        }).catch(function(error) {
            // Handle error, if any
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while adding the product to your cart',
            });
        });
    }

    // Function to update the cart item count
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
.add-to-cart-button {
    background-color: #007bff; /* Warna latar belakang tombol */
    color: #fff; /* Warna teks tombol */
    border: none;
    width: 100%;
    padding: 10px 50px;
    cursor: pointer;
    border-radius: 5px;
}

.add-to-cart-button i {
    margin-right: 5px; /* Jarak antara ikon dan teks */
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
<!-- Add this to the head section of your HTML file -->
