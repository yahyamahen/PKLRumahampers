<?php
session_start();
require_once "function.php";
require_once "resource/access.php";
require_once "model.php";

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
   <title>Detail Pembayaran</title>

</head>

<body class="white-bg">
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->
   <div class="container-main content">
      <div class="row">
         <div class="col-md-12">
            <h3 class="sub-title mt-4">Pembayaran</h3>
            <div class="detail-pembayaran text-center">
               <p><strong>KODE PEMESANAN</strong></p>
               <h5 class="kode-pemesanan">PG13451</h5>
               <p>Lakukan transfer pada salah satu rekening bank dibawah sejumlah</p>
               <h5 class="total-pembayaran">RP. 476.000</h5>
               <a href="" class=" card-link">SALIN NOMINAL</a>
               <div class="bank-list d-flex justify-content-center mt-4">
                  <li class="list-inline mr-5 ml-5 d-flex flex-column">
                     <img src="images/assets/bca.png" alt="bca">
                     <span class="mt-2 mb-n2">No. Rekening : <strong>045484654</strong> </span>
                     <span class=" mb-n1">a. n : Ahmad Sujianto</span>
                     <a href="#" class=" card-link">Salin No. Rekening</a>
                  </li>
                  <li class="list-inline mr-5 ml-5 d-flex flex-column">
                     <img src="images/assets/mandiri.png" alt="mandiri">
                     <span class="mt-2 mb-n2">No. Rekening : <strong>045484654</strong> </span>
                     <span class=" mb-n1">a. n : Ahmad Sujianto</span>
                     <a href="#" class=" card-link">Salin No. Rekening</a>
                  </li>
                  <li class="list-inline mr-5 ml-5 d-flex flex-column">
                     <img src="images/assets/bni.png" alt="bni">
                     <span class="mt-2 mb-n2">No. Rekening : <strong>045484654</strong> </span>
                     <span class=" mb-n1">a. n : Ahmad Sujianto</span>
                     <a href="#" class=" card-link">Salin No. Rekening</a>
                  </li>
                  <li class="list-inline mr-5 ml-5 d-flex flex-column">
                     <img src="images/assets/bri.png" alt="bri">
                     <span class="mt-2 mb-n2">No. Rekening : <strong>045484654</strong> </span>
                     <span class=" mb-n1">a. n : Ahmad Sujianto</span>
                     <a href="#" class=" card-link">Salin No. Rekening</a>
                  </li>
               </div>
               <p class="mt-4">Jika pembayaran tidak otomatis terproses lakukan konfirmasi pembayaran pada riwayat pemesanan</p>
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