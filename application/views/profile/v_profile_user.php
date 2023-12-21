
<div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-4">
                                <?php if ($this->session->userdata('profile_image')) : ?>
                                    <img class="mr-3" src="<?= base_url('assets/profileimg/' . $this->session->userdata('profile_image')) ?>" style="height: 15vh; width: 45%; border-radius: 10px; object-fit: cover;" alt="">
                                    <?php endif;?>  
                                    <div class="media-body">
                                        <h3 class="mb-0"><?= $this->session->userdata('nama_user'); ?></h3>
                                    </div>
                                </div>
                                
                                <div class="row mb-5">
                                <div class="col" id="userProfile">
                                    <div class="card card-profile text-center">
                                        <span class="mb-1 text-primary" id="userIcon"></span>
                                        <h3 class="mb-0">
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
                                        </h3>
                                        <!-- <p class="text-muted px-4">Following</p> -->
                                    </div>
                                </div>

                                <script>
                                    // Ambil elemen ikon
                                    var userIcon = document.getElementById('userIcon');

                                    // Tentukan level pengguna
                                    var level_user = 1; // Ganti dengan nilai level pengguna yang sesuai

                                    // Atur ikon berdasarkan level pengguna
                                    if (level_user === 1) {
                                        userIcon.innerHTML = '<i class="fa fa-user-secret" aria-hidden="true"></i>';
                                    } else {
                                        userIcon.innerHTML = '<i class="icon-user"></i>';
                                    }
                                </script>

                                    <div class="col">
                                        <div class="card card-profile text-center">
                                            <span class="mb-1 text-warning"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                            <h3 class="mb-0"><?php echo isset($total_sales_count) ? $total_sales_count : '0'; ?></h3>
                                            <!-- <p class="text-muted">Followers</p> -->
                                        </div>
                                    </div>
                                </div>

                                <ul class="card-profile__info">
                                    <li class="mb-1"><strong class="text-dark mr-4">No Tlp  : </strong> <span><?= $profile->no_tlp ?></span></li>
                                    <li><strong class="text-dark mr-4">Email : </strong> <span><?= $profile->email ?></span></li>
                                </ul>
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <div class="card">
                            <div class="card-body">
                            <div class="col-lg-12 col-sm-12">
                        <div class="card gradient-7">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pendapatan</h3>
                                <div class="d-inline-block">
                                <?php if (isset($total_revenue) && $total_revenue > 0): ?>
                <h2 class="text-white">Rp. <?php echo number_format($total_revenue); ?></h2>
            <?php else: ?>
                <h2 class="text-white">Rp. 0</h2>
            <?php endif; ?>
                                    <p class="text-white mb-0"><?php echo date("d - F Y"); ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-money" style="font-size: 100px;"></i></span>
                            </div>
                        </div>
                    </div>
                            </div>
                        </div>

                        <div class="card">
                        <div class="card-body">
                    <h3 class="card-title" style="text-align: center;">Edit <?= $header ?></h3>
                        <br>
                    <?php echo form_open_multipart('profile'); ?>

                    <div class="row">
                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Nama User</label>
                               <input type="text" name="nama_user" class="form-control" value="<?= $profile->nama_user ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Username</label>
                               <input type="text" name="username" class="form-control" value="<?= $profile->username ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Password</label>
                               <input type="password" name="password" class="form-control" value="<?= $profile->password ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">No Tlp</label>
                               <input type="number" name="no_tlp" class="form-control" value="<?= $profile->no_tlp ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Email</label>
                               <input type="email" name="email" class="form-control" value="<?= $profile->email ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="color: black; font-weight: 1000;">Foto</label>
                                <input type="file" name="gambar" class="form-control" id="preview_gambar">
                            </div>
                        </div>
                        <?php
$profile_image = $this->session->userdata('profile_image');
$image_path = base_url('assets/profileimg/' . $profile_image);
?>
                        <div class="col-sm-6">
    <div class="form-group">
        <img src="<?php echo $image_path; ?>" id="gambar_load" style="width: 60%; border-radius:10px;">
    </div>
</div>

                       
                    </div>
                    <div class="form-group">
                            <a href="<?= base_url('admin') ?>" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Kembali</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Simpan</button>
                        </div>

                    <?php echo form_close() ?>

                </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
<?php if ($this->session->flashdata('swal') === 'success'): ?>
    Swal.fire({
        title: 'Success',
        text: '<?= $this->session->flashdata("pesan") ?>',
        icon: 'success',
        confirmButtonText: 'OK'
    });
<?php elseif ($this->session->flashdata('swal') === 'error'): ?>
    Swal.fire({
        title: 'Error',
        text: '<?= $this->session->flashdata("pesan") ?>',
        icon: 'error',
        confirmButtonText: 'OK'
    });
<?php endif; ?>
</script>
<script>
    // Handle preview of selected image
    document.getElementById('preview_gambar').addEventListener('change', function () {
        var input = this;
        var image = document.getElementById('gambar_load');
        var reader = new FileReader();

        reader.onload = function (e) {
            image.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    });
</script>