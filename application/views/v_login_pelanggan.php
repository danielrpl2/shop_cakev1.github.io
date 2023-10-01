<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php base_url () ?>../assets/login_template/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php base_url () ?>../assets/login_template/img/favicon.png">
  <title>
    <?= $title ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?php base_url () ?>../assets/login_template/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?php base_url () ?>../assets/login_template/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?php base_url () ?>../assets/login_template/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?php base_url () ?>../assets/login_template/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="<?= base_url ('home') ?>">
              Argon Dashboard 2
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="<?= base_url ('home') ?>">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="<?php base_url ('pelanggan/register') ?>">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Register
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="<?php base_url ('pelanggan/register') ?>">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Login
                  </a>
                </li>
              </ul>
              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/product/argon-dashboard" class="btn btn-sm mb-0 me-1 btn-primary">Free Download</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-1 text-start">
                  <h4 class="font-weight-bolder">Login Pelanggan</h4>
                </div>
                <div class="card-body">
                 <?php 
                   echo validation_errors('<div class="alert alert-warning alert-dismissible">                   
                   <h5><i class="icon fas fa-exclamation-triangle"></i> Nontifications!</h5>', '</div>');

                   if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">    
                    <h5><i class="icon fas fa-check"></i>Succes!!</h5>';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                   }

                   if ($this->session->flashdata('error')) {
                    echo '<div class="alert alert-danger alert-dismissible"> 
                    <h5><i class="icon fas fa-times"></i>Error!!</h5>';
                    echo $this->session->flashdata('error');
                    echo '</div>';
                   }
                   echo form_open('pelanggan/login'); ?>
                    <div class="mb-3">
                      <input type="email" name="email" value="<?= set_value('email') ?>"  class="form-control form-control-lg" placeholder="Your Email.." aria-label="Your Email..">
                    </div>
                    <div class="mb-3">
                      <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control form-control-lg" placeholder="Your Password.." aria-label="Your Password..">
                    </div>
                    <div class="mb-3">
                      <div class="g-recaptcha" data-sitekey="6LcuRkAoAAAAAEBnTxSv51E7CglSn40vSXMS-dAN"></div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Login</button>
                    </div>
                  <?php echo form_close(); ?>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                  Don`t have an account?
                    <a href="<?= base_url('pelanggan/register') ?>" class="text-primary text-gradient font-weight-bold">Register</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <style>
    /* Gaya untuk kontainer reCAPTCHA */
    .g-recaptcha {
      display: inline-block;
      background-color: #f8f9fa; /* Warna latar belakang */
      padding: 10px; /* Ruang di sekitar reCAPTCHA */
      border-radius: 10px; /* Sudut elemen */
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2); /* Efek bayangan */
    }

    /* Gaya untuk teks "I'm not a robot" di dalam reCAPTCHA */
    .g-recaptcha label {
      font-size: 18px; /* Ukuran teks */
      font-weight: bold; /* Ketebalan teks */
      color: #333; /* Warna teks */
    }

    /* Gaya untuk tombol reCAPTCHA */
    .g-recaptcha .rc-anchor-normal {
      background-color: #007bff; /* Warna tombol */
      border: none; /* Tidak ada batas tombol */
      border-radius: 5px; /* Sudut tombol */
      cursor: pointer; /* Kursor saat digunakan */
    }

    /* Gaya untuk teks di tombol reCAPTCHA */
    .g-recaptcha .rc-anchor-content {
      color: #fff; /* Warna teks di tombol */
      font-size: 18px; /* Ukuran teks di tombol */
    }

    /* Gaya untuk kotak centang */
    .g-recaptcha .rc-anchor-checkbox {
      margin-right: 15px; /* Jarak dari teks "I'm not a robot" */
    }
  </style>
  <!--   Core JS Files   -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="<?php base_url () ?>../assets/login_template/js/core/popper.min.js"></script>
  <script src="<?php base_url () ?>../assets/login_template/js/core/bootstrap.min.js"></script>
  <script src="<?php base_url () ?>../assets/login_template/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?php base_url () ?>../assets/login_template/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // Fungsi untuk menghilangkan pesan alert secara otomatis setelah beberapa detik
    function hideAlerts() {
        $('.alert').fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }

    // Jalankan fungsi hideAlerts setelah dokumen selesai dimuat
    $(document).ready(function () {
        setTimeout(hideAlerts, 3000); // Menghilangkan pesan setelah 3 detik (3000 milidetik)
    });
</script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php base_url () ?>../assets/login_template/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>