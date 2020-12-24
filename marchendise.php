<?php
session_start();
require_once "function.php";
require_once "resource/access.php";
require_once "model.php";

$kategori_list = read("SELECT kategori FROM produk WHERE kategori = '$kategori'");
$marchendise = read("SELECT * FROM produk WHERE kategori = '$kategori'");

if (!isset($_GET['filter-harga-btn']) && isset($_POST['search_btn'])) {
   $key = $_POST['keyword'];
   $marchendise = read("SELECT * FROM produk WHERE kategori = '$kategori' && nama_produk LIKE '%$key%';");
}

if (isset($_GET['filter-harga-btn'])) {
   $harga_min = $_GET['harga_min'];
   $harga_max = $_GET['harga_max'];
   if (isset($_GET['harga_min']) && $_GET['harga_max'] == "") {
      $marchendise_filter = read("SELECT * FROM produk WHERE kategori = '$kategori' && harga_produk <= '$harga_min'");
   } else {
      $marchendise_filter = read("SELECT * FROM produk WHERE kategori = '$kategori' && harga_produk BETWEEN '$harga_min' AND '$harga_max';");
   }

   if (isset($_POST['search_btn'])) {
      $key = $_POST['keyword'];
      $marchendise_filter = read("SELECT * FROM produk WHERE kategori = '$kategori' && nama_produk LIKE '%$key%' && harga_produk BETWEEN '$harga_min' AND '$harga_max';");
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
   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <title>Marchendise</title>

</head>

<body class="image-bg">
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->

   <div class="container-main content">
      <div class="row d-flex justify-content-center">
         <div class="col-md-4">
            <div class="dropdown mt-5">
               <p class=" d-inline mr-3 ml-4">Filter</p>
               <a class="btn btn-outline-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Marchendise
               </a>

               <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <?php // foreach ($produk as $pr) : 
                  ?>
                  <!-- <li><a class="dropdown-item" href="marchendise?marchendise=<?= $pr['kategori']; ?>"><?= $pr['kategori']; ?></a></li> -->
                  <li><a class="dropdown-item" href="marchendise?kategori=sajadah">Sajadah</a></li>
                  <li><a class="dropdown-item" href="marchendise?kategori=quran">Qur'an</a></li>
                  <li><a class="dropdown-item" href="marchendise?kategori=tasbih">Tasbih</a></li>
                  <li><a class="dropdown-item" href="marchendise?kategori=mukenah">Mukenah</a></li>
                  <li><a class="dropdown-item" href="marchendise?kategori=sarung">Sarung</a></li>
                  <?php //endforeach; 
                  ?>
               </ul>
            </div>
         </div>

         <div class="col-md-4">
            <div class="search-container mt-5">
               <form action="" method="POST">
                  <button type="submit" name="search_btn" id="search_btn"><i class="fa fa-search"></i></button>
                  <input type="hidden" name="kategori" id="kategori" value="<?= $kategori ?>">
                  <input type="text" placeholder="Temukan hampersmu.." name="keyword" id="keyword" class="form-control" autocomplete="off">
               </form>
            </div>
         </div>

         <div class="col-md-4">
            <div class="filter-harga mt-4">
               <!-- <label for="customRange1" class="form-label d-block">Filter Harga</label>
               <input type="range" class="form-range" id="customRange1"> -->
               <form action="" method="GET">
                  <div class="row d-flex">
                     <input type="hidden" name="kategori" id="kategori" value="<?= $kategori ?>">
                     <div class="col">
                        <label for="harga_min" class="d-inline">Min</label>
                        <span class=" d-inline">Rp. </span>
                        <input type="number" class="form-control" name="harga_min" id="harga_min" placeholder="Min Harga" aria-label="Min Harga" autocomplete="off">
                     </div>
                     <span class="mt-4"> <strong>-</strong> </span>
                     <div class="col">
                        <label for="harga_max" class="d-inline">Max</label>
                        <span class=" d-inline">Rp. </span>
                        <input type="number" class="form-control" name="harga_max" id="harga_max" placeholder="Max Harga" aria-label="Max Harga" autocomplete="off">
                     </div>
                     <div class="col">
                        <button type="submit" name="filter-harga-btn" class=" btn btn-outline-danger mt-4">Filter</button>
                     </div>
                  </div>
               </form>
            </div>
            <a class="card-link ml-3" href="marchendise?kategori=<?= $kategori ?>">Clear Filter</a>
         </div>
      </div>

      <div class="row">
         <div class="col-md-12">
            <?php foreach ($kategori_list as $data) : ?>
               <a class="sub-title mb-3" href="marchendise?kategori=<?= $data['kategori'] ?>"><?= $data['kategori'] ?></a>
               <?php break; ?>
            <?php endforeach; ?>
            <div class="marchendise-list d-flex justify-content-start flex-wrap">
               <?php if (isset($_GET['filter-harga-btn'])) : ?>
                  <?php foreach ($marchendise_filter as $mrc) : ?>
                     <div class="card product-card" style="width: 15.4rem;">
                        <img src="images/assets/profile.jpg" class="card-img-top m-2 mb-n2" alt="product1">
                        <div class="card-body">
                           <a href="produk_detail?produk=<?= $mrc['id_produk'] ?>" class="card-title product-title"><?= $mrc['nama_produk'] ?></a>
                           <h5 class="card-text product-price">Rp. <?= $mrc['harga_produk'] ?></h5>
                           <div class="action-button float-right d-flex">
                              <?php if (!isset($_SESSION['login'])) : ?>
                                 <form action="" method="post">
                                    <input type="hidden" name="username" id="username" value="<?= $username ?>">
                                    <input type="hidden" name="id_produk" id="id_produk" value="<?= $mrc['id_produk'] ?>">
                                    <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                                    <button type="button" name="add_wishlist" id="add_wishlist"><i class="heart-wishtlist fa fa-heart" data-toggle="modal" data-target="#form-input"></i></button>
                                    <button type="button" name="add_trolley" id="add_trolley" data-toggle="modal" data-target="#form-input"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                                 </form>
                              <?php else : ?>
                                 <form action="" method="post">
                                    <input type="hidden" name="username" id="username" value="<?= $username ?>">
                                    <input type="hidden" name="id_produk" id="id_produk" value="<?= $mrc['id_produk'] ?>">
                                    <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                                    <button type="submit" name="add_wishlist" id="add_wishlist"><i class="heart-wishtlist fa fa-heart"></i></button>
                                    <button type="submit" name="add_trolley" id="add_trolley"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                                 </form>
                              <?php endif; ?>

                              <!-- NEXT PROJECT -->
                              <!-- <a href="marchendise?id_produk=<?= $mrc['id_produk'] ?>"><i style="color: #e18a79;" class="heart-wishtlist fa fa-heart"></i></a> -->


                              <!-- NEXT PROJECT -->
                              <!-- <a href="marchendise?id_produk=<?= $mrc['id_produk'] ?>"><i style="color: #98afbb;" class="cart-trolley fa fa-shopping-cart"></i></a> -->
                           </div>
                        </div>
                     </div>
                  <?php endforeach; ?>
               <?php else : ?>
                  <?php foreach ($marchendise as $mrc) : ?>
                     <div class="card product-card" style="width: 15.4rem;">
                        <img src="images/assets/profile.jpg" class="card-img-top m-2 mb-n2" alt="product1">
                        <div class="card-body">
                           <a href="produk_detail?produk=<?= $mrc['id_produk'] ?>" class="card-title product-title"><?= $mrc['nama_produk'] ?></a>
                           <h5 class="card-text product-price">Rp. <?= $mrc['harga_produk'] ?></h5>
                           <div class="action-button float-right d-flex">
                              <?php if (!isset($_SESSION['login'])) : ?>
                                 <form action="" method="post">
                                    <input type="hidden" name="username" id="username" value="<?= $username ?>">
                                    <input type="hidden" name="id_produk" id="id_produk" value="<?= $mrc['id_produk'] ?>">
                                    <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                                    <button type="button" name="add_wishlist" id="add_wishlist"><i class="heart-wishtlist fa fa-heart" data-toggle="modal" data-target="#form-input"></i></button>
                                    <button type="button" name="add_trolley" id="add_trolley" data-toggle="modal" data-target="#form-input"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                                 </form>
                              <?php else : ?>
                                 <form action="" method="post">
                                    <input type="hidden" name="username" id="username" value="<?= $username ?>">
                                    <input type="hidden" name="id_produk" id="id_produk" value="<?= $mrc['id_produk'] ?>">
                                    <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                                    <button type="submit" name="add_wishlist" id="add_wishlist"><i class="heart-wishtlist fa fa-heart"></i></button>
                                    <button type="submit" name="add_trolley" id="add_trolley"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                                 </form>
                              <?php endif; ?>

                              <!-- NEXT PROJECT -->
                              <!-- <a href="marchendise?id_produk=<?= $mrc['id_produk'] ?>"><i style="color: #e18a79;" class="heart-wishtlist fa fa-heart"></i></a> -->


                              <!-- NEXT PROJECT -->
                              <!-- <a href="marchendise?id_produk=<?= $mrc['id_produk'] ?>"><i style="color: #98afbb;" class="cart-trolley fa fa-shopping-cart"></i></a> -->
                           </div>
                        </div>
                     </div>
                  <?php endforeach; ?>
               <?php endif; ?>

               <?php wishlist_trolley_added_notice() ?>
            </div>

            <!-- <div class="marchendise-list d-flex justify-content-between">
               <div class="card product-card m-3" style="width: 18rem;">
                  <img src="images/assets/Product1.png" class="card-img-top m-2 mb-n2" alt="product1">
                  <div class="card-body">
                     <a href="produk_detail" class="card-title product-title">Card title</a>
                     <h5 class="card-text product-price">Rp. 456.000</h5>
                     <div class="action-button float-right">
                        <a href="#"><i class="heart-wishtlist fa fa-heart"></i></a>
                        <a href="#"><i class="cart-trolley fa fa-shopping-cart"></i></a>
                     </div>
                  </div>
               </div>
            </div> -->
         </div>

         <div class="col-md-12">
            <div class="pagination">
               <ul>
                  <li><a href=""> Left </a></li>
                  <li><a href="">1</a></li>
                  <li><a href="">2</a></li>
                  <li><a href="">3</a></li>
                  <li><a href="">4</a></li>
                  <li><a href="">5</a></li>
                  <li><a href=""> Right </a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>

   <!-- ====================================== FOOTER ======================================== -->
   <?php require_once "footer.php" ?>
   <script src="js/jquery-3.5.1.js"></script>
   <script src="js/jquery-3.5.1.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <!-- <script src="bootstrap.bundle.js"></script> -->
   <!-- <script src="bootstrap.bundle.min.js"></script> -->
   <script src="js/font-awesome.min.js"></script>
   <script src="js/script.js"></script>
</body>

</html>