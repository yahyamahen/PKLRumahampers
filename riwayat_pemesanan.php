<?php
session_start();
require_once "function.php";
require_once "resource/access.php";
require_once "model.php";
if_not_login_back_to_home();

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
   <title>Riwayat Pemesanan</title>

</head>

<body>
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->
   <div class="container-main content">
      <div class="col-md-10 m-auto">
         <div class="d-flex justify-content-center mt-5 mb-4">
            <h3 class="sub-title">Riwayat Pemesanan</h3>
         </div>
         <div class="riwayat-pemesanan mb-5">
            <table class="table">
               <thead>
                  <tr>
                     <th scope="col">Kode Pembayaran</th>
                     <th scope="col">Barang</th>
                     <th scope="col">Total</th>
                     <th scope="col">Status Pemesanan </th>
                  </tr>
               </thead>
               <?php foreach ($pemesanan as $data) : ?>
                  <tbody>
                     <form action="" method="post" enctype="multipart/form-data">
                        <th scope="row">
                           <?= $data['id_pemesanan'] ?>
                           <label for="bukti_pembayaran" class="card-link d-block upload-bukti-pembayaran">Upload Bukti <br> Pembayaran
                              <br><input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="ml-5 d-none"></label>

                        </th>
                     </form>
                     <td>
                        <?php
                        $produk_pemesanan = read("SELECT produk.nama_produk FROM produk, pemesanan WHERE pemesanan.id_produk = produk.id_produk && pemesanan.username = 'yahyamahen' && pemesanan.id_pemesanan = '" . $data['id_pemesanan'] . "';");
                        ?>
                        <?php foreach ($produk_pemesanan as $prd) : ?>
                           <a href=" produk_detail?produk=<?= $data['id_produk'] ?>" class="produk-title"><?= $prd['nama_produk'] ?></a>
                        <?php endforeach; ?>
                     </td>
                     <td align="center" class="total-riwayat-pembelian">Rp. <?= number_format($data['total'], 0, ".", ".") ?></td>
                     <td align="center">
                        <p class="status-pembayaran"><?= $data['status_pemesanan'] ?></p>
                     </td>
                     </tr>
                  </tbody>
               <?php endforeach; ?>
            </table>
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