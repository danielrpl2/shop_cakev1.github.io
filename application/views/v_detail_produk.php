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
			<strong><h1 style="font-weight: 1000;">Detail Produk</h1></strong>
			<div class="bread-crumb"><a href="<?= base_url('home') ?>">Home &nbsp; /</a> <i class="current">Detail
					Produk</i></div>
		</div>
	</div>
</section>
<!-- End Page Title -->

<!-- Shop Single -->
<div class="shop-page">
    <div class="auto-container">
        <!-- Basic Details -->
        <div class="basic-details">
            <div class="row clearfix">
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="carousel-outer">
                        <ul class="image-carousel owl-carousel owl-theme">
                            <li>
                                <a href="<?= base_url('gambar/' . $produk->gambar) ?>" class="lightbox-image"
                                    data-fancybox="main-gallery" style="filter: invert(0); width: 0 700px; height: 30vh; object-fit: cover;">
                                    <img src="<?= base_url('gambar/' . $produk->gambar) ?>" alt="Product Image">
                                </a>
                            </li>
                        </ul>
                        <ul class="thumbs-carousel owl-carousel owl-theme">
                            <?php foreach ($gambar as $key => $value) { ?>
                                <li>
                                    <a href="<?= base_url('assets/gambarproduk/' . $value->gambar) ?>"
                                        class="lightbox-image" data-fancybox="main-gallery">
                                        <img src="<?= base_url('assets/gambarproduk/' . $value->gambar) ?>" alt="Product Image">
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <!-- Info Column -->
                <div class="info-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="details-header">
                            <h2><?= $produk->nama_produk ?></h2>
                            <div class="item-price">Rp. <?= number_format($produk->harga, 0) ?></div>
                        </div>
                        <div class="text">
                            <p><?= $produk->deskripsi ?></p>
                        </div>
                        <div class="other-options">
                            <!-- Btns Box -->
                            <?php
                            echo form_open('belanja/add');
                            echo form_hidden('id', $produk->id_produk);
                            echo form_hidden('price', $produk->harga);
                            echo form_hidden('name', $produk->nama_produk);
                            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                            ?>
                            <div class="btns-box">
                                <input type="number" data-max="10000000000" value="1" name="qty" placeholder="1" />
                                <?php if ($this->session->userdata('email') == "") { ?>
                                    <!-- Tambahkan logika jika user tidak masuk -->
                                <?php } else { ?>
                                    <button type="submit" class="theme-btn btn-style-two"
                                        onclick="addToCart('<?= $produk->nama_produk ?>')"><span class="txt">Add To
                                            Cart</span></button>
                                <?php } ?>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <ul class="tags-box">
                            <li>Category: <a href="<?= base_url('home/by_kategori') ?>"><?= $produk->nama_kategori ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic Details -->

        <!-- Product Info Tabs -->
        <div class="product-info-tabs">
    <!-- Product Tabs -->
    <div class="prod-tabs tabs-box">
        <!-- Tab Btns -->
        <ul class="tab-btns tab-buttons clearfix">
            <li data-tab="#prod-details" class="tab-btn active-btn">Description</li>
            <!-- <li data-tab="#prod-specs" class="tab-btn">Specifications</li>
            <li data-tab="#prod-reviews" class="tab-btn">Reviews</li> -->
        </ul>
        <!-- Tabs Container -->
        <div class="tabs-content">
            <!-- Tab / Active Tab - Description -->
            <div class="tab active-tab" id="prod-details">
                <div class="content">
                    <!-- <h2>Description</h2> -->
                    <ul class="spec-list">
                        <li><strong>Nama Produk :</strong> <?= $produk->nama_produk ?></li>
                        <li><strong>Berat  :</strong> <?= $produk->berat ?> Gr.</li>
                        <li><strong>Kategori :</strong> <?= $produk->nama_kategori ?></li>
                        <!-- Add more specifications as needed -->
                    </ul>
                    <p class="product-description">
                        <?= $produk->deskripsi ?>
                    </p>
                    <!-- <p class="product-features">
                        Key Features:
                    </p>
                    <ul class="feature-list">
                        <li>Feature 1: High-quality materials</li>
                        <li>Feature 2: User-friendly design</li>
                        <li>Feature 3: Advanced technology</li>
                    </ul> -->
                </div>
            </div>

            <!-- Tab - Specifications -->
            <div class="tab" id="prod-specs">
                <div class="content">
                    <h2>Specifications</h2>
                    <ul class="spec-list">
                        <li><strong>Color:</strong> <?= $produk->color ?></li>
                        <li><strong>Size:</strong> <?= $produk->size ?></li>
                        <li><strong>Weight:</strong> <?= $produk->weight ?> grams</li>
                        <!-- Add more specifications as needed -->
                    </ul>
                </div>
            </div>

            <!-- Tab - Reviews -->
            <div class="tab" id="prod-reviews">
                <div class="content">
                    <h2>Customer Reviews</h2>
                    <!-- Add customer reviews here -->
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- End Product Info Tabs -->

        <!-- Properties Page Section -->
<section class="properties-page-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <h1>Rekomendasi Lainnya</h1>
        </div>

        <div class="row clearfix">
            <?php if (count($rekomendasi_produk) > 0) : ?>
                <?php
                // Ambil ID produk terbaru
                $id_produk_terbaru = $rekomendasi_produk[0]->id_produk;
                $status = 'For Sale';

                // Cek apakah ID produk terbaru adalah produk pertama dalam daftar
                if ($rekomendasi_produk[0]->id_produk === $id_produk_terbaru) {
                    $status = 'New';
                }

                // Hitung selisih hari (jika Anda nantinya memperbarui dengan tanggal_ditambahkan)
                // $tanggalSekarang = time();
                // $tanggalDitambahkan = strtotime($rekomendasi_produk[0]->tanggal_ditambahkan);
                // $selisihHari = ($tanggalSekarang - $tanggalDitambahkan) / (60 * 60 * 24);

                // Tentukan status (baru atau for sale) berdasarkan selisih hari
                // if ($selisihHari <= 1) {
                //     $status = 'New';
                // }
                ?>

                <?php foreach ($rekomendasi_produk as $rekomendasi) : ?>
                    <div class="property-block col-lg-4 col-md-6 col-sm-12" style="width: 100%; padding: 10px;">
                        <div class="inner-box">
                            <div class="upper-box clearfix">
                                <div class="pull-left">
                                    <div class="price">Rp. <?= number_format($rekomendasi->harga, 0) ?></div>
                                </div>
                                <div class="pull-right">
                                    <a class="read-more" href="<?= base_url('home/detail_produk/' . $rekomendasi->id_produk) ?>">Read More <span class="fas fa-angle-double-right"></span></a>
                                </div>
                            </div>
                            <div class="image">
                                <span class="featured"><?= $status ?></span>
                                <a href="<?= base_url('home/detail_produk/' . $rekomendasi->id_produk) ?>">
                                    <img src="<?= base_url('gambar/' . $rekomendasi->gambar) ?>" alt="<?= $rekomendasi->nama_produk ?>" style="filter: invert(0); width: 0 700px; height: 40vh; object-fit: cover;" />
                                </a>
                                <div class="overlay-box">
                                    <li><?= $rekomendasi->nama_produk ?></li>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <!-- Jika tidak ada produk lain -->
                <div class="property-block col-12">
                    <div class="inner-box">
                        <div class="text-center">
                            <h2>Tidak ada produk lain dalam kategori ini...</h2>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

        <!-- End Team Section -->
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
    .product-description {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    margin-top: 20px;
}

.product-description h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 10px;
}

.product-description-text {
    font-size: 16px;
    color: #555;
    line-height: 1.5;
}

.product-advantages h3 {
    font-size: 20px;
    color: #333;
    margin-top: 20px;
}

.product-advantages ul {
    list-style-type: disc;
    margin-left: 20px;
    font-size: 16px;
    color: #555;
}

.product-additional-info {
    font-size: 16px;
    color: #555;
    margin-top: 20px;
}

.product-price {
    font-size: 18px;
    font-weight: bold;
    color: #e74c3c;
    margin-top: 20px;
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