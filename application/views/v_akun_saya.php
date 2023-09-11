<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Saya - Shopee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Shopee</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pesanan Saya</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Akun Saya
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Profil Saya</a>
                        <a class="dropdown-item" href="#">Ubah Kata Sandi</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Header -->
    <header class="container-fluid bg-primary text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Selamat Datang, John Doe</h1>
                    <p>Terima kasih telah berbelanja di Shopee!</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Konten Akun -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <!-- Menu Akun -->
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Profil Saya
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Pesanan Saya</a>
                    <a href="#" class="list-group-item list-group-item-action">Wishlist</a>
                    <a href="#" class="list-group-item list-group-item-action">Alamat Pengiriman</a>
                    <a href="#" class="list-group-item list-group-item-action">Ubah Kata Sandi</a>
                    <a href="#" class="list-group-item list-group-item-action">Logout</a>
                </div>
            </div>
            <div class="col-md-8">
                <!-- Informasi Profil -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h2>Profil Saya</h2>
                        <div class="d-flex align-items-center">
                            <img src="path_ke_foto_profil.jpg" alt="Foto Profil" class="profile-image mr-3">
                            <div>
                                <h4>John Doe</h4>
                                <p>john@example.com</p>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary mt-3">Ubah Profil</a>
                    </div>
                </div>

                <!-- Daftar Pesanan -->
                <div class="card">
                    <div class="card-body">
                        <h2>Pesanan Saya</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No Pesanan</th>
                                    <th>Tanggal Pesanan</th>
                                    <th>Total Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>123456</td>
                                    <td>12 September 2023</td>
                                    <td>$100.00</td>
                                    <td>Dalam Pengiriman</td>
                                </tr>
                                <tr>
                                    <td>789012</td>
                                    <td>10 September 2023</td>
                                    <td>$50.00</td>
                                    <td>Selesai</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS (Popper.js and jQuery are required) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
