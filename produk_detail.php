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
   <title>Nama Produk</title>

</head>

<body class="image-bg">
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->

   <div class="container-main content row">
      <a class="ml-4 mt-4 mb-3 sub-title" href="#">Sajadah</a>
   </div>

   <div class="product-details mb-4">
      <div class="container-main content row">
         <div class="col-md-12">
            <div class="product d-flex over">
               <ul class="product-image-list float-left">
                  <a href="# ">
                     <li><img src="images/assets/profile.jpg " alt="img1"></li>
                  </a>
                  <a href="# ">
                     <li><img src="images/assets/profile.jpg " alt="img1"></li>
                  </a>
                  <a href="# ">
                     <li><img src="images/assets/profile.jpg " alt="img1"></li>
                  </a>
                  <a href="# ">
                     <li><img src="images/assets/profile.jpg " alt="img1"></li>
                  </a>
                  <a href="# ">
                     <li><img src="images/assets/profile.jpg " alt="img1"></li>
                  </a>
               </ul>

               <img class="float-left image-order" src="images/assets/profile.jpg" alt="main_product">



               <?php foreach ($produk as $pr) : ?>
                  <div class="product-description float-left ml-5">
                     <h4 class="produk-title mt-2"><?= $pr['nama_produk']; ?></h4>
                     <p><?= $pr['deskripsi_produk']; ?></p>

                     <div class="color-variant">
                        <p class="">Varian Warna</p>
                        <a href="#" class="btn btn-rounded-outline">
                           <span><?= $pr['warna_produk'] ?></span>
                           <span class="rounded-circle <?= $pr['warna_produk'] ?> ml-1">.....</span>
                        </a>
                        <!-- <a href="#" class="btn btn-rounded-outline">
                           <span>Hijau</span>
                           <span class="rounded-circle Hijau ml-1">.....</span>
                        </a>
                        <a href="#" class="btn btn-rounded-outline">
                           <span>Putih</span>
                           <span class="rounded-circle Putih ml-1">.....</span>
                        </a>
                        <a href="#" class="btn btn-rounded-outline">
                           <span>Hitam</span>
                           <span class="rounded-circle Hitam ml-1">.....</span>
                        </a> -->
                     </div>

                     <p class="mt-3">Stok tersedia : <strong><?= $pr['jumlah_produk'] ?></strong></p>
                     <div class="input-group">
                        <label>Jumlah</label>
                        <button class="ml-2 btn btn-outline-secondary add_pcs" type="button">-</button>
                        <input type="number" class="form-control form_pcs" placeholder="pcs" value="1">
                        <button class="btn btn-outline-secondary rmv_pcs" type="button">+</button>
                     </div>

                     <h4 class="mt-4 mb-4">Rp. <?= $pr['harga_produk'] ?></h4>
                     <button class="btn product-action trolley-button mr-3" type="button">Tambahkan ke Trolley
                        <i class="fa fa-shopping-cart"></i>
                     </button>
                     <button class="btn product-action wishlist-button" type="button">Tambahkan ke Wishlist
                        <i class="fa fa-heart"></i>
                     </button>
                     <div class="input-group">
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
      </div>

      <div class="panel-comment row">
         <div class="col-md-12">
            <hr>
            <h4 class="ml-4 mb-3 sub-title" href="#">Diskusi Produk</h4>
            <ul class="list-group">
               <li class="list-group-item">
                  <img src="images/assets/profile.jpg" class="rounded-circle float-left profile-comment" alt="">
                  <div class="comment-body">
                     <h6 class="d-inline mt-4">Person . </h6>
                     <p class="d-inline">20 Agustus 2020</p>
                     <p>Apakah tersedia untuk 40 Stok?</p>
                  </div>

                  <div class="reply ml-3">
                     <div class="comment-body">
                        <img src="images/assets/profile.jpg" class="rounded-circle float-left" alt="">
                        <h6 class="d-inline">Admin . </h6>
                        <p class="d-inline">20 Agustus 2020</p>
                        <p>Ready, dicheckout saja</p>
                     </div>
                     <div class="input-group d-flex">
                        <img src="images/assets/profile.jpg" class="rounded-circle" alt="">
                        <input type="text" class="form-control align-self-center" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                     </div>
                  </div>
               </li>

               <li class="list-group-item">
                  <div class="comment-body">
                     <img src="images/assets/profile.jpg" class="rounded-circle float-left" alt="">
                     <h6 class="d-inline mt-4">Person . </h6>
                     <p class="d-inline">20 Agustus 2020</p>
                     <p>Apakah tersedia untuk 40 Stok?</p>
                  </div>
                  <div class="input-group d-flex">
                     <img src="images/assets/profile.jpg" class="rounded-circle" alt="">
                     <input type="text" class="form-control align-self-center" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                     <button class="btn btn-outline-secondary" type="button" id="button-addon2">Kirim</button>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>

   <div class="row container-main content">
      <div class="col-md-12">
         <h4 class="ml-4 mb-3 sub-title" href="#">Rekomendasi untuk kamu</h4>
         <?php require_once "resource/recommended.php" ?>
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