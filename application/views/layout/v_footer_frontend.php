
	<!--Main Footer-->
    <footer class="main-footer">
		<div class="auto-container">
        	<!--Widgets Section-->
            <div class="widgets-section">
            	<div class="row clearfix">
                	
                    <!--big column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
							
							<!--Footer Column-->
                            <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                                <div class="footer-widget logo-widget">
									<div class="logo">
                                    	<a href="index-2.html"><img src="<?= base_url() ?>assets/home2/images/orabella3.png" alt="" /></a>
                                    </div>
                                    <div class="text">Terimakasih Sudah Belanja Di Orabella Bakery</div>
									
								</div>
							</div>
							
							<!--Footer Column-->
                            <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <div class="footer-title  clearfix">
                                        <h2>Social Media</h2>
                                        <div class="separator"></div>
                                    </div>
                                    <ul class="social-icons">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <!-- Tambahkan ikon media sosial lainnya sesuai kebutuhan -->
                                    </ul>
                                </div>
                            </div>


							
						</div>
					</div>
					
					<!--big column-->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
							
						<!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget news-widget">
                                    <div class="footer-title  clearfix">
                                        <h2>News Update</h2>
                                        <div class="separator"></div>
                                    </div>

                                    <!--News Widget Block-->
                                    <?php
                                    $count = 0; // Variabel hitungan

                                    foreach ($blog as $key => $value) {
                                        if ($count < 2) { // Hanya tampilkan 2 data
                                    ?>
                                        <div class="news-widget-block">
                                            <div class="widget-inner">
                                                <div class="image">
                                                    <img src="<?= base_url('assets/blog/' . $value->gambar) ?>" alt="" />
                                                </div>
                                                <h3><a href="<?= base_url('home/detail_blog/'.$value->id_blog) ?>"><?= $value->judul ?></a></h3>
                                                <div class="post-date">
                                                    <?php
                                                    // Konversi tanggal ke format yang sesuai
                                                    $tanggal = date("d F Y", strtotime($value->tanggal));

                                                    // Pisahkan tanggal, bulan, dan tahun
                                                    $tanggal_array = explode(" ", $tanggal);

                                                    // Gunakan fungsi date() untuk mengambil nama bulan dari angka bulan
                                                    $bulan = date("F", strtotime($tanggal_array[1]));

                                                    // Tampilkan tanggal yang telah diubah dan nama bulan
                                                    echo $tanggal_array[0] . " " . $bulan . " " . $tanggal_array[2];
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        }

                                        $count++; // Tambahkan hitungan
                                    }
                                    ?>
                                </div>
                            </div>

							
							<!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget contact-widget">
									<div class="footer-title  clearfix">
										<h2>Contact Us</h2>
										<div class="separator"></div>
									</div>
									
									<ul class="contact-list">
										<li><span class="icon flaticon-placeholder"></span>Jl Pb Sudirman No 53 Gambirono Bangsalsari</li>
										<li><span class="icon flaticon-call"></span>Orabella : 08:30 - 18:00 <br> <a href="tel:+000-0000-000-00">+62 98447 728</a></li>
										<li><span class="icon flaticon-message"></span>Do you have a Question? <a href="mailto:info@gmail.com">orabellabakery@gmail.com</a></li>
									</ul>
									
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
	
		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="auto-container">
				<div class="copyright"><a href="#">Orabella Bakery</a></div>
			</div>
		</div>
	
	</footer>
	
</div>  
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

<!--Search Popup-->
<div id="search-popup" class="search-popup">
    <div class="close-search theme-btn"><span class="fas fa-window-close"></span></div>
    <div class="popup-inner">
        <div class="overlay-layer"></div>
        <div class="search-form">
            <h3>Keranjang Belanja</h3>
            <br>
            <div class="property-list">
                <?php if (empty($keranjang)) { ?>
                    <div class="property-item">
                        <div class="property-details">
                            <i class="fas fa-shopping-cart fa-4x" style="color: #00DCFF;"></i>
                            <p>Keranjang belanja Anda kosong.</p>
                            <a class="theme-btn belanja-sekarang" href="<?= base_url('home/by_kategori') ?>">Belanja Sekarang</a>
                        </div>
                    </div>
                <?php } else {
                    foreach ($keranjang as $key => $value) { 
                        $produk = $this->m_home->detail_produk($value['id']);	
                ?>
                <div class="property-item">
                    <div class="property-image">
                        <img src="<?= base_url('gambar/' . $produk->gambar) ?>" alt="Product Image">
                    </div>
                    <div class="property-details">
                        <h4><?= $value['name'] ?></h4>
                        <p>Rp. <?= $this->cart->format_number($value['subtotal']); ?></p>
                    </div>
                </div>
                <?php } ?>
                <!-- Add more property items as needed -->
            </div>

            <div class="button-container">
                <a class="theme-btn1 view-cart" href="<?= base_url('belanja') ?>">View Keranjang</a>
                <a class="theme-btn1 checkout" href="<?= base_url('belanja/cekout') ?>">Checkout</a>
            </div>
        </div>
    </div>
</div>


        </div>
        <?php } ?>
    </div>
