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
			<strong><h1 style="font-weight: 1000;">Halaman Blog</h1></strong>
			<div class="bread-crumb"><a href="<?= base_url('home') ?>">Home &nbsp; /</a> <i class="current">Halaman Blog</i></div>
		</div>
	</div>
</section>
<!-- End Page Title -->

<!-- Blog Page Section -->
<section class="blog-page-section">
    <div class="auto-container">
        <!-- <div class="sec-title centered">
            <h1>Berita Terbaru</h1>
        </div> -->
        <div class="row clearfix">

            <!--News Style One-->
            <?php 
            foreach ($blog as $key => $value) { ?>
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInRight" data-wow-delay="500ms" data-wow-duration="1500ms">
                    <div class="image">
                        <a href="<?= base_url('home/detail_blog/'.$value->id_blog) ?>"><img class="youtube-thumbnail"
                                src="<?= base_url('assets/blog/' .$value->gambar) ?>"
                                alt="" /></a>
                    </div>
                    <div class="lower-content">
                        <div class="upper-box">
                            <div class="date-box">
                                <?php
                                    // Konversi tanggal ke format yang sesuai
                                    $tanggal = date("d M Y", strtotime($value->tanggal));

                                    // Pisahkan tanggal, bulan, dan tahun
                                    $tanggal_array = explode(" ", $tanggal);

                                    // Tampilkan tanggal dan bulan dalam format singkat
                                    echo '<div class="date-item">' . $tanggal_array[0] . '</div>';
                                    echo '<div class="date-item">' . $tanggal_array[1] . '</div>';
                                    ?>
                            </div>
                            <h4><a href="<?= base_url('home/detail_blog/'.$value->id_blog) ?>">
                                    <?= $value->judul ?>
                                </a></h4>
                            <!-- <ul class="post-meta">
                                    <li><a href="#"><span class="icon fa fa-user"></span> By admin</a></li>
                                    <li><a href="#"><span class="icon fa fa-eye"></span> 20</a></li>
                                    <li><a href="#"><span class="icon fas fa-calendar-alt"></span>Admin</a></li>
                                </ul> -->
                            <div class="separator"></div>
                        </div>
                        <div class="lower-box">
                            <div class="text">
                                <?php
                                    $deskripsi = $value->deskripsi;
                                    $max_length = 30; // Jumlah karakter maksimum yang ingin ditampilkan

                                    if (strlen($deskripsi) > $max_length) {
                                        // Jika deskripsi terlalu panjang, potong teks dan tampilkan "Read More" link
                                        $deskripsi_potong = substr($deskripsi, 0, $max_length) . '...';
                                        echo $deskripsi_potong;
                                        echo '<a class="read-more" href="' . base_url('home/detail_blog/'.$value->id_blog) . '">Read More...</a>';
                                    } else {
                                        // Jika deskripsi tidak terlalu panjang, tampilkan teks penuh tanpa "Read More" link
                                        echo $deskripsi;
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- End Blog Page Section -->

<style>
    .youtube-thumbnail {
        width: 350px; /* Lebar thumbnail */
        height: 220px; /* Tinggi thumbnail sesuai dengan aspek rasio 16:9 */
        object-fit: cover;
    }
</style>
				

