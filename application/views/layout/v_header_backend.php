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
    <div class="nav-header" style="background-color: blue;">
        <div class="brand-logo">
            <a href="<?php base_url('admin') ?>">
                <b class="logo-abbr"><img src="<?= base_url() ?>assets/admin_template/images/20231025_140012.png" alt=""></b>
                <span class="logo-compact">
                    <img src="<?= base_url() ?>assets/admin_template/images/20231025_140541.png" alt=""></span>
                <span class="brand-title">
                    <img src="<?= base_url() ?>assets/home2/images/nav-orb.png" style="width: 80%; margin-top: -20px;" alt="">
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
                    <!-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                               <i class="mdi mdi-email-outline" style="font-size:18px;"></i>
                               <span class="badge badge-pill gradient-1">3</span>
                           </a> -->
                    <div class="drop-down animated fadeIn dropdown-menu">
                        <!-- <div class="dropdown-content-heading d-flex justify-content-between">
                                   <span class="">3 New Messages</span>
                                   <a href="javascript:void()" class="d-inline-block">
                                       <span class="badge badge-pill gradient-1">3</span>
                                   </a>
                               </div> -->
                        <!-- <div class="dropdown-content-body">
                                   <ul>
                                       <li class="notification-unread">
                                           <a href="javascript:void()">
                                               <img class="float-left mr-3 avatar-img"
                                                   src="<?php base_url() ?>assets/admin_template/images/avatar/1.jpg"
                                                   alt="">
                                               <div class="notification-content">
                                                   <div class="notification-heading">Saiful Islam</div>
                                                   <div class="notification-timestamp">08 Hours ago</div>
                                                   <div class="notification-text">Hi Teddy, Just wanted to let you ...
                                                   </div>
                                               </div>
                                           </a>
                                       </li>
                                       <li class="notification-unread">
                                           <a href="javascript:void()">
                                               <img class="float-left mr-3 avatar-img"
                                                   src="<?php base_url() ?>assets/admin_template/images/avatar/2.jpg"
                                                   alt="">
                                               <div class="notification-content">
                                                   <div class="notification-heading">Adam Smith</div>
                                                   <div class="notification-timestamp">08 Hours ago</div>
                                                   <div class="notification-text">Can you do me a favour?</div>
                                               </div>
                                           </a>
                                       </li>
                                       <li>
                                           <a href="javascript:void()">
                                               <img class="float-left mr-3 avatar-img"
                                                   src="<?php base_url() ?>assets/admin_template/images/avatar/3.jpg"
                                                   alt="">
                                               <div class="notification-content">
                                                   <div class="notification-heading">Barak Obama</div>
                                                   <div class="notification-timestamp">08 Hours ago</div>
                                                   <div class="notification-text">Hi Teddy, Just wanted to let you ...
                                                   </div>
                                               </div>
                                           </a>
                                       </li>
                                       <li>
                                           <a href="javascript:void()">
                                               <img class="float-left mr-3 avatar-img"
                                                   src="<?php base_url() ?>assets/admin_template/images/avatar/4.jpg"
                                                   alt="">
                                               <div class="notification-content">
                                                   <div class="notification-heading">Hilari Clinton</div>
                                                   <div class="notification-timestamp">08 Hours ago</div>
                                                   <div class="notification-text">Hello</div>
                                               </div>
                                           </a>
                                       </li>
                                   </ul>

                               </div> -->
                    </div>
                    </li>
                   
                        
                    <li class="icons dropdown">
    <a href="javascript:void(0)" data-toggle="dropdown">
        <i class="fa fa-user"></i>
    </a>
    <div class="drop-down animated fadeIn dropdown-menu">
        <div class="dropdown-content-heading d-flex justify-content-between">
            <a href="javascript:void()" class="d-inline-block">
            </a>
        </div>
        <div class="dropdown-content-body">
            <ul>
                <li class="notification-unread">
                    <a href="javascript:void()">
                        <!-- Tampilkan gambar profil di sini -->
                        <div class="notification-content">
                            <div class="notification-heading"><?= $this->session->userdata('nama_user'); ?></div>
                            <div class="notification-timestamp">
                                <?php 
                                    $level_user = 1;
                                    if ($level_user == 1) {
                                        echo "Admin";
                                    } else if ($level_user == 2) {
                                        echo "Karyawan";
                                    } else {
                                        echo "Level user tidak valid";
                                    }
                                ?>    
                            </div>
                        </div>
                    </a>
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
                            class="nav-text">Kasir</span>
                    </a>
                </li>
                <?php if ($this->session->userdata('level_user') == '1'): ?>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                         <i class="fa fa-user menu-icon" style="font-size: 20px;"></i></i><span class="nav-text">Akun</span>
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
                         <i class="fa fa-bars menu-icon" style="font-size: 20px;"></i></i><span class="nav-text">Menu</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?= base_url('produk') ?>"><i class="fa fa-birthday-cake"></i> Produk</a></li>
                        <li><a href="<?= base_url('kategori') ?>"><i class="fa fa-list"></i> Kategori</a></li>
                        <li><a href="<?= base_url('stok') ?>"><i class="fa fa-cubes"></i> Stok</a></li>
                    </ul>
                </li>
                <?php if ($this->session->userdata('level_user') == '1'): ?>
                <li>
                    <a href="<?= base_url('admin/pesanan_masuk') ?>" <?php if($this->uri->segment(1)=='admin/pesanan_masuk'){echo
                        "active";} ?>>
                        <i class="fa fa-shopping-bag menu-icon" style="font-size:18px;" style="font-size:18px;"></i><span
                            class="nav-text">Pesanan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('laporan') ?>" <?php if($this->uri->segment(1)=='laporan'){echo
                        "active";} ?>>
                        <i class="fa fa-bar-chart menu-icon" style="font-size:18px;" style="font-size:18px;"></i><span
                            class="nav-text">Laporan</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if ($this->session->userdata('level_user') == '1'): ?>
                <!-- <li class="nav-label">Settings</li> -->

                <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-cog menu-icon" style="font-size: 22px;"></i></i><span class="nav-text">Setting</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= base_url('setting') ?>"><i class="fa fa-map"></i> Lokasi Toko</a></li>
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