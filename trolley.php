<?php
session_start();
require_once "function.php";
require_once "resource/access.php";
require_once "model.php";
if_not_login_back_to_home();

if (isset($_GET["id_produk"])) {
   $id_produk = $_GET['id_produk'];
   $username = $_SESSION["username"];
   if (delete_trolley($username, $id_produk) > 0) {
      echo
      "<script>
            alert('Produk pada trolley Terhapus');
            document.location.href='trolley?trolley=$username';
         </script>";
      // header('Location: trolley?trolley=$username');
   } else {
      echo
      "<script>
            alert('Produk pada trolley Tidak Dapat Terhapus " . "<br> Error : " . mysqli_error($conn) . "');
            document.location.href='trolley?trolley=$username';
         </sciprt>";
      // header('Location: trolley?trolley=$username');
   }
}

if (isset($_POST["update_cart"]) || isset($_POST["update_cart2"])) {
   if (update_cart($_POST) > 0) {
      echo
      "<script>
            // alert('Trolley diperbarui');
            document.location.href='trolley?trolley=" . $username . "';
         </script>";
   } else {
      echo
      "<script>
            // alert('Trolley diperbarui');
            document.location.href='trolley?trolley=" . $username . "';
         </script>";
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
   <title>Trolley</title>

</head>

<body class="white-bg">
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->
   <div class="container-main content">
      <div class="row">
         <div class="col-md-12 mt-5 align-self-center mb-5">
            <div class="d-flex justify-content-center">
               <p class="sub-title align-self-center text-center">My Trolley on Rumahampers</p>
            </div>

            <div class="trolley-table mt-5">
               <form action="" method="post">
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
                        foreach ($trolley as $data) : ?>
                           <tr>
                              <input type="hidden" name="id[]" id="id" value="<?= $data['id'] ?>">
                              <input type="hidden" name="username[]" id="username" value="<?= $data['username'] ?>">
                              <input type="hidden" name="id_produk[]" id="id_produk" value="<?= $data['id_produk'] ?>">
                              <input type="hidden" name="nama_produk[]" id="nama_produk" value="<?= $data['nama_produk'] ?>">
                              <input type="hidden" name="jumlah_produk[]" id="jumlah_produk" value="<?= $data['jumlah_produk'] ?>">
                              <th scope="row"><?= $data['id_produk'] ?></th>
                              <td class="d-flex">
                                 <div class="float-left d-flex justify-content-center square">
                                    <img class="mr-3 flex-shrink-0" src="images/produk/<?= $data['kategori'] ?>/<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>">
                                 </div>
                                 <a class="produk-title text-color align-self-center" href="produk_detail?produk=<?= $data['id_produk']; ?>"><?= $data['nama_produk']; ?><p class="" style="font-size: 0.9em; color:grey"> Stok <= <?= $data['jumlah_produk'] ?></p> </a>
                              </td>
                              <td class="harga" align="center">Rp. <?= number_format($data['harga_produk'], 0, ".", "."); ?>
                              </td>
                              <td class="stok-trolley" align="center">
                                 <div class="input-group">
                                    <button class="ml-2 btn btn-outline-secondary button-minus" data-field="total_pcs[]" type="button">-</button>
                                    <input type="text" class="form-control quantity-field" placeholder="<?= $data['total_pcs'] ?>" value="<?= $data['total_pcs'] ?>" name="total_pcs[]" step="1" min="1" max="">
                                    <button class="btn btn-outline-secondary button-plus" data-field="total_pcs[]" type="button">+</button>
                                 </div>
                              <td class="jumlah-trolley harga" align="center">Rp. <?= number_format($data['total_pcs'] * $data['harga_produk'], 0, ".", "."); ?></td>
                              <td class="delete-trolley" align="center"><a href="trolley?id_produk=<?= $data['id_produk'] ?>" onclick="confirm('Ingin menghapus dari trolley?');"><i class="far fa-trash-alt"></i></a></td>
                           </tr>
                        <?php $i++;
                        endforeach; ?>
                     </tbody>
                  </table>
                  <a class="nav-link ml-4 d-inline"><input style="font-weight: 700;" type="submit" class="btn" name="update_cart2" id="update_cart2" value="Update Cart"></a>
                  <div class="subtotal-body float-right mr-4">
                     <?php foreach ($total_cart as $data) : ?>
                        <span class="sub-total pl-3">SUB-TOTAL<button type="submit" class="btn total-harga mt-n1 mr-n1 ml-2" name="update_cart" id="update_cart">Rp. <?= number_format($data['total_cart'], 0, ".", ".") ?></button></span>
                     <?php endforeach; ?>
                  </div>
               </form>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-md-12 image-bg">
            <p class="ml-3 mt-4 sub-title bt">Rekomendasi untuk kamu</p>
            <?php require_once "resource/recommended.php" ?>
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