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
			<strong><h1 style="font-weight: 1000;">Kategori Produk</h1></strong>
			<div class="bread-crumb"><a href="<?= base_url('home') ?>">Home &nbsp; /</a> <i class="current">Kategori
					Produk</i></div>
		</div>
	</div>
</section>
<!-- End Page Title -->

<!-- Sidebar Page Container -->
<div class="sidebar-page-container">
	<div class="auto-container">
		<div class="row clearfix">

			<!--Content Side-->
			<div class="content-side col-lg-8 col-md-12 col-sm-12">
				<div class="properties-grid">
					<div class="row clearfix">

						<!-- Property Block --->
						<?php foreach ($produk as $key => $value) { ?>
						<div class="property-block col-lg-6 col-md-6 col-sm-12">
							<?php
										echo form_open('belanja/add');
										echo form_hidden('id', $value->id_produk);
										echo form_hidden('qty', 1);
										echo form_hidden('price', $value->harga);
										echo form_hidden('name', $value->nama_produk); // Remove extra space after 'name'
										echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
									?>
							<div class="inner-box">
								<?php if ($this->session->userdata('email') == "") { ?>
								<div class="upper-box clearfix">
									<div class="pull-left">
										<div class="price">Rp.
											<?= number_format($value->harga,0) ?>
										</div>
									</div>
									<div class="pull-right">
										<a class="read-more"
											href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>">Read More
											<span class="fas fa-angle-double-right"></span></a>
									</div>
								</div>
								<div class="image">
									<span class="featured">
										<?= $value->nama_kategori ?>
									</span>
									<a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>"><img
											src="<?= base_url('gambar/' .$value->gambar) ?>"
											style="width: 0 700px; height: 43vh; object-fit: cover;" alt="" /></a>
									<div class="overlay-box">
										<li>
											<?= $value->nama_produk ?>
										</li>
										<li>
											<?= $value->nama_kategori ?>
										</li>
									</div>
								</div>
								<div class="lower-content">

								</div>
							</div>
							<?php } else{ ?>
							<div class="upper-box clearfix">
								<div class="pull-left">
									<div class="price">Rp.
										<?= number_format($value->harga,0) ?>
									</div>
								</div>
								<div class="pull-right">
									<a class="read-more"
										href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>">Read More <span
											class="fas fa-angle-double-right"></span></a>
								</div>
							</div>
							<div class="image">
								<span class="featured">
									<?= $value->nama_kategori ?>
								</span>
								<a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>"><img
										src="<?= base_url('gambar/' .$value->gambar) ?>"
										style="width: 0 700px; height: 40vh; object-fit: cover;" alt="" /></a>
								<div class="overlay-box">
									<li>
										<?= $value->nama_produk ?>
									</li>
									<li>
										<?= $value->nama_kategori ?>
									</li>
								</div>
							</div>
							<div class="lower-content">
								<div class="text">
									<button class="add-to-cart-button"
										onclick="addToCart('<?= $value->nama_produk ?>')">
										<i class="fas fa-shopping-cart"></i> Add +
									</button>
									<hr>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php  echo form_close(); ?>
					<?php } ?>

				</div>

			</div>
		</div>

		<!--Sidebar Side-->
		<div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
			<aside class="sidebar sticky-top">

				<!--Category Widget-->
				<div class="sidebar-widget categories-widget">
					<div class="sidebar-title">
						<h4><a href="<?= base_url('home/by_kategori') ?>" style="color: white;"> All Kategori </a></h4>
					</div>
					<?php $kategori = $this->m_home->get_all_data_kategori(); ?>
					<ul class="cat-list">

						<?php foreach ($kategori as $key => $value) {
                                    // Menghitung jumlah produk untuk kategori saat ini
                                    $jumlahProduk = $this->m_home->get_total_produk_by_kategori($value->id_kategori);
                                ?>
						<li class="clearfix"><a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>">
								<?= $value->nama_kategori ?> <span>(
									<?= $jumlahProduk ?>)
								</span>
							</a></li>
						<?php } ?>
					</ul>
				</div>
				<!--End Category Widget-->

				<!-- Properties Widget -->
				<div class="sidebar-widget recent-properties">

					<div class="sidebar-title">
						<h4>Berita Update</h4>
					</div>

					<!-- Post -->
					<?php
								$count = 0; // Variabel hitungan

								foreach ($blog as $key => $value) {
									if ($count < 5) { // Hanya tampilkan lima data
								?>
					<article class="post">
						<div class="post-thumb">
							<a href="<?= base_url('home/detail_blog/'.$value->id_blog) ?>">
								<img src="<?= base_url('assets/blog/' .$value->gambar) ?>" alt="">
								<span class="status">Update</span>
							</a>
						</div>
						<span class="location">
							<?= $value->tanggal ?>
						</span>
						<h3><a href="<?= base_url('home/detail_blog/'.$value->id_blog) ?>">
								<?= $value->judul ?>
							</a></h3>

					</article>
					<?php
									}

									$count++; // Tambahkan hitungan
								}
								?>

					<!-- Social Widget -->
					<div class="sidebar-widget sidebar-social-widget">
						<div class="sidebar-title">
							<h4>Follow Us</h4>
						</div>
						<ul class="social-icon-two">
							<li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
							<li class="twitter"><a href="#"><span class="fab fa-twitter"></span></a></li>
							<li class="g_plus"><a href="#"><span class="fab fa-google"></span></a></li>
							<li class="linkedin"><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
							<li class="pinteret"><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
							<li class="android"><a href="#"><span class="fab fa-android"></span></a></li>
							<li class="instagram"><a href="#"><span class="fab fa-instagram"></span></a></li>
							<li class="vimeo"><a href="#"><span class="fab fa-vimeo"></span></a></li>
						</ul>
					</div>
					<!-- End Social Widget -->
				</div>
			</aside>
		</div>

	</div>
</div>
</div>

<!-- untuk alert add -->
<script>
	function addToCart(productName) {
		// Send an AJAX request to add the product to the cart
		$.ajax({
			url: 'belanja/add', // Adjust the URL to your actual endpoint
			type: 'POST',
			data: { 'product_name': productName },
			success: function (response) {
				// Update the cart item count on success
				updateCartItemCount(response.item_count);
			},
			error: function () {
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

	.add-to-cart-button {
		background-color: #007bff;
		/* Warna latar belakang tombol */
		color: #fff;
		/* Warna teks tombol */
		border: none;
		width: 100%;
		padding: 10px 50px;
		cursor: pointer;
		border-radius: 5px;
	}

	.add-to-cart-button i {
		margin-right: 5px;
		/* Jarak antara ikon dan teks */
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