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
			<strong><h1 style="font-weight: 1000;">Detail Blog</h1></strong>
			<div class="bread-crumb"><a href="<?= base_url('home') ?>">Home &nbsp; /</a> <i class="current">Detail
					Blog</i></div>
		</div>
	</div>
</section>
<!-- End Page Title -->

<!-- Sidebar Page Container -->
<div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="sticky-container row clearfix">
				
				<!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
					<div class="blog-detail">
						<div class="inner-box">
							<div class="image">
								<div class="date-box">
								<?php
                                    // Konversi tanggal ke format yang sesuai
                                    $tanggal = date("d M Y", strtotime($blog_detail->tanggal));

                                    // Pisahkan tanggal, bulan, dan tahun
                                    $tanggal_array = explode(" ", $tanggal);

                                    // Tampilkan tanggal dan bulan dalam format singkat
                                    echo '<div class="date-item">' . $tanggal_array[0] . '</div>';
                                    echo '<div class="date-item">' . $tanggal_array[1] . '</div>';
                                    ?>
								</div>
								<img class="youtube-thumbnail" src="<?= base_url('assets/blog/' . $blog_detail->gambar)?>" alt="" />
							</div>
							<div class="lower-content">
								<div class="upper-box">
									<h3><?= $blog_detail->judul; ?></h3><hr>
									<!-- <ul class="post-meta">
										<li><span class="icon fa fa-user"></span> By admin</li>
										<li><span class="icon fa fa-eye"></span> 54</li>
										<li><span class="icon fas fa-comment-dots"></span> 27 comments</li>
									</ul> -->
									<div class="separator"></div>
								</div>
								<div class="lower-box">
									<div class="text">
										<p style="font-size: 20px;">Deskripsi : <?= $blog_detail->deskripsi; ?></p>										
									</div>
								</div>
							</div>
						</div>
						
						<!--Comments Area-->
						<!-- <div class="comments-area">
							<div class="group-title">
								<h2>2 Comments</h2>
							</div>
							
							<div class="comment-box">
								<div class="comment">
									<div class="author-thumb"><img src="<?= base_url() ?>assets/home2/images/resource/author-1.jpg" alt=""></div>
									<div class="comment-info clearfix"><strong>Micheal yard</strong><div class="comment-time">13 June, 2019      at 07:30</div></div>
									<div class="text">Lorem ipsum dolor sit amet, consectetuer a the adipiscing elit. Aenean commodo ligulai dolor Aenean massa ligulai dolor Aenean massa ligulai dolor Aenean massa.</div>
									<a class="theme-btn reply-btn" href="#">Reply</a>
								</div>
							</div>
							
							<div class="comment-box reply-comment">
								<div class="comment">
									<div class="author-thumb"><img src="<?= base_url() ?>assets/home2/images/resource/author-2.jpg" alt=""></div>
									<div class="comment-info clearfix"><strong>Adam Gilgrist</strong><div class="comment-time">13 June, 2019      at 07:30</div></div>
									<div class="text">Lorem ipsum dolor sit amet, consectetuer a the adipiscing elit. Aenean commodo ligulai dolor Aenean.</div>
									<a class="theme-btn reply-btn" href="#">Reply</a>
								</div>
							</div>
							
							<div class="comment-box">
								<div class="comment">
									<div class="author-thumb"><img src="<?= base_url() ?>assets/home2/images/resource/author-3.jpg" alt=""></div>
									<div class="comment-info clearfix"><strong>Pollard Micheal</strong><div class="comment-time">13 June, 2019      at 07:30</div></div>
									<div class="text">Lorem ipsum dolor sit amet, consectetuer a the adipiscing elit. Aenean commodo ligulai dolor Aenean massa ligulai dolor Aenean massa ligulai dolor Aenean massa.</div>
									<a class="theme-btn reply-btn" href="#">Reply</a>
								</div>
							</div>
							
						</div> -->
						
						<!-- Comment Form -->
						<div class="comment-form">
								
							<!-- <div class="group-title"><h2>Leave A Comment</h2></div> -->
							
							<!--Comment Form-->
							<!-- <form method="post" action="http://ary-themes.com/html/noor_tech/dream-property/blog.html">
								<div class="row clearfix">
									
									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="text" name="username" placeholder="Full Name" required>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="email" name="email" placeholder="Email" required>
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<input type="text" name="subject" placeholder="Subject" required>
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<textarea class="darma" name="message" placeholder="Your Message"></textarea>
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<button class="theme-btn btn-style-two" type="submit" name="submit-form"><span class="txt">SEND MESSAGE</span></button>
									</div>
									
								</div>
							</form> -->
								
						</div>
						<!--End Comment Form -->
						
					</div>
				</div>
				
				<!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar sticky-top">
						<div class="sidebar-inner">
							
							<!-- Properties Widget -->
							<div class="sidebar-widget recent-properties">
								
								<div class="sidebar-title">
									<h4>Rekomendasi Produk</h4>
								</div>
								
								<!-- Post -->
								<?php
								$count = 0; // Variabel hitungan

								foreach ($produk as $key => $value) {
									if ($count < 5) { // Hanya tampilkan lima data
								?>
									<article class="post">
										<div class="post-thumb">
											<a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>">
												<img src="<?= base_url('gambar/' .$value->gambar1) ?>" style="width: 100%; height: 10vh; object-fit: cover;" alt="">
												<span class="status">Sale</span>
											</a>
										</div>
										<span class="location"><?= $value->nama_kategori ?></span>
										<h3><a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>"><?= $value->nama_produk ?></a></h3>
										<div class="price">Rp. <?= number_format($value->harga, 0) ?></div>
									</article>
								<?php
									}

									$count++; // Tambahkan hitungan
								}
								?>
								<!-- End Post -->

								
							</div>

							<!-- Properties Widget -->
							<div class="sidebar-widget recent-properties">
								
								<div class="sidebar-title">
									<h4>Blog Lainnya</h4>
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
												<img src="<?= base_url('assets/blog/' .$value->gambar) ?>" style="width: 100%; height: 10vh; object-fit: cover;" alt="">
											</a>
										</div>
										<span class="location"><?= $value->judul ?></span>
										<h3><a href="<?= base_url('home/detail_blog/'.$value->id_blog) ?>"><?= $value->judul ?></a></h3>
										<div class="price"><?= $value->tanggal ?></div>
									</article>
								<?php
									}

									$count++; // Tambahkan hitungan
								}
								?>
								<!-- End Post -->

								
							</div>
							
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
	<!-- End Sidebar Page Container -->

<style>
    .youtube-thumbnail {
        width: 350px; /* Lebar thumbnail */
        height: 500px; /* Tinggi thumbnail sesuai dengan aspek rasio 16:9 */
        object-fit: cover;
    }
</style>
			