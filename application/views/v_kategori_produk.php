<!-- Page Title -->
<section class="page-title" style="background-image:url(<?= base_url() ?>assets/home2/images/background/2.jpg);">
    	<div class="auto-container">
        	<div class="inner-box">
                <h1>Kategori Produk</h1>
                <div class="bread-crumb"><a href="<?= base_url('home') ?>">Home &nbsp; /</a> <i class="current">Kategori Produk</i></div>
            </div>
        </div>
    </section>
	<!-- End Page Title -->
	
<!-- Sidebar Page Container -->
<div class="sidebar-page-container search-home-section">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
					<div class="properties-list">
						
						<!-- Property Block -->
						<?php foreach ($produk as $key => $value) { ?>
						<div class="property-block-two style-two">
							<?php
                                echo form_open('belanja/add');
                                echo form_hidden('id', $value->id_produk);
                                echo form_hidden('qty', 1);
                                echo form_hidden('price', $value->harga);
                                echo form_hidden('name', $value->nama_produk); // Remove extra space after 'name'
                                echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                            ?>
							<div class="inner-box">
								<div class="clearfix">
									<div class="image-box col-lg-5 col-md-5 col-sm-12">
										<figure class="image"><img style="width: 100%; height: 335px; overlow: hideen; object-fit: cover; object-position: center;" src="<?= base_url('gambar/' .$value->gambar) ?>" alt=""></figure>
									</div>

								<div class="lower-content col-lg-7 col-md-7 col-sm-12">
										<h5><a href="properties-detail.html"><?= $value->nama_produk ?></a></h5>
										<div class="lucation"><i class="la la-map-marker"></i>Kategori : <?= $value->nama_kategori ?></div>
										<div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</div>
										<div class="property-price clearfix">
											<div class="read-more"><a href="<?= base_url('home/detail_produk/'.$value->id_produk) ?>" class="theme-btn">More Detail</a></div>
											<div class="price">Rp. <?= number_format($value->harga,0) ?></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<?php  echo form_close(); ?>
					<?php } ?>
					</div>
				</div>
				
				<!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar sticky-top">
					
						<!--Category Widget-->
						<div class="sidebar-widget categories-widget">
							<div class="sidebar-title">
								<h4>Categories</h4>
							</div>
							<?php $kategori = $this->m_home->get_all_data_kategori(); ?>
							<ul class="cat-list">
								
								<?php foreach ($kategori as $key => $value) {
                                    // Menghitung jumlah produk untuk kategori saat ini
                                    $jumlahProduk = $this->m_home->get_total_produk_by_kategori($value->id_kategori);
                                ?>
								<li class="clearfix"><a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>"> <?= $value->nama_kategori ?> <span>(<?= $jumlahProduk ?>)</span></a></li>
								<?php } ?>
							</ul>
						</div>
						<!--End Category Widget-->
						
						
					</aside>
				</div>
				
			</div>
		</div>
	</div>