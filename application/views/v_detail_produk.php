<!-- Breadcrumbs -->
<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="<?= base_url() ?>">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="#"><?= $title ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
<div class="modal-body">
    <div class="row no-gutters">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <!-- Product Slider -->
            <div class="product-gallery">
                <img id="mainImage" style="border-radius: 20px;" src="<?=base_url('gambar/' . $produk->gambar)?>" alt="#">
            </div>

            <!-- Mini Gambar -->
            <div class="mini-gallery">
                <img class="mini-image" style="border-radius: 20px;" src="<?=base_url('gambar/' . $produk->gambar)?>" alt="#">
                <?php foreach ($gambar as $key => $value) {?>
                    <img style="border-radius: 20px;" class="mini-image" src="<?= base_url('assets/gambarproduk/' . $value->gambar)?>" alt="#">
               <?php }?>
            </div>
        </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="quickview-content">

                                    <h1><?=$produk->nama_produk?></h1>
                                    <hr>
                                    <h2><a href="<?= base_url('home/by_kategori') ?>" style="font-weight:600;">Kategori</a> : <?=$produk->nama_kategori?></h2>
                                    <!-- <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div> -->
                                    <h3 style="color: red;">Rp. <?=number_format($produk->harga, 0)?></h3>
                                    <div class="quickview-peragraph">
                                        <p><?=$produk->deskripsi?></p>
                                    </div>
                                    <hr>

                                    <?php
                                    echo form_open('belanja/add');
									echo form_hidden('id', $produk->id_produk);
									echo form_hidden('price', $produk->harga);
									echo form_hidden('name', $produk->nama_produk); // Remove extra space after 'name'
									echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                                    ?>
									
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
										
											<input type="number" name="qty" class="input-number"  data-min="1" data-max="10000000000" value="1">
											
										</div>
										<!--/ End Input Order -->
									</div>
                                  

									<div class="add-to-cart">
                                    <button title="Add to cart" type="submit" class="btn min" style="border: none; padding: 0; background: none; background-color: yellow; color: black; width: 100px;" onclick="addToCart('<?= $produk->nama_produk ?>')"> Add To <i class="fa fa-cart-plus" aria-hidden="true"></i> </button>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                    <?php echo form_close(); ?>
                </div>
             </div>
        </div>
    </div>
 <style>
.mini-gallery {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
     flex-wrap: wrap; 
    
}


.mini-gallery img {
    /* max-width: 120px; */
    width: 30%;
    padding: 5px;
    height: auto;
    cursor: pointer;
}

.mini-gallery img:hover {
    border: 2px solid #007bff; /* Warna yang Anda inginkan pada hover */
}
/* Tampilan responsif untuk perangkat seluler */
@media (max-width: 768px) {
    .row.no-gutters {
        flex-direction: column;
    }

    .col-lg-6.col-md-12.col-sm-12.col-xs-12 {
        width: 100%;
        margin-bottom: 20px;
    }

    .product-gallery {
        text-align: center;
    }

    .product-gallery img {
        max-width: 100%;
        height: auto;
    }

    .mini-gallery {
        display: flex;
        flex-wrap: wrap; /* Ini akan membuat elemen-elemen bergulir ke baris bawah saat tampilan seluler */
        justify-content: center;
        margin-top: 10px;
    }

    .mini-gallery img {
        max-width: 30%; /* Ubah sesuai kebutuhan Anda */
        height: auto;
        cursor: pointer;
        margin-right: 10px; /* Jarak antara mini gambar */
        margin-bottom: 10px; /* Jarak vertikal antara mini gambar */
    }
}
</style>
<script>
    // Ambil semua elemen gambar mini
    const miniImages = document.querySelectorAll('.mini-image');

    // Ambil elemen gambar utama
    const mainImage = document.getElementById('mainImage');

    // Loop melalui setiap gambar mini dan tambahkan event listener
    miniImages.forEach((miniImage) => {
        miniImage.addEventListener('click', () => {
            // Ganti gambar utama dengan gambar mini yang diklik
            mainImage.src = miniImage.src;
        });
    });
</script>


<!-- untuk alert add -->
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