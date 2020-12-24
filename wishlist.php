<?php
session_start();

require_once "function.php";
require_once "resource/access.php";
require_once "model.php";
if_not_login_back_to_home();

if (isset($_GET["id_produk"])) {
   $id_produk = $_GET['id_produk'];
   $username = $_SESSION["username"];
   if (delete_wishlist($username, $id_produk) > 0) {
      echo
         "<script>
            alert('Produk pada wishlist Terhapus');
            document.location.href='wishlist?wishlist=$username';
         </script>";
   } else {
      echo
         "<script>
            alert('Produk pada wishlist Tidak Dapat Terhapus');
            document.location.href='wishlist?wishlist=$username';
         </sciprt>";
      echo "<br> Error : " . mysqli_error($conn);
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
   <title>Wishlist</title>

</head>

<body class="white-bg">
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->
   <div class="container-main content">
      <div class="row justify-content-center d-flex flex-column">
         <div class="col-md-8 mt-5 align-self-center ">
            <div class="d-flex justify-content-center">
               <p class="sub-title align-self-center text-center">My Wishlist on Rumahampers</p>
            </div>

            <div class="table-responsive wishlist-table">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga Produk</th>
                        <th scope="col">Status Stok</th>
                        <th scope="col"></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($wishlist as $ws) : ?>
                        <tr>
                           <th scope="row"><?= $ws['id_produk'] ?></th>
                           <td class="d-flex">
                              <div class="float-left">
                                 <img class="mr-3" src="images/assets/Product1.png">
                              </div>
                              <a class="produk-title text-color align-self-center" href="produk_detail?produk=<?= $ws['id_produk'] ?>"><?= $ws['nama_produk']; ?></a>
                           </td>
                           <td class=" harga" align="center">Rp. <?= $ws['harga_produk']; ?>
                           </td>
                           <td class="stok" align="center"><?= $ws['jumlah_produk']; ?></td>
                           <td class="delete-wishlist" align="center"><a href="wishlist?id_produk=<?= $ws['id_produk'] ?>"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                     <?php $i++;
                     endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-md-12 image-bg">
            <p class="ml-3 mt-5 sub-title bt">Rekomendasi untuk kamu</p>
            <?php require_once "resource/recommended.php" ?>
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