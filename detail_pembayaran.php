<?php
session_start();

require_once "function.php";
require_once "resource/access.php";
require_once "model.php";
if_not_login_back_to_home();

if (isset($_GET['pemesanan'])) {
   if (trim($_GET['pemesanan'] != "")) {
      $id_pemesanan = $_GET['pemesanan'];
   }
}

?>

<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
   <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <title>Detail Pembayaran</title>

</head>

<body class="image-bg">
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->
   <div class="container-main content">
      <div class="row">
         <div class="col-md-12">
            <h3 class="sub-title mt-4">Pembayaran</h3>
            <div class="detail-pembayaran text-center">
               <?php if (isset($_GET['pemesanan']) && trim($_GET['pemesanan'] != "")) : ?>
                  <?php foreach ($pemesanan_terakhir as $data) : ?>
                     <p><strong>KODE PEMESANAN</strong></p>
                     <h5 class="kode-pemesanan"><?= $data['id_pemesanan'] ?></h5>
                     <?php
                     $timestamp = strtotime($data['waktu_pemesanan']);
                     $limitdate = date("d M Y H:i", strtotime($data['waktu_pemesanan']) + 60 * 60 * 24 * 1);
                     $curdate = date("d M Y H:i", time());
                     ?>
                     <?php if ($limitdate > $curdate) : ?>
                        <p>Lakukan pembayaran sebelum <br>
                           <strong id="expiry_payment_date" style="font-size: 1.1em;"><?= $limitdate ?></strong> <br>
                           <span id="demo" class="d-block mt-2 mb-2" style="font-size: 1.3em; font-weight:700;"></span>
                           Pada salah satu rekening bank dibawah sejumlah
                        </p>
                        <h5 class="total-pembayaran" style="font-size: 2em; font-weight:700">Rp. <?= number_format($data['total'], 0, ".", ".") ?></h5>
                        <p class='d-none' id="n1"><?= $data['total'] ?></p>
                        <a onclick="copyToClipboard('n1')" class="salin-link card-link">SALIN NOMINAL</a>
                     <?php elseif (time() > date("d M Y H:i", strtotime($data['waktu_pemesanan']) + 60 * 60 * 24 * 1)) : ?>
                        <p>Waktu pembayaran <br> <strong style="font-size:1.1em; color:red;"> Expired </strong></p>
                     <?php endif; ?>
                  <?php endforeach; ?>
               <?php else : ?>
                  <?php foreach ($pembayaran as $data) : ?>
                     <p><strong>KODE PEMESANAN</strong></p>
                     <h5 class="kode-pemesanan"><?= $data['id_pemesanan'] ?></h5>
                     <?php
                     $timestamp = strtotime($data['waktu_pemesanan']);
                     $limitdate = date("d M Y H:i", strtotime($data['waktu_pemesanan']) + 60 * 60 * 24 * 1);
                     $curdate = date("d M Y H:i", time());
                     ?>
                     <?php if ($limitdate > $curdate) : ?>
                        <p>Lakukan pembayaran sebelum <br>
                           <strong id="expiry_payment_date" style="font-size: 1.1em;"><?= $limitdate ?></strong> <br>
                           <span id="demo" class="d-block mt-2 mb-2" style="font-size: 1.3em; font-weight:700;"></span>
                           Pada salah satu rekening bank dibawah sejumlah
                        </p>
                        <h5 class="total-pembayaran" style="font-size: 2em; font-weight:700" id="n1">Rp. <?= number_format($data['total'], 0, ".", ".") ?></h5>
                        <p class='d-none' id="n1"><?= $data['total'] ?></p>
                        <div class="tooltip">
                           <a onclick="copyToClipboard('n1')" class="salin-link card-link">SALIN NOMINAL</a>
                        </div>
                     <?php elseif (time() > date("d M Y H:i", strtotime($data['waktu_pemesanan']) + 60 * 60 * 24 * 1)) : ?>
                        <p>Waktu pembayaran <br> <strong style="font-size:1.1em; color:red;"> Expired </strong></p>
                     <?php endif; ?>
                  <?php endforeach; ?>
               <?php endif; ?>


               <div class="bank-list d-flex justify-content-center mt-4">
                  <li class="list-inline mr-5 ml-5 d-flex flex-column">
                     <img src="images/assets/bca.png" alt="bca">
                     <span class="mt-2 mb-n2">No. Rekening : <strong id="r2">045484653</strong> </span>
                     <span class=" mb-n1">a. n : Ahmad Sujianto</span>
                     <a onclick="copyToClipboard('r2')" class="card-link salin-link">Salin No. Rekening</a>
                  </li>
                  <li class="list-inline mr-5 ml-5 d-flex flex-column">
                     <img src="images/assets/mandiri.png" alt="mandiri">
                     <span class="mt-2 mb-n2">No. Rekening : <strong id="r3">045484654</strong> </span>
                     <span class=" mb-n1">a. n : Ahmad Sujianto</span>
                     <a onclick="copyToClipboard('r3')" class="card-link salin-link">Salin No. Rekening</a>
                  </li>
                  <li class="list-inline mr-5 ml-5 d-flex flex-column">
                     <img src="images/assets/bni.png" alt="bni">
                     <span class="mt-2 mb-n2">No. Rekening : <strong id="r4">045484655</strong> </span>
                     <span class=" mb-n1">a. n : Ahmad Sujianto</span>
                     <a onclick="copyToClipboard('r4')" class="card-link salin-link">Salin No. Rekening</a>
                  </li>
                  <li class="list-inline mr-5 ml-5 d-flex flex-column">
                     <img src="images/assets/bri.png" alt="bri">
                     <span class="mt-2 mb-n2">No. Rekening : <strong id="r5">045484656</strong> </span>
                     <span class=" mb-n1">a. n : Ahmad Sujianto</span>
                     <a onclick="copyToClipboard('r5')" class="card-link salin-link">Salin No. Rekening</a>
                  </li>
               </div>
               <p class="mt-4">Jika pembayaran tidak otomatis terproses lakukan konfirmasi pembayaran pada riwayat pemesanan</p>
            </div>
         </div>
      </div>
   </div>

   <!-- ======================================= FOOTER ======================================== -->
   <?php require_once "footer.php" ?>
   <script src="js/js/jquery-3.5.1.js"></script>
   <script src="js/js/jquery-3.5.1.min.js"></script>
   <script src="js/js/popper.min.js"></script>
   <script src="js/js/bootstrap.js"></script>
   <script src="js/js/bootstrap.min.js"></script>
   <!-- <script src="js/js/bootstrap.bundle.js"></script> -->
   <!-- <script src="js/js/bootstrap.bundle.min.js"></script> -->
   <script src="js/js/font-awesome.min.js"></script>
   <!-- <script src="js/script.js"></script> -->

   <script>
      // Set the date we're counting down to
      var timestamp = document.getElementById('expiry_payment_date').textContent;
      var countDownDate = new Date(timestamp);

      // Update the count down every 1 second
      var x = setInterval(function() {
         // Get today's date and time
         var now = new Date().getTime();

         // Find the distance between now and the count down date
         var distance = countDownDate - now;

         // Time calculations for days, hours, minutes and seconds
         var days = Math.floor(distance / (1000 * 60 * 60 * 24));
         var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
         var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
         var seconds = Math.floor((distance % (1000 * 60)) / 1000);

         // Display the result in the element with id="demo"
         document.getElementById("demo").innerHTML = hours + "h " +
            minutes + "m " + seconds + "s ";

         // If the count down is finished, write some text
         if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
         }
      }, 1000);

      function copyToClipboard(elementId) {
         var aux = document.createElement("input");
         aux.setAttribute("value", document.getElementById(elementId).innerHTML);
         document.body.appendChild(aux);
         aux.select();
         document.execCommand("copy");
         document.body.removeChild(aux);
      }
   </script>
</body>

</html>