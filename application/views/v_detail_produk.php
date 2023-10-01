<!-- Page Title -->
<section class="page-title" style="background-image:url(<?= base_url() ?>assets/home2/images/background/2.jpg);">
    <div class="auto-container">
        <div class="inner-box">
            <h1>Detail Produk</h1>
            <div class="bread-crumb"><a href="<?= base_url('home') ?>">Home &nbsp; /</a> <i class="current">Detail Produk</i>
            </div>
        </div>
    </div>
</section>
<!-- End Page Title -->
<!--Shop Single-->
<div class="shop-page">
    <div class="auto-container">
        <!--Basic Details-->
        <div class="basic-details">
            <div class="row clearfix">

                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="carousel-outer">
                        <ul class="image-carousel owl-carousel owl-theme">
                            <li>
                                <a href="<?= base_url('gambar/' . $produk->gambar)?>" class="lightbox-image"
                                    data-fancybox="main-gallery">
                                    <img src="<?= base_url('gambar/' . $produk->gambar)?>" alt="">
                                </a>
                            </li>
                        </ul>
                        <ul class="thumbs-carousel owl-carousel owl-theme">
                            <?php foreach ($gambar as $key => $value) {?>
                            <li>
                                <a href="<?= base_url('assets/gambarproduk/' . $value->gambar)?>" class="lightbox-image"
                                    data-fancybox="main-gallery">
                                    <img src="<?= base_url('assets/gambarproduk/' . $value->gambar)?>" alt="">
                                </a>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>

                <!--Info Column-->
                <div class="info-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="details-header">
                            <h2>
                                <?= $produk->nama_produk?>
                            </h2>
                            <div class="item-price">Rp. <?=number_format($produk->harga, 0)?></div>
                        </div>
                        <div class="text">
                            <p>
                                <?= $produk->deskripsi ?>
                            </p>
                        </div>
                        <div class="other-options">
                            <!--Btns Box-->
                            <?php
                            echo form_open('belanja/add');
                            echo form_hidden('id', $produk->id_produk);
                            echo form_hidden('price', $produk->harga);
                            echo form_hidden('name', $produk->nama_produk); // Remove extra space after 'name'
                            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                            ?>
                            <div class="btns-box">
                                <input type="number" data-max="10000000000" value="1" name="qty" placeholder="1" />
                                <button type="submit" class="theme-btn btn-style-two"
                                    onclick="addToCart('<?= $produk->nama_produk ?>')"><span class="txt">Add To
                                        Cart</span></button>
                            </div>
                        </div>
                        <ul class="tags-box">
                            <li>Categori : <a href="<?= base_url('home/by_kategori') ?>">
                                    <?= $produk->nama_kategori?>
                                </a></li>
                        </ul>
                        <?php echo form_close(); ?>
                    </div>
                </div>

            </div>
        </div>
        <!--Basic Details-->

        <!--Product Info Tabs-->
        <div class="product-info-tabs">
            <!--Product Tabs-->
            <div class="prod-tabs tabs-box">

                <!--Tab Btns-->
                <ul class="tab-btns tab-buttons clearfix">
                    <li data-tab="#prod-details" class="tab-btn active-btn">Description</li>
                    <li data-tab="#prod-reviews" class="tab-btn">Additional Info</li>
                    <li data-tab="#prod-info" class="tab-btn">Reviews (3)</li>
                </ul>

                <!--Tabs Container-->
                <div class="tabs-content">

                    <!--Tab / Active Tab-->
                    <div class="tab active-tab" id="prod-details">
                        <div class="content">
                            <p>
                                <?= $produk->deskripsi ?>
                            </p>
                        </div>
                    </div>

                    <!--Tab-->
                    <div class="tab" id="prod-reviews">
                        <div class="content">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quluptas sit
                                aspernatur aut odit aut fugit, sed quia consequuntur magni dolores.Lorem ipsum dolor sit
                                amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa.
                                Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus
                                mus.</p>
                        </div>
                    </div>

                    <!--Tab / Active Tab-->
                    <div class="tab" id="prod-info">
                        <div class="content">

                            <!--Comment Box-->
                            <div class="comment-box">
                                <div class="comment">
                                    <div class="author-thumb"><img
                                            src="<?= base_url() ?>assets/home2/images/resource/author-2.jpg" alt="">
                                    </div>
                                    <div class="comment-inner">
                                        <div class="comment-info">Sandra Mavic</div>
                                        <div class="post-date">March 03, 2019</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli.
                                            Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque
                                            penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec
                                            qam penatibus et magnis .</div>
                                        <div class="rating">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star light"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Comment Box-->
                            <div class="comment-box reply-comment">
                                <div class="comment">
                                    <div class="author-thumb"><img
                                            src="<?= base_url() ?>assets/home2/images/resource/author-2.jpg" alt="">
                                    </div>
                                    <div class="comment-inner">
                                        <div class="comment-info">Micheal Waugn</div>
                                        <div class="post-date">April 04, 2019</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli.
                                            Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque
                                            penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec
                                            qam penatibus et magnis .</div>
                                        <div class="rating">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star light"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Comment Box-->
                            <div class="comment-box">
                                <div class="comment">
                                    <div class="author-thumb"><img
                                            src="<?= base_url() ?>assets/home2/images/resource/author-2.jpg" alt="">
                                    </div>
                                    <div class="comment-inner">
                                        <div class="comment-info">David Warner</div>
                                        <div class="post-date">March 10, 2019</div>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli.
                                            Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque
                                            penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec
                                            qam penatibus et magnis .</div>
                                        <div class="rating">
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Comment Form -->
                            <div class="shop-comment-form">
                                <div class="sec-title">
                                    <h1>Add a Review</h1>
                                    <div class="separator"></div>
                                </div>
                                <div class="rating-box">
                                    <div class="text"> Your Rating:</div>
                                    <div class="rating">
                                        <a href="#"><span class="fa fa-star"></span></a>
                                    </div>
                                    <div class="rating">
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                    </div>
                                    <div class="rating">
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                    </div>
                                    <div class="rating">
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                    </div>
                                    <div class="rating">
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                        <a href="#"><span class="fa fa-star"></span></a>
                                    </div>
                                </div>
                                <form method="post"
                                    action="http://ary-themes.com/html/noor_tech/dream-property/contact.html">
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                            <input type="text" name="username" placeholder="Name ..." required>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                            <input type="email" name="email" placeholder="Email ..." required>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                            <textarea name="message" placeholder="Review ..."></textarea>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                            <button class="theme-btn btn-style-two" type="submit"
                                                name="submit-form"><span class="txt">Submit Review</span></button>
                                        </div>

                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--End Product Info Tabs-->

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