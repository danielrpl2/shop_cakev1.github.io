<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/home2/images/icon.png">
  <link rel="icon" type="image/png" href="<?= base_url() ?>assets/home2/images/icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>
    <?= $title ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

  <div class="container">
    <div class="form login">
      <h2>Login</h2>
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
      <div class="inputBox">
        <input type="email" name="email" value="<?= set_value('email') ?>" required>
        <i class="fa-regular fa-user"></i>
        <span>email</span>
      </div>
      <div class="inputBox">
        <input type="password" name="password" value="<?= set_value('password') ?>" required>
        <i class="fa-solid fa-lock"></i>
        <span>password</span>
      </div>
      <div class="mb-3">
        <div class="g-recaptcha" data-sitekey="6LcuRkAoAAAAAEBnTxSv51E7CglSn40vSXMS-dAN"></div>
      </div>
      <div class="inputBox">
        <input type="submit" value="Login">
      </div>
      <div class="go-home-register">
        <a href="<?= base_url('pelanggan/register') ?>" class="register-link">Belum Punya Akun? Register</a>
        <a href="<?= base_url() ?>" class="go-home-link">Halaman Utama</a>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>


  <script>
    // Hapus notifikasi otomatis setelah 3 detik
    setTimeout(function () {
      var notifications = document.querySelectorAll('.alert-dismissible');
      notifications.forEach(function (notification) {
        notification.style.display = 'none';
      });
    }, 3000);
  </script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: #223243;

    }

    .container {

      padding: 40px;
      border: 8px solid #223243;
      border-radius: 20px;
      box-shadow: -5px -5px 15px rgba(225, 225, 225, 0.1),
        5px 5px 15px rgba(0, 0, 0, 0.35),
        inset -5px -5px 15px rgba(225, 225, 225, 0.1),
        inset 5px 5px 15px rgba(0, 0, 0, 0.35);
    }

    .container .form .go-home-register {
      display: flex;
      justify-content: space-between;
      margin-top: 15px;
    }

    .container .form .register-link,
    .container .form .go-home-link {
      text-decoration: none;
      font-size: 0.8em;
      color: #fff;
    }

    /* Responsif - Ubah tampilan tautan pada layar kecil */
    @media (max-width: 480px) {
      .container .form .go-home-register {
        flex-direction: column;
        text-align: center;
      }
    }

    .container .form .alert {
      background: #00dfc4;
      color: #223243;
      padding: 10px;
      font-weight: 500;
      border-radius: 10px;
      margin-bottom: 15px;
      /* Menambahkan jarak antara notifikasi */
      box-shadow: -5px -5px 15px rgba(225, 225, 225, 0.1),
        5px 5px 15px rgba(0, 0, 0, 0.35);
    }

    .container .form .alert i {
      color: #223243;
      border-right: 1px solid #223243;
    }

    .container .form {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      gap: 25px;
    }

    /* .container .form.login {
    display: none;
} */

    .container .form h2 {
      color: #fff;
      font-weight: 500;
      letter-spacing: 0.1em;
    }

    .container .form .inputBox {
      position: relative;
      width: 300px;
      margin-bottom: 15px;
    }

    .container .form .g-recaptcha {
      margin-bottom: 15px;
      /* Menambahkan jarak bawah antara reCAPTCHA dan elemen berikutnya */
    }

    .container .form .inputBox input {
      padding: 12px 10px 12px 48px;
      border: none;
      width: 100%;
      background: #223243;
      border: 1px solid rgba(0, 0, 0, 0.1);
      color: #fff;
      font-weight: 300;
      border-radius: 25px;
      font-size: 1em;
      box-shadow: -5px -5px 15px rgba(225, 225, 225, 0.1),
        5px 5px 15px rgba(0, 0, 0, 0.35);
      transition: 0.5s;
      outline: none;
    }

    .container .form .inputBox span {
      position: absolute;
      left: 0;
      padding: 12px 10px 12px 48px;
      pointer-events: none;
      font-size: 1em;
      font-weight: 300;
      transition: 0.5s;
      letter-spacing: 0.05em;
      color: rgba(225, 225, 225, 0.5);
    }

    .container .form .inputBox input:valid~span,
    .container .form .inputBox input:focus~span {
      color: #00dfc4;
      border: 1px solid #00dfc4;
      background: #223243;
      transform: translateX(25px) translateY(-7px);
      font-size: 0.6em;
      padding: 0 8px;
      border-radius: 10px;
      letter-spacing: 0.1em;
    }

    .container .form .inputBox input:valid,
    .container .form .inputBox input:focus {
      border: 1px solid #00dfc4;

    }

    .container .form .inputBox i {
      position: absolute;
      top: 15px;
      left: 16px;
      width: 25px;
      padding: 2px 0;
      padding-right: 8px;
      color: #00dfc4;
      border-right: 1px solid #00dfc4;
    }

    .container .form .inputBox input[type="submit"] {
      background: #00dfc4;
      color: #223243;
      padding: 10px 0;
      font-weight: 500;
      cursor: pointer;
      box-shadow: -5px -5px 15px rgba(225, 225, 225, 0.1),
        5px 5px 15px rgba(0, 0, 0, 0.35),
        inset -5px -5px 15px rgba(225, 225, 225, 0.1),
        inset 5px 5px 15px rgba(0, 0, 0, 0.35);
    }

    .container .form p {
      color: rgba(225, 225, 225, 0.5);
      font-size: 0.7em;
      font-weight: 300;
    }

    .container .form p a {
      font-weight: 500;
      color: #fff;
      text-decoration: none;
    }
  </style>
</body>

</html>