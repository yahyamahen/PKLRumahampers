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
   <title>Detail Pemesanan</title>
</head>

<body>
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->
   <div class="container-main content">
      <div class="row">
         <a class="col-md-12 sub-title mb-3 mt-4" href="#">Detail Pemesanan</a>
      </div>

      <div class="row informasi-transaksi d-flex justify-content-between">
         <div class="col-md-7 detail-pemesanan p-4">
            <h5>Alamat Pengiriman</h5>
            <form action="" class="row g-3">
               <div class="col-md-12">
                  <label for="nama" class="form-label">Nama Lengkap *</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap Kamu" autocomplete="off">
               </div>
               <div class="col-md-12 mt-3">
                  <label for="email" class="form-label">Email *</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="email@mail.com" autocomplete="off">
               </div>
               <div class="col-md-12 mt-3">
                  <label for="password" class="form-label">Password *</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="**********" autocomplete="off">
               </div>
               <div class="col-md-12 mt-3">
                  <label for="no_telp" class="form-label">No. Handphone *</label>
                  <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="085777333888" autocomplete="off">
               </div>
               <div class="col-md-12 mt-3">
                  <label class="form-label">Alamat Pengiriman *</label>
               </div>
               <div class="col-md-4">
                  <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi">
               </div>
               <div class="col-md-4">
                  <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota/Kabupaten">
               </div>
               <div class="col-md-4">
                  <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan">
               </div>
               <div class="col-md-10 mt-3">
                  <input type="text" class="form-control alamat-lengkap" name="alamat" id="alamat" placeholder="Alamat Lengkap">
               </div>
               <div class="col-md-2 mt-3">
                  <input type="number" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" autocomplete="off">
               </div>
               <div class="col-md-12 mt-3">
                  <label for="catatan" class="form-label">Catatan Pemesanan *</label>
                  <input type="textarea" class="form-control catatan-pemesanan" name="catatan" id="catatan">
               </div>
            </form>
         </div>

         <div class="col-md-5 cart-detail p-4">
            <h5 class="mb-5">Pesanan Kamu</h5>
            <table class="table p-4">
               <thead>
                  <tr>
                     <th scope="col"></th>
                     <th scope="col">Nama Barang</th>
                     <th scope="col" align="center">QTY</th>
                     <th scope="col">Harga</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th scope="row"><input class="form-check-input mt-n1" type="checkbox" value="" checked></th>
                     <td>Barang1</td>
                     <td align="center"><input type="number" class="form-control form_pcs w-25" placeholder="pcs" value="1"></td>
                     <td>Rp. 300000</td>
                  </tr>
                  <tr>
                     <th scope="row"><input class="form-check-input mt-n1" type="checkbox" value="" checked></th>
                     <td>Barang2</td>
                     <td align="center"><input type="number" class="form-control form_pcs w-25" placeholder="pcs" value="1"></td>
                     <td>Rp. 300000</td>
                  </tr>
                  <tr>
                     <th scope="row"><input class="form-check-input  mt-n1" type="checkbox" value="" checked></th>
                     <td>Barang3</td>
                     <td align="center"><input type="number" class="form-control form_pcs w-25" placeholder="pcs" value="1"></td>
                     <td>Rp. 300000</td>
                  </tr>
               </tbody>
            </table>
            <p class="d-inline">total berat : 4.78kg</p>
            <div class="subtotal-body float-right">
               <span class="sub-total float">SUB-TOTAL<span class="total-harga">Rp. 178000</span></span>
            </div>
            <div class="kurir-pengiriman mt-5">
               <span class="float-left mr-3">kurir pengiriman</span>
               <ul class=" list-group">
                  <li class="list-inline">
                     <input class="mr-2" type="radio" name="kurir" id="kurir1" c>
                     <label for="kurir1">JNE - REG (1-3 Hari) Rp.19.000</label>
                  </li>
                  <li class="list-inline">
                     <input class="mr-2" type="radio" name="kurir" id="kurir2" c>
                     <label for="kurir2">JNE - REG (1-3 Hari) Rp.19.000</label>
                  </li>
               </ul>
            </div>
            <p class="d-inline">Total Pembayaran </p><span class="total-bayar ml-3"><strong> Rp. 157.000</strong> </span>

            <div class="pembayaran mt-3 ml-4">
               <input class="d-block form-check-input mt-2 mr-2" type="radio" value="" checked>
               <p>Pembayaran via transfer bank</p>
               <p class="pembayaran-text mt-n2">Lakukan pembayaran via transfer bank yang tersedia dan lakukan konfirmasi pembayaran. Selesaikan pembayaran sebelum 24 Jam atau pemesanan akan dibatalkan.</p>
            </div>

            <div class="persetujuan mt-3 ml-4">
               <input class="form-check-input mt-2" type="checkbox" value="">
               <p>Saya menyetujui ketentuan & Syarat</p>
            </div>

            <div class="text-center">
               <a href="detail_pembayaran.php" class=" card-link">
                  <button class="btn pesan-button mr-3 pt-2 pb-2" type="button">PESAN
                     <i class=" fa fa-shopping-cart"></i>
                  </button>
               </a>
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