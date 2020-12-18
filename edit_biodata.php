<?php
session_start();
require_once "function.php";
require_once "resource/access.php";
?>

<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <title>Edit Bidoata</title>

</head>

<body>
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->
   <div class="container-main content">
      <div class="row">
         <div class="col-md-12">
            <div class="biodata-title mt-5">
               <h3 class=" d-inline ml-4">BIODATA</h3><a class="float-right mr-4" href="" class="">Sunting</a>
            </div>
            <div class="biodata-body m-auto">
               <div class="d-flex justify-content-center">
                  <a href="" class="mt-5 mb-3"><img src="images/assets/profile.jpg" class=" rounded-circle" alt="profile"></a>
               </div>
               <form action="" class="row g-3">
                  <div class="col-md-12">
                     <label for="nama" class="form-label">Nama Lengkap *</label>
                     <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap Kamu" autocomplete="off">
                  </div>
                  <div class="col-md-12 mt-3">
                     <label for="email" class="form-label">Email *</label>
                     <input type="email" class="form-control" name="email" id="email" placeholder="email@mail.com" autocomplete="off">
                  </div>
                  <div class="col-md-12 mt-3">
                     <label for="password" class="form-label">Password *</label>
                     <input type="password" class="form-control" name="password" id="password" placeholder="**********" autocomplete="off">
                  </div>
                  <div class="col-md-12 mt-3">
                     <label for="no_telp" class="form-label">No. Handphone *</label>
                     <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="085777333888" autocomplete="off">
                  </div>
                  <div class="col-md-12 mt-3">
                     <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                     <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="16-10-2000" autocomplete="off">
                  </div>
                  <div class="col-md-12 mt-3">
                     <label class="form-label">Alamat *</label>
                  </div>
                  <div class="col-md-4">
                     <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi">
                  </div>
                  <div class="col-md-4">
                     <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota/Kabupaten">
                  </div>
                  <div class="col-md-4">
                     <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan">
                  </div>
                  <div class="col-md-10 mt-3">
                     <input type="textarea" class="form-control alamat-lengkap" name="alamat" id="alamat" placeholder="Alamat Lengkap">
                  </div>
                  <div class="col-md-2 mt-3">
                     <input type="number" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" autocomplete="off">
                  </div>
                  <!-- <div class="col-md-12 mt-3">
                     <label for="catatan" class="form-label">Catatan Pemesanan *</label>
                     <input type="textarea" class="form-control catatan-pemesanan" name="catatan" id="catatan">
                  </div> -->
               </form>
            </div>
         </div>
      </div>
   </div>

   <!-- ======================================= FOOTER ======================================== -->
   <?php require_once "footer.php" ?>

   <script src="js/jquery-3.5.1.js"></script>
   <script src="js/jquery-3.5.1.min.js"></script>
   <script src="js/bootstrap.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <!-- <script src="bootstrap.bundle.js"></script> -->
   <!-- <script src="bootstrap.bundle.min.js"></script> -->
   <script src="js/font-awesome.min.js"></script>
   <script src="js/script.js"></script>
</body>

</html>