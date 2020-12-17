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
               <tbody>
                  <th scope="row">
                     PG13451
                     <a href="#" class="card-link d-block upload-bukti-pembayaran">Upload Bukti <br> Pembayaran</a></th>
                  <td>
                     <a href="produk_detail.php" class="produk-title">produk1</a>
                     <a href="produk_detail.php" class="produk-title">produk1</a>
                     <a href="produk_detail.php" class="produk-title">produk1</a>
                  </td>
                  <td align="center" class="total-riwayat-pembelian">Rp. 467.000</td>
                  <td align="center">
                     <p class="status-pembayaran">Menunggu Pembayaran</p>
                  </td>
                  </tr>
               </tbody>
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