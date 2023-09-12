<!-- Breadcrumbs -->
<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Shop Grid</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
		
		<!-- Product Style -->
		<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<?php $kategori = $this->m_home->get_all_data_kategori(); ?>
								<div class="single-widget category">
									<h3 class="title">Categories</h3>
									<ul class="categor-list">
										<li><a href="<?= base_url('home/by_kategori') ?>">All Categories</a></li>
										<?php foreach ($kategori as $key => $value) {
											// Menghitung jumlah produk untuk kategori saat ini
											$jumlahProduk = $this->m_home->get_total_produk_by_kategori($value->id_kategori);
										?>
											<li>
												<a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>">
													<?= $value->nama_kategori ?> (<?= $jumlahProduk ?> Produk)
												</a>
											</li>
										<?php } ?>
									</ul>
								</div>

								<!--/ End Single Widget -->

								<!-- Shop By Price -->
									<!-- <div class="single-widget range">
										<h3 class="title">Shop by Price</h3>
										<div class="price-filter">
											<div class="price-filter-inner">
												<div id="slider-range"></div>
													<div class="price_slider_amount">
													<div class="label-input">
														<span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price"/>
													</div>
												</div>
											</div>
										</div>
										<ul class="check-box-list">
											<li>
												<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
											</li>
											<li>
												<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
											</li>
										</ul>
									</div> -->
								<!--/ End Shop By Price -->

								<!-- Single Widget -->
								<!-- <div class="single-widget recent-post">
									<h3 class="title">Recent post</h3>
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Girls Dress</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Women Clothings</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
									<div class="single-post first">
										<div class="image">
											<img src="https://via.placeholder.com/75x75" alt="#">
										</div>
										<div class="content">
											<h5><a href="#">Man Tshirt</a></h5>
											<p class="price">$99.50</p>
											<ul class="reviews">
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
												<li class="yellow"><i class="ti-star"></i></li>
											</ul>
										</div>
									</div>
								</div> -->
								<!--/ End Single Widget -->
								
								<!-- Single Widget -->
								<!-- <div class="single-widget category">
									<h3 class="title">Manufacturers</h3>
									<ul class="categor-list">
										<li><a href="#">Forever</a></li>
										<li><a href="#">giordano</a></li>
										<li><a href="#">abercrombie</a></li>
										<li><a href="#">ecko united</a></li>
										<li><a href="#">zara</a></li>
									</ul>
								</div> -->
								<!--/ End Single Widget -->
						</div>
					</div>
					<div class="col-lg-9 col-md-8 col-12">
						<div class="row">
							<div class="col-12">
								<!-- Shop Top -->
								<div class="shop-top">
									<div class="shop-shorter">
										<div class="single-shorter">
											<label>Show :</label>
											<select>
												<option selected="selected">09</option>
												<option>15</option>
												<option>25</option>
												<option>30</option>
											</select>
										</div>
										<div class="single-shorter">
											<label>Sort By :</label>
											<select>
												<option selected="selected">Name</option>
												<option>Price</option>
												<option>Size</option>
											</select>
										</div>
									</div>
									<!-- <ul class="view-mode">
										<li class="active"><a href="shop-grid.html"><i class="fa fa-th-large"></i></a></li>
										<li><a href="shop-list.html"><i class="fa fa-th-list"></i></a></li>
									</ul> -->
								</div>
								<!--/ End Shop Top -->
							</div>
						</div>
						<div class="row">
													<?php foreach ($produk as $key => $value) { ?>
														<div class="col-lg-4 col-md-4 col-12">
															<?php
															echo form_open('belanja/add');
															echo form_hidden('id', $value->id_produk);
															echo form_hidden('qty', 1);
															echo form_hidden('price', $value->harga);
															echo form_hidden('name', $value->nama_produk); // Remove extra space after 'name'
															echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
															?>
															<div class="single-product" style="width: 0 290px; padding: 5px;">
																<div class="product-img" style="width: 100%; height: 310px; overlow: hideen; object-fit: cover; animation: all 0.5s">
																	<a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>">
																		<img style="width: 100%; height: 335px; overlow: hideen; object-fit: cover; object-position: center; animation: all 0.5s" class="default-img" src="<?= base_url('gambar/' .$value->gambar) ?>">
																		<img style="width: 310px; height: 320px; overlow: hideen; object-fit: cover; animation: all 0.5s" class="hover-img" src="<?= base_url('gambar/' .$value->gambar) ?>">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a title="Quick View" href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																			<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																			<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
																		</div>
																		<div class="product-action-2">
																			<!-- Menambahkan JavaScript onClick untuk menampilkan alert -->
																			<button title="Add to cart" class="toastrDefaultSuccess" style="border: none; padding: 0; background: none;" onclick="addToCart('<?= $value->nama_produk ?>')">Add To <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3><a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>"style="font-size: 20px; font-weight: 600;"><?= $value->nama_produk ?></a></h3>
																	<div class="product-price">
																		<span style="color: red;">Rp. <?= number_format($value->harga,0) ?></span>
																	</div>
																</div>
															</div>
														</div>
														<?php  echo form_close(); ?>
													<?php } ?>
												</div>
				</div>
			</div>
		</section>
		<!--/ End Product Style 1  -->	

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
        alertBox.textContent = productName + ' !sudah ditambahkan ke keranjang.';
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

		<!-- Start Shop Newsletter  -->
		<section class="shop-newsletter section">
			<div class="container">
				<div class="inner-top">
					<div class="row">
						<div class="col-lg-8 offset-lg-2 col-12">
							<!-- Start Newsletter Inner -->
							<div class="inner">
								<h4>Newsletter</h4>
								<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
								<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="EMAIL" placeholder="Your email address" required="" type="email">
									<button class="btn">Subscribe</button>
								</form>
							</div>
							<!-- End Newsletter Inner -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Newsletter -->