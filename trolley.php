<?php
session_start();
require_once "function.php";
require_once "resource/access.php";
require_once "model.php";

if (isset($_GET["id_produk"])) {
   $id_produk = $_GET['id_produk'];
   $username = $_SESSION["username"];
   if (delete_trolley($username, $id_produk) > 0) {
      echo
         "<script>
		alert('Produk pada trolley Terhapus');
      </script>";
      header("Location: trolley.php?trolley=$username");
   } else {
      echo
         "<script>
		alert('Produk pada trolley Tidak Dapat Terhapus');
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
   <title>Trolley</title>

</head>

<body class="white-bg">
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->
   <div class="container-main content">
      <div class="row justify-content-center d-flex flex-column">
         <div class="col-md-9 mt-5 align-self-center mb-5">
            <div class="d-flex justify-content-center">
               <p class="sub-title align-self-center text-center">My Trolley on Rumahampers</p>
            </div>

            <div class="trolley-table mt-5">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga Produk</th>
                        <th scope="col">Jumlah Pesan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col"></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($trolley as $tr) : ?>
                        <tr>
                           <th scope="row"><?= $tr['id_produk'] ?></th>
                           <td class="d-flex">
                              <div class="float-left">
                                 <img class="mr-3" src="images/assets/Product1.png">
                              </div>
                              <a class="produk-title text-color align-self-center" href="produk_detail.php?produk=<?= $tr['id_produk']; ?>"><?= $tr['nama_produk']; ?></a>
                           </td>
                           <td class="harga" align="center">Rp. <?= $tr['harga_produk']; ?></td>
                           <td class="stok-trolley" align="center">
                              <div class="input-group">
                                 <button class="ml-2 btn btn-outline-secondary add_pcs" type="button">-</button>
                                 <input type="number" class="form-control form_pcs" placeholder="pcs" name="form_pcs" value="<?= $tr['total_pcs'] ?>">
                                 <button class="btn btn-outline-secondary rmv_pcs" type="button">+</button>
                              </div>
                           <td class="jumlah-trolley harga" align="center">Rp. <?= $tr['total_pcs'] * $tr['harga_produk']; ?></td>
                           <td class="delete-trolley" align="center"><a href="trolley.php?id_produk=<?= $tr['id_produk'] ?>" onclick="confirm('Ingin menghapus dari trolley?');"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                     <?php $i++;
                     endforeach; ?>
                  </tbody>
               </table>
               <?php foreach ($total_cart as $t_cart) : ?>
                  <div class="total-bayar float-right mr-5">
                     <h5 class=" d-inline mr-2">Total Bayar</h5>
                     <h5 class="harga d-inline">Rp. <?= $t_cart['total_cart'] ?></h5>
                  </div>
               <?php endforeach; ?>
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