<?php
session_start();
require_once "function.php";
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

<body>
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->

   <div class="container-main content">
      <div class="row d-flex justify-content-center">
         <div class="col-md-4">
            <div class="dropdown mt-4">
               <p class=" d-inline mr-3 ml-4">Filter</p>
               <a class="btn btn-outline-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Marchendise
               </a>

               <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Sajadah</a></li>
                  <li><a class="dropdown-item" href="#">Qur'an</a></li>
                  <li><a class="dropdown-item" href="#">Tasbih</a></li>
                  <li><a class="dropdown-item" href="#">Mukenah</a></li>
                  <li><a class="dropdown-item" href="#">Sarung</a></li>
               </ul>
            </div>
         </div>

         <div class="col-md-4">
            <div class="search-container">
               <form action="POST">
                  <button type="submit"><i class="fa fa-search"></i></button>
                  <input type="text" placeholder="Temukan hampersmu.." name="search" class="form-control" autocomplete="off">
               </form>
            </div>
         </div>

         <div class="col-md-4">
            <div class="filter-harga mt-3">
               <!-- <label for="customRange1" class="form-label d-block">Filter Harga</label>
               <input type="range" class="form-range" id="customRange1"> -->
               <div class="row">
                  <div class="col">
                     <label for="harga_min" class="d-inline">Min</label>
                     <span class=" d-inline">Rp. </span><input type="text" class="form-control" placeholder="Min Harga" aria-label="Min Harga">
                  </div>
                  <span class="mt-4"> <strong>-</strong> </span>
                  <div class="col">
                     <label for="harga_min" class="d-inline">Max</label>
                     <span class=" d-inline">Rp. </span>
                     <input type="text" class="form-control" placeholder="Max Harga" aria-label="Max Harga">
                  </div>
                  <div class="col">
                     <button type="submit" name="submit-filter" class=" btn btn-outline-danger mt-4">Filter</button>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-md-12">
            <a class="sub-title mb-3" href="#">Sajadah</a>
            <div class="marchendise-list d-flex justify-content-between">
               <div class="card product-card m-3" style="width: 18rem;">
                  <img src="images/assets/Product1.png" class="card-img-top m-2 mb-n2" alt="product1">
                  <div class="card-body">
                     <a href="produk_detail.php" class="card-title product-title">Card title</a>
                     <h5 class="card-text product-price">Rp. 456.000</h5>
                     <div class="action-button float-right">
                        <a href="#"><i class="heart-wishtlist fa fa-heart"></i></a>
                        <a href="#"><i class="cart-trolley fa fa-shopping-cart"></i></a>
                     </div>
                  </div>
               </div>
               <div class="card product-card m-3" style="width: 18rem;">
                  <img src="images/assets/Product1.png" class="card-img-top m-2 mb-n2" alt="product1">
                  <div class="card-body">
                     <a href="produk_detail.php" class="card-title product-title">Card title</a>
                     <h5 class="card-text product-price">Rp. 456.000</h5>
                     <div class="action-button float-right">
                        <a href="#"><i class="heart-wishtlist fa fa-heart"></i></a>
                        <a href="#"><i class="cart-trolley fa fa-shopping-cart"></i></a>
                     </div>
                  </div>
               </div>
               <div class="card product-card m-3" style="width: 18rem;">
                  <img src="images/assets/Product1.png" class="card-img-top m-2 mb-n2" alt="product1">
                  <div class="card-body">
                     <a href="produk_detail.php" class="card-title product-title">Card title</a>
                     <h5 class="card-text product-price">Rp. 456.000</h5>
                     <div class="action-button float-right">
                        <a href="#"><i class="heart-wishtlist fa fa-heart"></i></a>
                        <a href="#"><i class="cart-trolley fa fa-shopping-cart"></i></a>
                     </div>
                  </div>
               </div>
               <div class="card product-card m-3" style="width: 18rem;">
                  <img src="images/assets/Product1.png" class="card-img-top m-2 mb-n2" alt="product1">
                  <div class="card-body">
                     <a href="produk_detail.php" class="card-title product-title">Card title</a>
                     <h5 class="card-text product-price">Rp. 456.000</h5>
                     <div class="action-button float-right">
                        <a href="#"><i class="heart-wishtlist fa fa-heart"></i></a>
                        <a href="#"><i class="cart-trolley fa fa-shopping-cart"></i></a>
                     </div>
                  </div>
               </div>
               <div class="card product-card m-3" style="width: 18rem;">
                  <img src="images/assets/Product1.png" class="card-img-top m-2 mb-n2" alt="product1">
                  <div class="card-body">
                     <a href="produk_detail.php" class="card-title product-title">Card title</a>
                     <h5 class="card-text product-price">Rp. 456.000</h5>
                     <div class="action-button float-right">
                        <a href="#"><i class="heart-wishtlist fa fa-heart"></i></a>
                        <a href="#"><i class="cart-trolley fa fa-shopping-cart"></i></a>
                     </div>
                  </div>
               </div>
            </div>

            <div class="marchendise-list d-flex justify-content-between">
               <div class="card product-card m-3" style="width: 18rem;">
                  <img src="images/assets/Product1.png" class="card-img-top m-2 mb-n2" alt="product1">
                  <div class="card-body">
                     <a href="produk_detail.php" class="card-title product-title">Card title</a>
                     <h5 class="card-text product-price">Rp. 456.000</h5>
                     <div class="action-button float-right">
                        <a href="#"><i class="heart-wishtlist fa fa-heart"></i></a>
                        <a href="#"><i class="cart-trolley fa fa-shopping-cart"></i></a>
                     </div>
                  </div>
               </div>
               <div class="card product-card m-3" style="width: 18rem;">
                  <img src="images/assets/Product1.png" class="card-img-top m-2 mb-n2" alt="product1">
                  <div class="card-body">
                     <a href="produk_detail.php" class="card-title product-title">Card title</a>
                     <h5 class="card-text product-price">Rp. 456.000</h5>
                     <div class="action-button float-right">
                        <a href="#"><i class="heart-wishtlist fa fa-heart"></i></a>
                        <a href="#"><i class="cart-trolley fa fa-shopping-cart"></i></a>
                     </div>
                  </div>
               </div>
               <div class="card product-card m-3" style="width: 18rem;">
                  <img src="images/assets/Product1.png" class="card-img-top m-2 mb-n2" alt="product1">
                  <div class="card-body">
                     <a href="produk_detail.php" class="card-title product-title">Card title</a>
                     <h5 class="card-text product-price">Rp. 456.000</h5>
                     <div class="action-button float-right">
                        <a href="#"><i class="heart-wishtlist fa fa-heart"></i></a>
                        <a href="#"><i class="cart-trolley fa fa-shopping-cart"></i></a>
                     </div>
                  </div>
               </div>
               <div class="card product-card m-3" style="width: 18rem;">
                  <img src="images/assets/Product1.png" class="card-img-top m-2 mb-n2" alt="product1">
                  <div class="card-body">
                     <a href="produk_detail.php" class="card-title product-title">Card title</a>
                     <h5 class="card-text product-price">Rp. 456.000</h5>
                     <div class="action-button float-right">
                        <a href="#"><i class="heart-wishtlist fa fa-heart"></i></a>
                        <a href="#"><i class="cart-trolley fa fa-shopping-cart"></i></a>
                     </div>
                  </div>
               </div>
               <div class="card product-card m-3" style="width: 18rem;">
                  <img src="images/assets/Product1.png" class="card-img-top m-2 mb-n2" alt="product1">
                  <div class="card-body">
                     <a href="produk_detail.php" class="card-title product-title">Card title</a>
                     <h5 class="card-text product-price">Rp. 456.000</h5>
                     <div class="action-button float-right">
                        <a href="#"><i class="heart-wishtlist fa fa-heart"></i></a>
                        <a href="#"><i class="cart-trolley fa fa-shopping-cart"></i></a>
                     </div>
                  </div>
               </div>

            </div>

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