</div>



<style>
    .search-popup {
    background: rgba(0, 0, 0, 1); /* Gunakan warna gelap dengan transparansi */
    /* Sisa CSS tetap sama */
}

 .property-list {
    display: flex;
    flex-wrap: column;
}

 .property-list h1 {
    text-align: center;
}

.property-item {
    display: flex;
    width: 100%;
    margin-bottom: 20px;
}

.property-image {
    flex: 1;
    margin-right: 20px;
    text-align: right;
}

.property-image img {
    max-width: 100%;
    height: auto;
}

.property-details {
    flex: 2;
    text-align: left;
}

.property-item h4 {
    margin: 10px 0;
    font-size: 18px;
    font-weight: 600;
    color: white;
}

.property-item p {
    font-weight: bold;
    color: white;
}
.button-container {
    justify-content: center;
    align-items: center;
    margin-top: 20px;

}

/* Add these CSS styles to your stylesheet */
.theme-btn1 {
    display: inline-block;
    padding: 10px 20px;
    margin: 5px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

.theme-btn1.view-cart {
    background-color: #00DCFF;
    color: black;
}

.theme-btn1.checkout {
    background-color: #00DCFF;
    color: black;
}

.theme-btn1:hover {
    background-color: #0099CC;
    color: white;
}

/* Add more button styles as needed */


/* Responsiveness */
@media (max-width: 767px) {
    .button-container {
        flex-direction: column;
    }
    
    .theme-btn {
        margin: 10px 0;
    }
}


/* Responsiveness */
@media (max-width: 767px) {
    .property-list {
        flex-direction: column;
    }

    .property-image,
    .property-details {
        width: 100%;
        margin-right: 0;
        text-align: center;
    }
}


</style>

<!--Scroll to top-->
 <!-- close untuk alert -->
 <script>
        window.setTimeout(function() {
            $('.alert').fadeTo(500,0).slideUp(500,function() {
                $(this).remove();
            });
        }, 3000)
    </script>   
<script src="<?= base_url() ?>assets/home2/js/jquery.js"></script>
<script src="<?= base_url() ?>assets/home2/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/home2/js/typeit.js"></script>
<script src="<?= base_url() ?>assets/home2/js/jquery-ui.js"></script>
<script src="<?= base_url() ?>assets/home2/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/home2/js/jquery.fancybox.js"></script>
<script src="<?= base_url() ?>assets/home2/js/owl.js"></script>
<script src="<?= base_url() ?>assets/home2/js/wow.js"></script>
<script src="<?= base_url() ?>assets/home2/js/mixitup.js"></script>
<script src="<?= base_url() ?>assets/home2/js/jquery-ui.js"></script>
<script src="<?= base_url() ?>assets/home2/js/jquery-ui.js"></script>
<script src="<?= base_url() ?>assets/home2/js/nav-tool.js"></script>
<script src="<?= base_url() ?>assets/home2/js/dropzone.js"></script>
<script src="<?= base_url() ?>assets/home2/js/tilt.jquery.min.js"></script>
<script src="<?= base_url() ?>assets/home2/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>assets/home2/js/main.js"></script>
<script src="<?= base_url() ?>assets/home2/js/appear.js"></script>
<script src="<?= base_url() ?>assets/home2/js/script.js"></script>
<script src="<?= base_url() ?>assets/home2/js/color-settings.js"></script>

<style>
    /* Tambahkan gaya CSS ini ke stylesheet Anda */
.social-icons {
    list-style: none;
    padding: 0;
    display: flex;
}

.social-icons li {
    margin-right: 10px;
}

.social-icons a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background-color: #333; /* Ganti warna latar belakang sesuai keinginan */
    color: #fff; /* Ganti warna teks ikon sesuai keinginan */
    border-radius: 50%;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.social-icons a:hover {
    background-color: #007bff; /* Ganti warna latar belakang saat hover sesuai keinginan */
}

</style>
</body>

<!-- dream-property/index-2.html  18 Nov 2019 05:06:35 GMT -->
</html>