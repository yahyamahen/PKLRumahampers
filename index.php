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

   <title>Rumahampers</title>
</head>

<body>
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ======================================= BODY ======================================== -->
   <div class="row">
      <div class="hero col-md-12">
         <div class="container d-flex justify-content-center">
            <div class="head-promo">
               <h1>Dapatkan paket terbaik</h1>
               <img src="images/assets/Logo.png" alt="">
               </p><a href="#" class="btn btn-primary order-now">ORDER SEKARANG</a>
               <p>
            </div>
         </div>
      </div>
   </div>

   <!-- ======================================= VISION ======================================== -->
   <div class="row visi">
      <div class="col-md-12">
         <h2>Rumahampers</h2>
      </div>
      <div class="visi-detail col-md-4">
         <img src="images/assets/profile.jpg" alt="visi1">
         <h3>BERKAH</h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta?</p>
      </div>
      <div class="visi-detail col-md-4">
         <img src="images/assets/profile.jpg" alt="visi2">
         <h3>POTENSI</h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta?</p>
      </div>
      <div class="visi-detail col-md-4">
         <img src="images/assets/profile.jpg" alt="visi3">
         <h3>MANFAAT</h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta?</p>
      </div>
   </div>

   <!-- ======================================= MAIN CONTENT ======================================== -->
   <div class="container-main content">
      <div class="row">
         <div class="col-md-12">
            <div class="search-container">
               <form action="POST">
                  <button type="submit"><i class="fa fa-search"></i></button>
                  <input type="text" placeholder="Temukan hampersmu.." name="search" class="form-control" autocomplete="off">
               </form>
            </div>
         </div>
      </div>

      <!-- ======================================= CONTENT ======================================== -->
      <div class="row">
         <div class="col-md-9">
            <a class="sub-title" href="#">Paket Bundle</a>
            <div class="main-category">
               <div class="slide-button">
                  <a href="#"><i class="fa fa-chevron-left"></i></a>
               </div>
               <div class="produk">
                  <img src="images/assets/Profile.jpg" alt="mantap">
                  <div class="product-descript">
                     <a class="produk-title" href="#"> Paket Couple Qur'an & Sajadah</a>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio aliquid dicta eum? Natus dolorem magnam praesentium voluptas quam quas eaque?</p>
                     <h5>Rp. 150.000</h5>
                     <a href="#">selengkapnya >></a>
                     <div class="action-button float-right">
                        <a href="#"><i class="heart-wishtlist fa fa-heart"></i></a>
                        <a href="#"><i class="cart-trolley fa fa-shopping-cart"></i></a>
                     </div>
                  </div>
               </div>
               <div class="slide-button">
                  <a class="" href="#"><i class="fa fa-chevron-right"></i></a>
               </div>
            </div>

         </div>

         <!-- ======================================= SIDEBAR ======================================== -->
         <div class="col-md-3 sidebar">
            <div class="testimoni">
               <img src="images/assets/Profile.jpg" alt="picture">
               <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, nesciunt?</p>
            </div>

            <div class="article">
               <div class="heading-article d-flex justify-content-between">
                  <div class="slide-button align-self-center">
                     <a href="#"><i class="fa fa-chevron-left"></i></a>
                  </div>
                  <a href="#">
                     <h4>Artikel</h4>
                  </a>
                  <div class="slide-button align-self-center">
                     <a href="#"><i class=" fa fa-chevron-right"></i></a>
                  </div>
               </div>
               <img src="images/assets/Profile.jpg" alt="Profile">
               <a href="#">
                  <h5>Mau acara bingung milih souvenir yang berguna?</h5>
               </a>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, beatae numquam? Consequatur amet veritatis eveniet aliquid, inventore totam officia repellat illum officiis quibusdam, praesentium fugiat repellendus adipisci assumenda voluptas! Laudantium.</p>
            </div>

            <div class="sidebar-quick-info">
               <div class="marketplace-info">
                  <h4>Marketplace</h4>
                  <p> @rumahampers </p>
                  <a href="#"><img src="images/assets/bukalapak.png" alt="bukalapak"></a>
                  <a href="#"><img src="images/assets/shoppee.png" alt="shoppee"></a>
                  <a href="#"><img src="images/assets/tokopedia.png" alt="tokopedia"></a>
               </div>

               <div class="contact-us">
                  <h4>Contact Us</h4>
                  <li>
                     <img src="images/assets/whatsapp-colored.png" alt="whatsapp-colored">
                     <a href="#">+6285 6495 72121 </a>
                  </li>
                  <li>
                     <img src="images/assets/gmail-colored.png" alt="gmail-colored">
                     <a href="#"> email@rumahampers.com </a>
                  </li>
                  <li>
                     <img src="images/assets/instagram-colored.png" alt="instagram-colored">
                     <a href="#"> rumahampers </a>
                  </li>
               </div>
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