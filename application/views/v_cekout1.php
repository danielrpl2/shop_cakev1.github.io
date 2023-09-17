<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta tags and title -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Advanced form elements</title>

  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user_login_template/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user_login_template/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user_login_template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user_login_template/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user_login_template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user_login_template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user_login_template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user_login_template/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user_login_template/plugins/bs-stepper/css/bs-stepper.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user_login_template/plugins/dropzone/min/dropzone.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/user_login_template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container"> <!-- Tambahkan container untuk mengatur lebar konten -->
      <a class="navbar-brand" href="#">Nama Situs Anda</a>
      <!-- Tombol burger menu untuk layar kecil -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Daftar navigasi -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto"> <!-- ml-auto untuk menggeser menu ke kanan -->
          <li class="nav-item">
            <a class="nav-link" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Keranjang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="wrapper">


  <!-- Main content -->
  <div class="invoice p-3 mb-3">
    <!-- Title row -->
    <div class="row">
      <div class="col-12">
        <h4>
          <i class="fas fa-globe"></i> AdminLTE, Inc.
          <small class="float-right">Date: 2/10/2014</small>
        </h4>
      </div>
    </div>
    <!-- Info row -->
    <div class="row invoice-info">
      <!-- From -->
      <div class="col-sm-4 invoice-col">
        <strong>From</strong>
        <address>
          <strong>Admin, Inc.</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com
        </address>
      </div>
      <!-- To -->
      <div class="col-sm-4 invoice-col">
        <strong>To</strong>
        <address>
          <strong>John Doe</strong><br>
          795 Folsom Ave, Suite 600<br>
          San Francisco, CA 94107<br>
          Phone: (555) 539-1037<br>
          Email: john.doe@example.com
        </address>
      </div>
      <!-- Invoice Information -->
      <div class="col-sm-4 invoice-col">
        <strong>Invoice #007612</strong><br>
        <strong>Order ID:</strong> 4F3S8J<br>
        <strong>Payment Due:</strong> 2/22/2014<br>
        <strong>Account:</strong> 968-34567
      </div>
    </div>
  </div>

  <!-- Container -->
  <div class="container-fluid">
    <!-- Tabel Produk -->
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Daftar Produk</h3>
      </div>
      <div class="card-body">
        <!-- Tabel -->
        <div class="col-12 table-responsive">
        <table class="table table-striped">
                    <thead>
                    <tr>
                      <th style="text-align: center;">Qty</th>
                      <th style="text-align: center;">Product</th>
                      <th style="text-align: center;">Harga</th>
                      <th style="text-align: center;">Total</th>
                      <th style="text-align: center;">Berat</th>
                    </tr>
                    </thead>
                    <tbody>

                      <?php $i = 1;           
                      $total_berat = 0;
                      foreach ($this->cart->contents() as $items) {
                      $produk = $this->m_home->detail_produk($items['id']);
                      $berat = $items['qty'] * $produk->berat;
                      $total_berat =  $total_berat + $berat; 
                      ?>
                    <tr>
                      <td style="text-align: center;"><?php echo $items['qty'] ?></td>
                      <td style="text-align: center;"><?php echo $items['name']; ?></td>
                      <td style="text-align: center;">Rp. <?php echo number_format($items['price'],0); ?></td>
                      <td style="text-align: center;">Rp. <?php echo number_format($items['subtotal'],0); ?></td>
                      <td style="text-align: center;"><?= $berat ?> Gram.</td>
                    </tr>
                    <?php } ?>

                    </tbody>
                  </table>
        </div>
      </div>
    </div>

    <!-- Select2 Example -->
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Select2 (Default Theme)</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <!-- Select2 Form -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Provinsi</label>
              <select class="form-control select2" name="provinsi" style="width: 100%;"></select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Kota/Kabupaten</label>
              <select name="kota" class="form-control select2" style="width: 100%;"></select>
            </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
                  <label>Expedisi</label>
                  <select name="expedisi" class="form-control"></select>
                  <option value=""></option>
              </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
                  <label>Paket</label>
                  <select name="paket" class="form-control"></select>
                  <option value=""></option>
              </div>
          </div>
        </div>
        <!-- Additional Select2 Examples -->
        <!-- ... -->
      </div>
      <div class="card-footer">
        <!-- Card Footer Content -->
      </div>
    </div>

   <!-- Payment Methods and Amount Due -->
<div class="row">
  <div class="col-12 col-md-6">
    <!-- Payment Methods -->
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Payment Methods:</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <!-- Payment Method Images -->
          <!-- Place payment method images or content here -->
        </div>
        <p class="card-text text-muted">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
          plugg
          dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-6">
    <!-- Amount Due -->
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Amount Due 2/22/2014</h5>
      </div>
      <div class="card-body">
      <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal :</th>
              <td>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
            </tr>
            <tr>
              <th>Berat :</th>
              <td><?= $berat ?> Gram.</td>
            </tr>
            <tr>
              <th>Ongkir :</th>
              <td>$5.80</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>$265.24</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Print and Payment Buttons -->
<div class="row no-print">
  <div class="col-12">
    <a href="<?= base_url('belanja/') ?>" class="btn btn-default" style="background-color: yellow;"><i class="fa fa-backward"></i> Kembali Ke Keranjang</a>
    <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit Payment</button>
    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;"><i class="fas fa-download"></i> Generate PDF</button>
  </div>
</div>

<br>
<br>
<br>
<style>
    .wrapper {
      margin: 80px auto 20px;
      margin-top: 20px;
      max-width: 1200px; /* Sesuaikan lebar maksimum sesuai kebutuhan Anda */
    }
  </style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Mengimpor jQuery -->
<script>
   $(document).ready(function() {
    //data provinsi
    $.ajax({
        type: "POST", 
        url: "<?= base_url('rajaongkir/provinsi') ?>",
        success: function(hasil_provinsi) {
            $("select[name=provinsi]").html(hasil_provinsi);
        }
    });

    //data kota
       $("select[name=provinsi]").on("change", function() {
        var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/kota') ?>",
            data : 'id_provinsi=' + id_provinsi_terpilih,
            success : function(hasil_kota){
                $("select[name=kota]").html(hasil_kota);
            }
        });
     });
  });
</script>
<!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/user_login_template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/user_login_template/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url() ?>assets/user_login_template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>assets/user_login_template/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/user_login_template/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url() ?>assets/user_login_template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>assets/user_login_template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/user_login_template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url() ?>assets/user_login_template/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?= base_url() ?>assets/user_login_template/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?= base_url() ?>assets/user_login_template/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/user_login_template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/user_login_template/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
</body>
</html>