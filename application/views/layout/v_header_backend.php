<!--*******************
        Preloader start
    ********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
    </div>
</div>
<!--*******************
        Preloader end
    ********************-->


<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header" style="background-color: #000080;">
        <div class="brand-logo">
            <a href="<?php base_url('admin') ?>">
                <b class="logo-abbr"><img src="<?= base_url() ?>assets/admin_template/images/20231025_140012.png"
                        alt=""></b>
                <span class="logo-compact">
                    <img src="<?= base_url() ?>assets/admin_template/images/20231025_140541.png" alt=""></span>
                <span class="brand-title">
                    <img src="<?= base_url() ?>assets/home2/images/nav-orb.png" style="width: 70%; margin-top: -20px;"
                        alt="">
                </span>
            </a>
        </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Header start
        ***********************************-->
    <div class="header">
        <div class="header-content clearfix">

            <div class="nav-control">
                <div class="hamburger">
                    <span class="toggle-icon"><i class="icon-menu" style="font-size:18px;"></i></span>
                </div>
            </div>
            <div class="header-left">
                <div class="input-group icons">
                    <div class="input-group-prepend">

                    </div>

                    <div class="drop-down animated flipInX d-md-none">
                        <form action="#">
                            <input type="text" class="form-control" placeholder="Search">
                        </form>
                    </div>
                </div>
            </div>
            <div class="header-right">
                <ul class="clearfix">
                    <div class="drop-down animated fadeIn dropdown-menu"></div>
                    </li>
                    
                    <li class="icons dropdown">
                        <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                            <span class="activity active"></span>
                            <?php if ($this->session->userdata('profile_image')) : ?>
                            <img src="<?= base_url('assets/profileimg/' . $this->session->userdata('profile_image')) ?>"
                                height="40" width="40" style="object-fit: cover;" alt="">
                            <?php endif;?>
                        </div>
                        <div class="drop-down dropdown-profile   dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="<?= base_url('profile') ?>"><i class="icon-user"></i>
                                            <span>Profile</span></a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('auth/logout_user') ?>"><i class="icon-key"></i>
                                            <span>Logout</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    <div class="nk-sidebar">
        <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
                <br>
                <!-- <li class="nav-label">Dashboard</li> -->
                <li>
                    <a href="<?= base_url('admin') ?>" aria-expanded="false">
                        <i class="fa fa-tachometer menu-icon" style="font-size:18px;" style="font-size:18px;"></i><span
                            class="nav-text">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('penjualan') ?>" aria-expanded="false">
                        <i class="fa fa-shopping-cart menu-icon" style="font-size:18px;" style="font-size:18px;"></i><span
                            class="nav-text">Transaksi Kasir</span>
                    </a>
                </li>

                <?php if ($this->session->userdata('level_user') == '1'): ?>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-user menu-icon" style="font-size: 20px;"></i></i><span
                            class="nav-text">Akun</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?= base_url('user') ?>"><i class="fa fa-user-secret"></i> Admin/Karyawan</a></li>
                        <li><a href="<?= base_url('pelanggan') ?>"><i class="fa fa-users"></i> Pelanggan</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <!-- <li class="nav-label">Menu</li> -->
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-indent menu-icon" style="font-size: 19px;"></i></i><span
                            class="nav-text">Menu</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?= base_url('produk') ?>"><i class="fa fa-birthday-cake"></i> Produk</a></li>
                        <li><a href="<?= base_url('kategori') ?>"><i class="fa fa-list"></i> Kategori</a></li>
                          <li>
                             <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                               <i class="fa fa-cubes menu-icon" style="font-size: 19px;"></i></i><span class="nav-text">Stok</span>
                             </a>
                             <ul aria-expanded="false">
                                 <li><a href="<?= base_url('stok') ?>"><i class="fa fa-chevron-circle-right"></i> Stok Masuk</a></li>

                                 <?php if ($this->session->userdata('level_user') == '1'): ?>
                                 <li><a href="<?= base_url('stok/stok_keluar') ?>"><i class="fa fa-chevron-circle-left"></i> Stok Keluar</a></li>
                                 <?php endif; ?>
                                 
                                 <li><a href="<?= base_url('stok/tambah_stok') ?>"><i class="fa fa-plus-circle"></i> Tambah Stok</a></li>
                             </ul>
                        </li>
                    </ul>
                </li>
                
                <?php if ($this->session->userdata('level_user') == '1'): ?>
                <li>
                    <a href="<?= base_url('admin/pesanan_masuk') ?>" <?php
                        if($this->uri->segment(1)=='admin/pesanan_masuk'){echo
                        "active";} ?>>
                        <i class="fa fa-shopping-bag menu-icon" style="font-size:18px;"
                            style="font-size:18px;"></i><span class="nav-text">Pesanan</span>
                    </a>
                </li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-bar-chart menu-icon" style="font-size: 22px;"></i></i><span
                            class="nav-text">Laporan</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?= base_url('laporan/laporan_stok') ?>"><i class="fa fa-cubes"></i>Laporan Stok</a></li>
                        <li><a href="<?= base_url('laporan') ?>"><i class="fa fa-shopping-cart"></i>Penjualan Online</a></li>
                        <li><a href="<?= base_url('penjualan/riwayat_penjualan') ?>"><i class="fa fa-history"></i> Riwayat Penjualan Kasir</a></li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if ($this->session->userdata('level_user') == '1'): ?>
                <!-- <li class="nav-label">Settings</li> -->

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-cog menu-icon" style="font-size: 22px;"></i></i><span
                            class="nav-text">Setting</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?= base_url('admin/rekening') ?>"><i class="fa fa-university"></i> Rekening</a></li>
                        <li><a href="<?= base_url('setting') ?>"><i class="fa fa-map-marker"></i> Lokasi Toko</a></li>
                        <li><a href="<?= base_url('blog') ?>"><i class="fa fa-book"></i> Blog</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <li>
                    <a href="<?= base_url('auth/logout_user') ?>" aria-expanded="false">
                        <i class="fa fa-sign-out menu-icon" style="font-size: 22px;"></i><span
                            class="nav-text">Logout</span>
                    </a>
                </li>
                </li>
            </ul>
        </div>
    </div>
    <!--**********************************
            Sidebar end
        ***********************************-->


    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">
                            <?= $title ?>
                        </a></li>
                </ol>
            </div>
        </div>
        <!-- row -->