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
    <div class="nav-header">
        <div class="brand-logo">
            <a href="<?php base_url('admin') ?>">
                <b class="logo-abbr"><img src="<?= base_url() ?>assets/admin_template/images/logo.png" alt=""></b>
                <span class="logo-compact">
                    <img src="<?= base_url() ?>assets/admin_template/images/logo-compact.png" alt=""></span>
                <span class="brand-title">
                    <img src="<?= base_url() ?>assets/admin_template/images/logo-text.png" alt="">
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
                        <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                                class="mdi mdi-magnify" style="font-size:18px;"></i></span>
                    </div>
                    <input type="search" class="form-control" placeholder="Search Dashboard"
                        aria-label="Search Dashboard">
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
                        <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                            <span class="activity active"></span>
                            <img src="<?php echo base_url('assets/profileimg/' . $this->session->userdata('profile_image')); ?>"
                                height="40" width="40" alt="Foto Profil">
                        </div>
                        <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="app-profile.html"><i class="icon-user" style="font-size:18px;"></i>
                                            <span>
                                                <?= $this->session->userdata('nama_user') ?>
                                            </span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void()">
                                            <i class="icon-envelope-open" style="font-size:18px;"></i> <span>Kotak
                                                Masuk</span>
                                            <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                        </a>
                                    </li>
                                    <hr class="my-2">
                                    <li>
                                        <a href="page-lock.html"><i class="icon-lock" style="font-size:18px;"></i>
                                            <span>Kunci Layar</span></a>
                                    </li>
                                    <li><a href="<?= base_url('auth/logout_user') ?>"><i class="icon-key"
                                                style="font-size:18px;"></i> <span>Logout</span></a></li>
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
                <li class="nav-label">Dashboard</li>
                <li>
                    <a href="<?= base_url('admin') ?>" aria-expanded="false">
                        <i class="fa fa-tachometer menu-icon" style="font-size:18px;" style="font-size:18px;"></i><span
                            class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('user') ?>" <?php if($this->uri->segment(1)=='user'){echo "active";} ?>>
                        <i class="fa fa-user menu-icon" style="font-size: 22px;"></i><span class="nav-text">User</span>
                    </a>
                </li>
                <li class="nav-label">Menu</li>
                <li>
                    <a href="<?= base_url('produk') ?>" <?php if($this->uri->segment(1)=='produk'){echo "active";} ?>>
                        <i class="fa fa-birthday-cake menu-icon" style="font-size:18px;"
                            style="font-size:18px;"></i><span class="nav-text">Produk</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('kategori') ?>" <?php if($this->uri->segment(1)=='kategori'){echo "active";}
                        ?>>
                        <i class="fa fa-th-list menu-icon" style="font-size:18px;" style="font-size:18px;"></i><span
                            class="nav-text">Kategori</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('gambarproduk') ?>" <?php if($this->uri->segment(1)=='gambarproduk'){echo
                        "active";} ?>>
                        <i class="fa fa-picture-o menu-icon" style="font-size:18px;" style="font-size:18px;"></i><span
                            class="nav-text">Gambar Produk</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/pesanan_masuk') ?>" <?php if($this->uri->segment(1)=='admin/pesanan_masuk'){echo
                        "active";} ?>>
                        <i class="fa fa-shopping-bag menu-icon" style="font-size:18px;" style="font-size:18px;"></i><span
                            class="nav-text">Pesanan Masuk</span>
                    </a>
                </li>
                <!-- <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-shopping-cart menu-icon" style="font-size:18px;"></i> <span
                            class="nav-text">Transaksi</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="./email-inbox.html">Inbox</a></li>
                        <li><a href="./email-read.html">Read</a></li>
                        <li><a href="./email-compose.html">Compose</a></li>
                    </ul>
                </li> -->
                <li>
                    <a href="<?= base_url('laporan') ?>" <?php if($this->uri->segment(1)=='laporan'){echo
                        "active";} ?>>
                        <i class="fa fa-bar-chart menu-icon" style="font-size:18px;" style="font-size:18px;"></i><span
                            class="nav-text">Laporan</span>
                    </a>
                </li>
                <!-- <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-bar-chart menu-icon" style="font-size:18px;"></i><span
                            class="nav-text">Laporan</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?= base_url('laporan') ?>"><i class="fa fa-calendar"></i> Laporan Harian</a></li>
                        <li><a href="#"><i class="fa fa-calendar-o"></i> Laporan Bulanan</a></li>
                        <li><a href="#"><i class="fa fa-calendar-check-o"></i> Laporan Tahunan</a></li>
                    </ul>
                </li> -->
                <li class="nav-label">Settings</li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-cog menu-icon" style="font-size: 22px;"></i><span
                            class="nav-text">Settings</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?= base_url('admin/setting') ?>"><i class="fa fa-map"></i> Lokasi</a></li>
                    </ul>

                <li>
                    <a href="<?= base_url('auth/login_user') ?>" aria-expanded="false">
                        <i class="fa fa-sign-in menu-icon" style="font-size: 22px;"></i><span
                            class="nav-text">Login</span>
                    </a>
                </li>
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