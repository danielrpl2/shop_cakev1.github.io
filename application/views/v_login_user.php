<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Login Admin
    </title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/home2/images/icon.png" style="width: 900px;" type="image/x-icon">
    <link rel="icon" href="<?= base_url() ?>assets/home2/images/favicon2.png" style="width: 900px;" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="wrapper">
        <span class="bg-animate"></span>
        <div class="form-box login">
            <h2>Login</h2>
            <?php 
                echo validation_errors('<div class="alert alert-warning alert-dismissible">                   
                <h5><i class="icon fas fa-exclamation-triangle"></i> Nontifications!</h5>', '</div>');

                if ($this->session->flashdata('error')) {
                      echo '<div class="alert alert-danger alert-dismissible">
                      <h5><i class="icon fas fa-ban"></i> Nontifications!</h5>';
                      echo $this->session->flashdata('error');
                      echo '</div>';
                }

                if ($this->session->flashdata('pesan')) {
                      echo '<div class="alert alert-success alert-dismissible">
                    
                      <h5><i class="icon fas fa-check"></i>Succes!!</h5>';
                      echo $this->session->flashdata('pesan');
                      echo '</div>';
                }
                echo form_open('auth/login_user') ?>  
                <div class="input-box">
                    <input type="text" name="username" required>
                    <label>Username</label>
                    <i class="bx bxs-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required>
                    <label>Password</label>
                    <i class="bx bxs-lock-alt"></i>
                </div>
                <!-- <div class="mb-3">
                 <div class="g-recaptcha" data-sitekey="6LcuRkAoAAAAAEBnTxSv51E7CglSn40vSXMS-dAN"></div>
                </div> -->
                <button type="submit" class="btn">Login</button>
                <?php echo form_close() ?>
                    <div class="logreg-link">
                        <p>Orabella Bakery <a href="<?= base_url('home') ?>" class="register-link">Home</a></p>
                    </div>
              </div>
        <div class="info-text login">
            <h2>Orabella Bakery</h2>
            <p>Selamat Datang !! Ini Adalah Halaman Login Untuk Admin</p>
        </div>
    </div>


    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
    <script>
      // Hapus notifikasi otomatis setelah 3 detik
      setTimeout(function() {
        var notifications = document.querySelectorAll('.alert-dismissible');
        notifications.forEach(function(notification) {
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
    background: #081b29;
}

.alert {
    background-color: #081b29;
    color: #0ef;
    padding: 10px;
    border: 1px solid #0ef;
    border-radius: 5px;
    margin: 10px 0;
}

.alert h5 {
    margin: 0;
    font-weight: 600;
}

.alert i {
    margin-right: 5px;
}

/* Gaya untuk reCAPTCHA */
.g-recaptcha {
    display: flex;
    justify-content: center;
    margin: 10px 0;
    max-width: 100%; /* Lebar maksimum reCAPTCHA mengikuti lebar form */
    width: 100%; /* Mengisi seluruh lebar form */
}

/* Lebar maksimum form */
@media screen and (max-width: 768px) {
  .wrapper {
        max-width: 100%;
        height: auto;
    }

    .wrapper .form-box {
        width: 100%;
        left: 0;
    }

    .wrapper .info-text {
        display: none;
    }

    /* Responsif reCAPTCHA */
    .g-recaptcha {
      display: flex;
    justify-content: center;
    margin: 10px 0;
    max-width: 100%; /* Lebar maksimum reCAPTCHA mengikuti lebar form */
    width: 100%; /* Mengisi seluruh lebar form */    }
}

.wrapper {
    position: relative;
    width: 100%; /* Adjust to 100% for full-width responsiveness */
    max-width: 750px; /* Set a max-width for better readability */
    height: 450px;
    border-radius: 20px;
    background: transparent;
    border: 2px solid #0ef;
    overflow: hidden;
    box-shadow: 0 0 25px #0ef;
}

.wrapper .form-box {
    position: relative;
    top: 0;
    width: 50%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.wrapper .form-box.login {
    left: -1000;
    padding: 0 60px 0 40px;
}

.form-box h2 {
    font-size: 32px;
    color: white;
    text-align: center;
}

.form-box .input-box {
    position: relative;
    width: 100%;
    height: 50px;
    margin: 25px 0;
}

.input-box input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border-bottom: 2px solid #fff;
    padding-right: 23px;
    font-size: 16px;
    color: #fff;
    font-weight: 500;
    transition: .5s;
}

.input-box input:focus,
.input-box input:valid{
    border-bottom-color: #0ef;
}

.input-box label{
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    font-size: 16px;
    color: #fff;
    pointer-events: none;
    transition: .5s;
}

.input-box input:focus~label,
.input-box input:valid~label{
    top: -5px;
    color: #0ef;
}

.input-box i {
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    font-size: 18px;
    color: #fff;
    transition: .5s;
}

.input-box input:focus~i,
.input-box input:valid~i{
   color: #0ef;
}

.btn {
    position: relative;
    width: 100%;
    height: 45px;
    background: transparent;
    border: 2px solid #0ef;
    outline: none;
    border-radius: 40px;
    cursor: pointer;
    font-size: 16px;
    color: #fff;
    font-weight: 600;
    z-index: 1;
    overflow: hidden;
}

.btn::before {
    content: '';
    position: absolute;
    top: -100%;
    left: 0;
    width: 100%;
    height: 300%;
    background: linear-gradient(#081b29, #0ef, #081b29, #0ef);
    z-index: -1;
    transition: .5s;
}

.btn:hover::before {
    top: 0;
}

.form-box .logreg-link {
    font-size: 14.5px;
    color: #fff;
    text-align: center;
    margin: 20px 0 10px;
}

.logreg-link p a {
    color: #0ef;
    text-decoration: none;
    font-weight: 600;
}

.logreg-link p a:hover {
    text-decoration: underline;

}

.wrapper .info-text {
    position: absolute;
    top: 0;
    width: 50%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.wrapper .info-text.login {
    right: 0;
    text-align: right;
    padding: 0 40px 60px 150px;
}

.info-text h2 {
    font-size: 36px;
    color: #fff;
    line-height: 1.3;
    text-transform: uppercase; 
}

.info-text p {
    color: #fff;
    font-size: 16px;
}

.bg-animate {
    position: absolute;
    top: -4px;
    right: 0;
    width: 850px;
    height: 600px;
    background: linear-gradient(45deg,#081b29, #0ef);
    transform: rotate(10deg) skewY(40deg);
    transform-origin: bottom right;
    border-bottom: 3px solid #0ef;
}

/* Aturan CSS asal Anda */

@media screen and (max-width: 768px) {
    .wrapper {
      max-width: 100%;
      height: auto;
    }
  
    .wrapper .form-box {
      width: 100%;
      left: 0;
    }
  
    .wrapper .info-text {
      display: none;
    }
  }

  
    </style>
    
</body>
</html>