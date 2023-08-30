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
                   <b class="logo-abbr"><img src="<?php base_url() ?>assets/admin_template/images/logo.png" alt=""></b>
                   <span class="logo-compact">
                       <img src="<?php base_url() ?>assets/admin_template/images/logo-compact.png" alt=""></span>
                   <span class="brand-title">
                       <img src="<?php base_url() ?>assets/admin_template/images/logo-text.png" alt="">
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
                       <span class="toggle-icon"><i class="icon-menu"></i></span>
                   </div>
               </div>
               <div class="header-left">
                   <div class="input-group icons">
                       <div class="input-group-prepend">
                           <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                                   class="mdi mdi-magnify"></i></span>
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
                               <i class="mdi mdi-email-outline"></i>
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
                       <!-- <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                               <i class="mdi mdi-bell-outline"></i>
                               <span class="badge badge-pill gradient-2">3</span>
                           </a>
                           <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                               <div class="dropdown-content-heading d-flex justify-content-between">
                                   <span class="">2 New Notifications</span>
                                   <a href="javascript:void()" class="d-inline-block">
                                       <span class="badge badge-pill gradient-2">5</span>
                                   </a>
                               </div>
                               <div class="dropdown-content-body">
                                   <ul>
                                       <li>
                                           <a href="javascript:void()">
                                               <span class="mr-3 avatar-icon bg-success-lighten-2"><i
                                                       class="icon-present"></i></span>
                                               <div class="notification-content">
                                                   <h6 class="notification-heading">Events near you</h6>
                                                   <span class="notification-text">Within next 5 days</span>
                                               </div>
                                           </a>
                                       </li>
                                       <li>
                                           <a href="javascript:void()">
                                               <span class="mr-3 avatar-icon bg-danger-lighten-2"><i
                                                       class="icon-present"></i></span>
                                               <div class="notification-content">
                                                   <h6 class="notification-heading">Event Started</h6>
                                                   <span class="notification-text">One hour ago</span>
                                               </div>
                                           </a>
                                       </li>
                                       <li>
                                           <a href="javascript:void()">
                                               <span class="mr-3 avatar-icon bg-success-lighten-2"><i
                                                       class="icon-present"></i></span>
                                               <div class="notification-content">
                                                   <h6 class="notification-heading">Event Ended Successfully</h6>
                                                   <span class="notification-text">One hour ago</span>
                                               </div>
                                           </a>
                                       </li>
                                       <li>
                                           <a href="javascript:void()">
                                               <span class="mr-3 avatar-icon bg-danger-lighten-2"><i
                                                       class="icon-present"></i></span>
                                               <div class="notification-content">
                                                   <h6 class="notification-heading">Events to Join</h6>
                                                   <span class="notification-text">After two days</span>
                                               </div>
                                           </a>
                                       </li>
                                   </ul>

                               </div>
                           </div>
                       </li> -->
                       <li class="icons dropdown">
    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
        <span class="activity active"></span>
        <img src="<?= base_url('assets/profile_img/') . $this->session->userdata('profile_image') ?>" height="40" width="40" alt="Foto Profil">
    </div>
    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
        <div class="dropdown-content-body">
            <ul>
                <li>
                    <a href="app-profile.html"><i class="icon-user"></i> <span><?= $this->session->userdata('nama_user') ?></span></a>
                </li>
                <li>
                    <a href="javascript:void()">
                        <i class="icon-envelope-open"></i> <span>Kotak Masuk</span>
                        <div class="badge gradient-3 badge-pill gradient-1">3</div>
                    </a>
                </li>
                <hr class="my-2">
                <li>
                    <a href="page-lock.html"><i class="icon-lock"></i> <span>Kunci Layar</span></a>
                </li>
                <li><a href="<?= base_url('auth/logout_user') ?>"><i class="icon-key"></i> <span>Logout</span></a></li>
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
                           <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                       </a>
                   </li>
                   <li>
                       <a href="<?= base_url('user') ?>" <?php if($this->uri->segment(1)=='user'){echo "active";} ?>>
                           <i class="icon-user menu-icon"></i><span class="nav-text">User</span>
                       </a>
                   </li>
                   <li class="nav-label">Menu</li>
                  
                   <li>
                       <a href="<?= base_url('kategori') ?>" <?php if($this->uri->segment(1)=='kategori'){echo "active";} ?>>
                           <i class="icon-grid menu-icon"></i><span class="nav-text">Kategori</span>
                       </a>
                   </li>
                   <li>
                       <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                           <i class="icon-basket-loaded menu-icon"></i> <span class="nav-text">Transaksi</span>
                       </a>
                       <ul aria-expanded="false">
                           <li><a href="./email-inbox.html">Inbox</a></li>
                           <li><a href="./email-read.html">Read</a></li>
                           <li><a href="./email-compose.html">Compose</a></li>
                       </ul>
                   </li>
                   <li>
                       <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                           <i class="icon-chart menu-icon"></i><span class="nav-text">Laporan</span>
                       </a>
                       <ul aria-expanded="false">
                           <li><a href="./app-profile.html">Laporan Harian</a></li>
                           <li><a href="./app-profile.html">Laporan Bulanan</a></li>
                           <li><a href="./app-profile.html">Laporan Tahunan</a></li>
                       </ul>
                   </li>
                   <!-- <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Charts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./chart-flot.html">Flot</a></li>
                            <li><a href="./chart-morris.html">Morris</a></li>
                            <li><a href="./chart-chartjs.html">Chartjs</a></li>
                            <li><a href="./chart-chartist.html">Chartist</a></li>
                            <li><a href="./chart-sparkline.html">Sparkline</a></li>
                            <li><a href="./chart-peity.html">Peity</a></li>
                        </ul>
                    </li> -->
                   <li class="nav-label">Settings</li>
                   <li>
                       <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                           <i class="icon-settings menu-icon"></i><span class="nav-text">Settings</span>
                       </a>
                       <ul aria-expanded="false">
                           <li><a href="./ui-accordion.html">Accordion</a></li>
                           <li><a href="./ui-alert.html">Alert</a></li>
                           <li><a href="./ui-badge.html">Badge</a></li>
                           <li><a href="./ui-button.html">Button</a></li>
                           <li><a href="./ui-button-group.html">Button Group</a></li>
                           <li><a href="./ui-cards.html">Cards</a></li>
                           <li><a href="./ui-carousel.html">Carousel</a></li>
                           <li><a href="./ui-dropdown.html">Dropdown</a></li>
                           <li><a href="./ui-list-group.html">List Group</a></li>
                           <li><a href="./ui-media-object.html">Media Object</a></li>
                           <li><a href="./ui-modal.html">Modal</a></li>
                           <li><a href="./ui-pagination.html">Pagination</a></li>
                           <li><a href="./ui-popover.html">Popover</a></li>
                           <li><a href="./ui-progressbar.html">Progressbar</a></li>
                           <li><a href="./ui-tab.html">Tab</a></li>
                           <li><a href="./ui-typography.html">Typography</a></li>
                           <!-- </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-layers menu-icon"></i><span class="nav-text">Components</span>
                        </a>
                        <ul aria-expanded="false"> -->
                           <li><a href="./uc-nestedable.html">Nestedable</a></li>
                           <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
                           <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
                           <li><a href="./uc-toastr.html">Toastr</a></li>
                       </ul>
                       <li>
                       <a href="#" aria-expanded="false">
                           <i class="icon-user menu-icon"></i><span class="nav-text">Login</span>
                       </a>
                   </li>
                       <li>
                       <a href="<?= base_url('auth/logout_user') ?>" aria-expanded="false">
                           <i class="icon-logout menu-icon"></i><span class="nav-text">Logout</span>
                       </a>
                   </li>
                   </li>
               </ul>
           </div>
       </div>
       <!--**********************************
            Sidebar end
        ***********************************-->