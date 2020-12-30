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
   <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
   <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">

   <title>Rumahampers</title>
</head>

<body class="image-bg">
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ======================================= BODY ======================================== -->
   <div class="row">
      <div class="hero col-md-12">
         <div class="container d-flex justify-content-center">
            <div class="head-promo">
               <?php if (isset($_SESSION['login'])) : ?>
                  <?php foreach ($user as $usr) : ?>
                     <h3 class="greeting-customers">Selamat Datang <?= $usr['nama_lengkap'] ?> </h3>
                  <?php endforeach; ?>
               <?php endif; ?>
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
            <?php foreach ($quran as $data) : ?>
               <a class="sub-title" href="marchendise?kategori=<?= $data['kategori'] ?>"><?= $data['kategori'] ?></a>
            <?php endforeach; ?>

            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
               <div class="carousel-inner main-category">
                  <?php foreach ($quran as $data) : ?>
                     <div class="produk carousel-item d-flex active">
                        <div class="d-flex justify-content-center overflow-hidden" style="width: 11em; height:11em;">
                           <img src="images/produk/<?= $data['kategori'] ?>/<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>" alt="mantap">
                        </div>
                        <div class="product-descript">
                           <a class="produk-title" href="produk_detail?produk=<?= $data['id_produk'] ?>"> <?= $data['nama_produk'] ?></a>
                           <p><?= $data['deskripsi_produk'] ?></p>
                           <h5>Rp. <?= number_format($data['harga_produk'], 0, ".", ".") ?></h5>
                           <a href="produk_detail?produk=<?= $data['id_produk'] ?>">selengkapnya >></a>
                        </div>
                        <div class="action-button align-self-end">
                           <?php if (!isset($_SESSION['login'])) : ?>
                              <form action="" method="post">
                                 <button type="button" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart" data-toggle="modal" data-target="#form-input"></i></button>
                                 <button type="button" name="add_trolley" id="add_trolley" data-toggle="modal" data-target="#form-input" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php else : ?>
                              <form action="" method="post">
                                 <input type="hidden" name="username" id="username" value="<?= $username ?>">
                                 <input type="hidden" name="id_produk" id="id_produk" value="<?= $data['id_produk'] ?>">
                                 <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $data['nama_produk'] ?>">
                                 <input type="hidden" name="jumlah_produk" id="jumlah_produk" value="<?= $data['jumlah_produk'] ?>">
                                 <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                                 <button type="submit" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart"></i></button>
                                 <button type="submit" name="add_trolley" id="add_trolley" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php endif; ?>
                        </div>
                     </div>
                  <?php endforeach; ?>

                  <?php foreach ($quran_rand as $data) : ?>
                     <div class="produk carousel-item d-flex">
                        <div class="d-flex justify-content-center overflow-hidden" style="width: 11em; height:11em;">
                           <img src="images/produk/<?= $data['kategori'] ?>/<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>" alt="mantap">
                        </div>
                        <div class="product-descript">
                           <a class="produk-title" href="produk_detail?produk=<?= $data['id_produk'] ?>"> <?= $data['nama_produk'] ?></a>
                           <p><?= $data['deskripsi_produk'] ?></p>
                           <h5>Rp. <?= number_format($data['harga_produk'], 0, ".", ".") ?></h5>
                           <a href="produk_detail?produk=<?= $data['id_produk'] ?>">selengkapnya >></a>
                        </div>
                        <div class="action-button align-self-end">
                           <?php if (!isset($_SESSION['login'])) : ?>
                              <form action="" method="post">
                                 <button type="button" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart btn" data-toggle="modal" data-target="#form-input"></i></button>
                                 <button type="button" name="add_trolley" id="add_trolley" data-toggle="modal" data-target="#form-input" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php else : ?>
                              <form action="" method="post">
                                 <input type="hidden" name="username" id="username" value="<?= $username ?>">
                                 <input type="hidden" name="id_produk" id="id_produk" value="<?= $data['id_produk'] ?>">
                                 <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $data['nama_produk'] ?>">
                                 <input type="hidden" name="jumlah_produk" id="jumlah_produk" value="<?= $data['jumlah_produk'] ?>">
                                 <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                                 <button type="submit" name="add_wishlist" id="add_wishlist" class="btn"><i class="sheart-wishtlist fa fa-heart"></i></button>
                                 <button type="submit" name="add_trolley" id="add_trolley" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php endif; ?>
                        </div>
                     </div>
                  <?php endforeach; ?>
                  <?= wishlist_trolley_added_notice() ?>

                  <a class="carousel-control-prev ml-n3" href="#carouselExampleFade" role="button" data-slide="prev" style="color: grey;">
                     <span style="color: grey;" aria-hidden="true">
                        <i class="fa fa-chevron-left"></i>
                     </span>
                  </a>
                  <a class="carousel-control-next mr-n3" href="#carouselExampleFade" role="button" data-slide="prev" style="color: grey;">
                     <span style="color: grey;" aria-hidden="true">
                        <i class="fa fa-chevron-right"></i>
                     </span>
                  </a>
               </div>
            </div>

            <?php foreach ($sajadah as $data) : ?>
               <a class="sub-title" href="marchendise?kategori=<?= $data['kategori'] ?>"><?= $data['kategori'] ?></a>
            <?php endforeach; ?>

            <div id="carouselExampleFade1" class="carousel slide carousel-fade" data-ride="carousel">
               <div class="carousel-inner main-category">
                  <?php foreach ($sajadah as $data) : ?>
                     <div class="produk carousel-item d-flex active">
                        <div class="d-flex justify-content-center overflow-hidden" style="width: 11em; height:11em;">
                           <img src="images/produk/<?= $data['kategori'] ?>/<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>" alt="mantap">
                        </div>
                        <div class="product-descript">
                           <a class="produk-title" href="produk_detail?produk=<?= $data['id_produk'] ?>"> <?= $data['nama_produk'] ?></a>
                           <p><?= $data['deskripsi_produk'] ?></p>
                           <h5>Rp. <?= number_format($data['harga_produk'], 0, ".", ".") ?></h5>
                           <a href="produk_detail?produk=<?= $data['id_produk'] ?>">selengkapnya >></a>
                        </div>
                        <div class="action-button align-self-end">
                           <?php if (!isset($_SESSION['login'])) : ?>
                              <form action="" method="post">
                                 <button type="button" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart" data-toggle="modal" data-target="#form-input"></i></button>
                                 <button type="button" name="add_trolley" id="add_trolley" data-toggle="modal" data-target="#form-input" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php else : ?>
                              <form action="" method="post">
                                 <input type="hidden" name="username" id="username" value="<?= $username ?>">
                                 <input type="hidden" name="id_produk" id="id_produk" value="<?= $data['id_produk'] ?>">
                                 <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $data['nama_produk'] ?>">
                                 <input type="hidden" name="jumlah_produk" id="jumlah_produk" value="<?= $data['jumlah_produk'] ?>">
                                 <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                                 <button type="submit" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart"></i></button>
                                 <button type="submit" name="add_trolley" id="add_trolley" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php endif; ?>
                        </div>
                     </div>
                  <?php endforeach; ?>

                  <?php foreach ($sajadah_rand as $data) : ?>
                     <div class="produk carousel-item d-flex">
                        <div class="d-flex justify-content-center overflow-hidden" style="width: 11em; height:11em;">
                           <img src="images/produk/<?= $data['kategori'] ?>/<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>" alt="mantap">
                        </div>
                        <div class="product-descript">
                           <a class="produk-title" href="produk_detail?produk=<?= $data['id_produk'] ?>"> <?= $data['nama_produk'] ?></a>
                           <p><?= $data['deskripsi_produk'] ?></p>
                           <h5>Rp. <?= number_format($data['harga_produk'], 0, ".", ".") ?></h5>
                           <a href="produk_detail?produk=<?= $data['id_produk'] ?>">selengkapnya >></a>
                        </div>
                        <div class="action-button align-self-end">
                           <?php if (!isset($_SESSION['login'])) : ?>
                              <form action="" method="post">
                                 <button type="button" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart btn" data-toggle="modal" data-target="#form-input"></i></button>
                                 <button type="button" name="add_trolley" id="add_trolley" data-toggle="modal" data-target="#form-input" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php else : ?>
                              <form action="" method="post">
                                 <input type="hidden" name="username" id="username" value="<?= $username ?>">
                                 <input type="hidden" name="id_produk" id="id_produk" value="<?= $data['id_produk'] ?>">
                                 <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $data['nama_produk'] ?>">
                                 <input type="hidden" name="jumlah_produk" id="jumlah_produk" value="<?= $data['jumlah_produk'] ?>">
                                 <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                                 <button type="submit" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart"></i></button>
                                 <button type="submit" name="add_trolley" id="add_trolley" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php endif; ?>
                        </div>
                     </div>
                  <?php endforeach; ?>
                  <?= wishlist_trolley_added_notice() ?>

                  <a class="carousel-control-prev ml-n3" href="#carouselExampleFade1" role="button" data-slide="prev" style="color: grey;">
                     <span style="color: grey;" aria-hidden="true">
                        <i class="fa fa-chevron-left"></i>
                     </span>
                  </a>
                  <a class="carousel-control-next mr-n3" href="#carouselExampleFade1" role="button" data-slide="prev" style="color: grey;">
                     <span style="color: grey;" aria-hidden="true">
                        <i class="fa fa-chevron-right"></i>
                     </span>
                  </a>
               </div>
            </div>

            <?php foreach ($tasbih as $data) : ?>
               <a class="sub-title" href="marchendise?kategori=<?= $data['kategori'] ?>"><?= $data['kategori'] ?></a>
            <?php endforeach; ?>

            <div id="carouselExampleFade2" class="carousel slide carousel-fade" data-ride="carousel">
               <div class="carousel-inner main-category">
                  <?php foreach ($tasbih as $data) : ?>
                     <div class="produk carousel-item d-flex active">
                        <div class="d-flex justify-content-center overflow-hidden" style="width: 11em; height:11em;">
                           <img src="images/produk/<?= $data['kategori'] ?>/<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>" alt="mantap">
                        </div>
                        <div class="product-descript">
                           <a class="produk-title" href="produk_detail?produk=<?= $data['id_produk'] ?>"> <?= $data['nama_produk'] ?></a>
                           <p><?= $data['deskripsi_produk'] ?></p>
                           <h5>Rp. <?= number_format($data['harga_produk'], 0, ".", ".") ?></h5>
                           <a href="produk_detail?produk=<?= $data['id_produk'] ?>">selengkapnya >></a>
                        </div>
                        <div class="action-button align-self-end">
                           <?php if (!isset($_SESSION['login'])) : ?>
                              <form action="" method="post">
                                 <button type="button" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart" data-toggle="modal" data-target="#form-input"></i></button>
                                 <button type="button" name="add_trolley" id="add_trolley" data-toggle="modal" data-target="#form-input" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php else : ?>
                              <form action="" method="post">
                                 <input type="hidden" name="username" id="username" value="<?= $username ?>">
                                 <input type="hidden" name="id_produk" id="id_produk" value="<?= $data['id_produk'] ?>">
                                 <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $data['nama_produk'] ?>">
                                 <input type="hidden" name="jumlah_produk" id="jumlah_produk" value="<?= $data['jumlah_produk'] ?>">
                                 <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                                 <button type="submit" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart"></i></button>
                                 <button type="submit" name="add_trolley" id="add_trolley" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php endif; ?>
                        </div>
                     </div>
                  <?php endforeach; ?>

                  <?php foreach ($tasbih_rand as $data) : ?>
                     <div class="produk carousel-item d-flex">
                        <div class="d-flex justify-content-center overflow-hidden" style="width: 11em; height:11em;">
                           <img src="images/produk/<?= $data['kategori'] ?>/<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>" alt="mantap">
                        </div>
                        <div class="product-descript">
                           <a class="produk-title" href="produk_detail?produk=<?= $data['id_produk'] ?>"> <?= $data['nama_produk'] ?></a>
                           <p><?= $data['deskripsi_produk'] ?></p>
                           <h5>Rp. <?= number_format($data['harga_produk'], 0, ".", ".") ?></h5>
                           <a href="produk_detail?produk=<?= $data['id_produk'] ?>">selengkapnya >></a>
                        </div>
                        <div class="action-button align-self-end">
                           <?php if (!isset($_SESSION['login'])) : ?>
                              <form action="" method="post">
                                 <button type="button" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart btn" data-toggle="modal" data-target="#form-input"></i></button>
                                 <button type="button" name="add_trolley" id="add_trolley" data-toggle="modal" data-target="#form-input" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php else : ?>
                              <form action="" method="post">
                                 <input type="hidden" name="username" id="username" value="<?= $username ?>">
                                 <input type="hidden" name="id_produk" id="id_produk" value="<?= $data['id_produk'] ?>">
                                 <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $data['nama_produk'] ?>">
                                 <input type="hidden" name="jumlah_produk" id="jumlah_produk" value="<?= $data['jumlah_produk'] ?>">
                                 <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                                 <button type="submit" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart"></i></button>
                                 <button type="submit" name="add_trolley" id="add_trolley" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php endif; ?>
                        </div>
                     </div>
                  <?php endforeach; ?>
                  <?= wishlist_trolley_added_notice() ?>

                  <a class="carousel-control-prev ml-n3" href="#carouselExampleFade2" role="button" data-slide="prev" style="color: grey;">
                     <span style="color: grey;" aria-hidden="true">
                        <i class="fa fa-chevron-left"></i>
                     </span>
                  </a>
                  <a class="carousel-control-next mr-n3" href="#carouselExampleFade2" role="button" data-slide="prev" style="color: grey;">
                     <span style="color: grey;" aria-hidden="true">
                        <i class="fa fa-chevron-right"></i>
                     </span>
                  </a>
               </div>
            </div>

            <?php foreach ($mukenah as $data) : ?>
               <a class="sub-title" href="marchendise?kategori=<?= $data['kategori'] ?>"><?= $data['kategori'] ?></a>
            <?php endforeach; ?>

            <div id="carouselExampleFade3" class="carousel slide carousel-fade" data-ride="carousel">
               <div class="carousel-inner main-category">
                  <?php foreach ($mukenah as $data) : ?>
                     <div class="produk carousel-item d-flex active">
                        <div class="d-flex justify-content-center overflow-hidden" style="width: 11em; height:11em;">
                           <img src="images/produk/<?= $data['kategori'] ?>/<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>" alt="mantap">
                        </div>
                        <div class="product-descript">
                           <a class="produk-title" href="produk_detail?produk=<?= $data['id_produk'] ?>"> <?= $data['nama_produk'] ?></a>
                           <p><?= $data['deskripsi_produk'] ?></p>
                           <h5>Rp. <?= number_format($data['harga_produk'], 0, ".", ".") ?></h5>
                           <a href="produk_detail?produk=<?= $data['id_produk'] ?>">selengkapnya >></a>
                        </div>
                        <div class="action-button align-self-end">
                           <?php if (!isset($_SESSION['login'])) : ?>
                              <form action="" method="post">
                                 <button type="button" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart" data-toggle="modal" data-target="#form-input"></i></button>
                                 <button type="button" name="add_trolley" id="add_trolley" data-toggle="modal" data-target="#form-input" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php else : ?>
                              <form action="" method="post">
                                 <input type="hidden" name="username" id="username" value="<?= $username ?>">
                                 <input type="hidden" name="id_produk" id="id_produk" value="<?= $data['id_produk'] ?>">
                                 <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $data['nama_produk'] ?>">
                                 <input type="hidden" name="jumlah_produk" id="jumlah_produk" value="<?= $data['jumlah_produk'] ?>">
                                 <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                                 <button type="submit" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart"></i></button>
                                 <button type="submit" name="add_trolley" id="add_trolley" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php endif; ?>
                        </div>
                     </div>
                  <?php endforeach; ?>

                  <?php foreach ($mukenah_rand as $data) : ?>
                     <div class="produk carousel-item d-flex">
                        <div class="d-flex justify-content-center overflow-hidden" style="width: 11em; height:11em;">
                           <img src="images/produk/<?= $data['kategori'] ?>/<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>" alt="mantap">
                        </div>
                        <div class="product-descript">
                           <a class="produk-title" href="produk_detail?produk=<?= $data['id_produk'] ?>"> <?= $data['nama_produk'] ?></a>
                           <p><?= $data['deskripsi_produk'] ?></p>
                           <h5>Rp. <?= number_format($data['harga_produk'], 0, ".", ".") ?></h5>
                           <a href="produk_detail?produk=<?= $data['id_produk'] ?>">selengkapnya >></a>
                        </div>
                        <div class="action-button align-self-end">
                           <?php if (!isset($_SESSION['login'])) : ?>
                              <form action="" method="post">
                                 <button type="button" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart btn" data-toggle="modal" data-target="#form-input"></i></button>
                                 <button type="button" name="add_trolley" id="add_trolley" data-toggle="modal" data-target="#form-input" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php else : ?>
                              <form action="" method="post">
                                 <input type="hidden" name="username" id="username" value="<?= $username ?>">
                                 <input type="hidden" name="id_produk" id="id_produk" value="<?= $data['id_produk'] ?>">
                                 <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $data['nama_produk'] ?>">
                                 <input type="hidden" name="jumlah_produk" id="jumlah_produk" value="<?= $data['jumlah_produk'] ?>">
                                 <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                                 <button type="submit" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart"></i></button>
                                 <button type="submit" name="add_trolley" id="add_trolley" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php endif; ?>
                        </div>
                     </div>
                  <?php endforeach; ?>
                  <?= wishlist_trolley_added_notice() ?>

                  <a class="carousel-control-prev ml-n3" href="#carouselExampleFade3" role="button" data-slide="prev" style="color: grey;">
                     <span style="color: grey;" aria-hidden="true">
                        <i class="fa fa-chevron-left"></i>
                     </span>
                  </a>
                  <a class="carousel-control-next mr-n3" href="#carouselExampleFade3" role="button" data-slide="prev" style="color: grey;">
                     <span style="color: grey;" aria-hidden="true">
                        <i class="fa fa-chevron-right"></i>
                     </span>
                  </a>
               </div>
            </div>

            <?php foreach ($sarung as $data) : ?>
               <a class="sub-title" href="marchendise?kategori=<?= $data['kategori'] ?>"><?= $data['kategori'] ?></a>
            <?php endforeach; ?>

            <div id="carouselExampleFade4" class="carousel slide carousel-fade" data-ride="carousel">
               <div class="carousel-inner main-category">
                  <?php foreach ($sarung as $data) : ?>
                     <div class="produk carousel-item d-flex active">
                        <div class="d-flex justify-content-center overflow-hidden" style="width: 11em; height:11em;">
                           <img src="images/produk/<?= $data['kategori'] ?>/<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>" alt="mantap">
                        </div>
                        <div class="product-descript">
                           <a class="produk-title" href="produk_detail?produk=<?= $data['id_produk'] ?>"> <?= $data['nama_produk'] ?></a>
                           <p><?= $data['deskripsi_produk'] ?></p>
                           <h5>Rp. <?= number_format($data['harga_produk'], 0, ".", ".") ?></h5>
                           <a href="produk_detail?produk=<?= $data['id_produk'] ?>">selengkapnya >></a>
                        </div>
                        <div class="action-button align-self-end">
                           <?php if (!isset($_SESSION['login'])) : ?>
                              <form action="" method="post">
                                 <button type="button" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart" data-toggle="modal" data-target="#form-input"></i></button>
                                 <button type="button" name="add_trolley" id="add_trolley" data-toggle="modal" data-target="#form-input" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php else : ?>
                              <form action="" method="post">
                                 <input type="hidden" name="username" id="username" value="<?= $username ?>">
                                 <input type="hidden" name="id_produk" id="id_produk" value="<?= $data['id_produk'] ?>">
                                 <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $data['nama_produk'] ?>">
                                 <input type="hidden" name="jumlah_produk" id="jumlah_produk" value="<?= $data['jumlah_produk'] ?>">
                                 <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                                 <button type="submit" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart"></i></button>
                                 <button type="submit" name="add_trolley" id="add_trolley" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php endif; ?>
                        </div>
                     </div>
                  <?php endforeach; ?>

                  <?php foreach ($sarung_rand as $data) : ?>
                     <div class="produk carousel-item d-flex">
                        <div class="d-flex justify-content-center overflow-hidden" style="width: 11em; height:11em;">
                           <img src="images/produk/<?= $data['kategori'] ?>/<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>" alt="mantap">
                        </div>
                        <div class="product-descript">
                           <a class="produk-title" href="produk_detail?produk=<?= $data['id_produk'] ?>"> <?= $data['nama_produk'] ?></a>
                           <p><?= $data['deskripsi_produk'] ?></p>
                           <h5>Rp. <?= number_format($data['harga_produk'], 0, ".", ".") ?></h5>
                           <a href="produk_detail?produk=<?= $data['id_produk'] ?>">selengkapnya >></a>
                        </div>
                        <div class="action-button align-self-end">
                           <?php if (!isset($_SESSION['login'])) : ?>
                              <form action="" method="post">
                                 <button type="button" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart btn" data-toggle="modal" data-target="#form-input"></i></button>
                                 <button type="button" name="add_trolley" id="add_trolley" data-toggle="modal" data-target="#form-input" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php else : ?>
                              <form action="" method="post">
                                 <input type="hidden" name="username" id="username" value="<?= $username ?>">
                                 <input type="hidden" name="id_produk" id="id_produk" value="<?= $data['id_produk'] ?>">
                                 <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $data['nama_produk'] ?>">
                                 <input type="hidden" name="jumlah_produk" id="jumlah_produk" value="<?= $data['jumlah_produk'] ?>">
                                 <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                                 <button type="submit" name="add_wishlist" id="add_wishlist" class="btn"><i class="heart-wishtlist fa fa-heart"></i></button>
                                 <button type="submit" name="add_trolley" id="add_trolley" class="btn"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                              </form>
                           <?php endif; ?>
                        </div>
                     </div>
                  <?php endforeach; ?>
                  <?= wishlist_trolley_added_notice() ?>

                  <a class="carousel-control-prev ml-n4" href="#carouselExampleFade4" role="button" data-slide="prev" style="color: grey;">
                     <span style="color: grey;" aria-hidden="true">
                        <i class="fa fa-chevron-left"></i>
                     </span>
                  </a>
                  <a class="carousel-control-next mr-n4" href="#carouselExampleFade4" role="button" data-slide="prev" style="color: grey;">
                     <span style="color: grey;" aria-hidden="true">
                        <i class="fa fa-chevron-right"></i>
                     </span>
                  </a>
               </div>
            </div>
         </div>

         <!-- ======================================= SIDEBAR ======================================== -->
         <div class="col-md-3 sidebar">
            <div class="testimoni">
               <img src="images/assets/Profile.jpg" alt="picture">
               <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae, nesciunt?</p>
            </div>

            <!-- <div class="article">
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
            </div> -->

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

   <script src="js/js/jquery-3.5.1.js"></script>
   <script src="js/js/jquery-3.5.1.min.js"></script>
   <script src="js/js/popper.min.js"></script>
   <script src="js/js/bootstrap.js"></script>
   <script src="js/js/bootstrap.min.js"></script>
   <!-- <script src="js/js/bootstrap.bundle.js"></script> -->
   <!-- <script src="js/js/bootstrap.bundle.min.js"></script> -->
   <script src="js/js/font-awesome.min.js"></script>
   <script src="js/script.js"></script>
</body>

</html>