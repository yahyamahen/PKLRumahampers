<?php
session_start();
require_once "function.php";
require_once "resource/access.php";
require_once "model.php";
if_not_login_back_to_home();

if (isset($_POST["edit_alamat"])) {
   if (update_alamat($_POST) > 0) {
      echo
         "<script>
            alert('Data Alamat Customers Diperbarui');
            document.location.href = 'detail_pemesanan?id_kurir';
         </script>";
   } else {
      echo
         "<script>
            alert('Data Customers Tidak Berhasil Diupdate');
         </script>";
      echo "<br> Error : " . mysqli_error($conn);
   }
}

if (isset($_GET["cart"])) {
   $id_produk = $_GET['cart'];
   $username = $_SESSION["username"];
   if (delete_trolley($username, $id_produk) > 0) {
      echo
         "<script>
            alert('Produk pada cart Terhapus');
            document.location.href='detail_pemesanan?id_kurir';
         </script>";
   } else {
      echo
         "<script>
            alert('Produk pada cart Tidak Dapat Terhapus');
            document.location.href='detail_pemesanan?id_kurir'';
         </sciprt>";
      echo "<br> Error : " . mysqli_error($conn);
   }
}

if (isset($_POST["update_cart"]) || isset($_POST["update_cart2"])) {
   if (update_cart($_POST) > 0) {
      echo
         "<script>
            alert('Cart diperbarui');
            document.location.href = 'detail_pemesanan?id_kurir';
         </script>";
   } else {
      echo
         "<script>
            alert('Cart tidak diperbarui');
            document.location.href = 'detail_pemesanan?id_kurir';
         </script>";
   }
}

if (isset($_GET['id_kurir'])) {
   $id_kurir = $_GET['id_kurir'];
   $total_checkout = read("SELECT id_kurir, nama_kurir, harga_per_4_kg FROM kurir WHERE id_kurir = '$id_kurir'");
}

if (isset($_POST["submit_pesan"])) {
   if (!isset($_POST['setuju'])) {
      echo
         "<script>
            alert('Checklist setuju persyaratan dan ketentuan');
            document.location.href = 'detail_pemesanan?id_kurir';
         </script>";
   } else {
      if (trim($_GET['id_kurir']) == "") {
         echo
            "<script>
               alert('Pilih kurir pengiriman');
               document.location.href = 'detail_pemesanan?id_kurir';
            </script>";
      } else {
         if (insert_pemesanan($_POST) > 0) {
            echo
               "<script>
                  alert('Terimakasih telah berbelanja di Rumahampers');
                  document.location.href = 'detail_pembayaran?pemesanan=';
               </script>";
         } else {
            echo
               "<script>
                  alert('Pemesanan tidak dapat dilakukan');
                  document.location.href = 'detail_pemesanan?id_kurir';
               </script>";
         }
      }
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

      <form action="" class="" method="POST">
         <div class="row informasi-transaksi d-flex justify-content-between">
            <div class="col-md-6 detail-pemesanan p-4">
               <h5>Alamat Pengiriman</h5>
               <form action="" class="row g-3" method="POST">
                  <?php foreach ($user as $data) : ?>
                     <input type="hidden" name="id_user" id="id_user" value="<?= $data['username'] ?>">
                     <div class="col-md-12">
                        <label for="nama" class="form-label">Nama Lengkap *</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap Kamu" autocomplete="off" value="<?= $data['nama_lengkap'] ?>" required>
                     </div>

                     <div class="col-md-12 mt-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email@mail.com" autocomplete="off" value="<?= $data['email'] ?>" required>
                     </div>

                     <div class="col-md-12 mt-3">
                        <label for="no_telp" class="form-label">No. Handphone *</label>
                        <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="085777333888" autocomplete="off" value="<?= $data['no_telp'] ?>" required min="0">
                     </div>

                     <div class="col-md-12 mt-3">
                        <label class="form-label">Alamat Pengiriman *</label>
                     </div>

                     <div class="col-md-12 d-flex">
                        <input type="text" class="form-control ml-1 mr-1" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?= $data['provinsi'] ?>" required>

                        <input type="text" class="form-control ml-1 mr-1" name="kota" id="kota" placeholder="Kota/Kabupaten" value="<?= $data['kota'] ?>" required>

                        <input type="text" class="form-control ml-1 mr-1" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?= $data['kecamatan'] ?>" required>
                     </div>

                     <div class="col-md-12 mt-3 d-flex">
                        <textarea rows="4" class="form-control alamat-lengkap ml-1 mr-1" name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat Lengkap"><?= $data['alamat_lengkap'] ?></textarea>

                        <input type="number" class="form-control w-25 ml-1 mr-1" name="kodepos" id="kodepos" placeholder="Kode Pos" autocomplete="off" value="<?= $data['kodepos'] ?>" min="0">
                     </div>

                     <div class="col-md-12 mt-3">
                        <label for="catatan" class="form-label">Catatan Pemesanan</label>
                        <textarea rows="4" class="form-control catatan-pemesanan" name="catatan_pemesanan" id="catatan_pemesanan" placeholder="Catatan Pemesanan"></textarea>
                     </div>

                     <?php if (trim($data['kota']) == "") : ?>
                        <div class="col-md-12 mt-3 d-flex">
                           <p style="font-size: 0.8em;">Data alamat akan otomatis diperbarui diprofil</p>
                           <button type="submit" name="edit_alamat" class="btn btn-outline-secondary float-right">PERBARUI BIODATA PENGIRIMAN</button>
                        </div>
                     <?php else : ?>
                        <div class="col-md-12 mt-3 d-flex justify-content-between">
                           <p style="font-size: 0.8em;">Data alamat akan otomatis diperbarui diprofil</p>
                           <button type="submit" name="edit_alamat" class="btn btn-outline-secondary float-right">PERBARUI BIODATA PENGIRIMAN</button>
                        </div>
                     <?php endif; ?>
                  <?php endforeach; ?>
               </form>
            </div>

            <div class="col-md-6 cart-detail p-4">
               <h5 class="mb-4">Pesanan Kamu</h5>
               <form action="" method="POST">
                  <table class="table p-4">
                     <thead>
                        <tr>
                           <th scope="col">Nama Barang</th>
                           <th scope="col" align="center">QTY</th>
                           <th scope="col">Harga</th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($trolley as $data) : ?>
                           <input type="hidden" name="id[]" id="id" value="<?= $data['id'] ?>">
                           <input type="hidden" name="id_produk[]" value="<?= $data['id_produk'] ?>">
                           <input type="hidden" name="nama_produk[]" value="<?= $data['nama_produk'] ?>">
                           <input type="hidden" name="jumlah_produk[]" value="<?= $data['jumlah_produk'] ?>">
                           <input type="hidden" name="username[]" id="username" value="<?= $data['username'] ?>">
                           <tr>
                              <td><a href="produk_detail?produk=<?= $data['id_produk'] ?>" class="produk-title" style="font-size: 1em;"><?= $data['nama_produk'] ?></a> <br> (Rp. <?= number_format($data['harga_produk']) ?>)</td>
                              <td align="center"><input type="number" class="form-control form_pcs w-25" name="total_pcs[]" value="<?= $data['total_pcs'] ?>" min="1"></td>
                              <td>Rp. <?php $harga_sum = $data['harga_produk'] * $data['total_pcs'];
                                       echo number_format($harga_sum);  ?>
                              </td>
                              <td scope="row"><a href="detail_pemesanan?cart=<?= $data['id_produk'] ?>" onclick="confirm('Ingin menghapus dari trolley?');"><i class="far fa-trash-alt"></i></a></td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
                  <?php foreach ($total_berat as $data) : ?>
                     <p class="d-inline">total berat : <strong><?php
                                                               $berat_total = $data['total_berat'];
                                                               echo number_format($berat_total, 2); ?> Kg</strong> </p>
                  <?php endforeach; ?>
                  <a href="" class="nav-link ml-1 d-inline"><input style="font-weight: 700;" type="submit" class="btn" name="update_cart2" id="update_cart2" value="Update Cart"></a>
                  <div class="subtotal-body float-right mr-4">
                     <?php foreach ($total_cart as $data) : ?>
                        <span class="sub-total pl-3">SUB-TOTAL<button type="submit" class="btn total-harga mt-n1 mr-n1 ml-2" name="update_cart" id="update_cart">Rp. <?= number_format($data['total_cart']) ?></button></span>
                     <?php endforeach; ?>
                  </div>
               </form>
               <div class="kurir-pengiriman mt-3">
                  <?php foreach ($harga_pengiriman as $total) : ?>
                     <?php if ($total['kota_customers'] == '') : ?>
                        <p>Masukan Kota Pengiriman</p>
                     <?php else : ?>
                        <?php if (strcmp($total['kota_pengiriman'], $total['kota_customers']) == 1) {
                           $harga_kirim_kota = 0; ?>
                           <p>Tujuan Pengiriman : <strong><?= $total['kota_customers'] ?></strong> Belum Tersedia</p>
                        <?php } else {
                           $harga_kirim_kota = $total['harga_pengiriman']; ?>
                           <p>Tujuan Pengiriman : <strong><?= $total['kota_customers'] ?></strong></p>
                           <p class="float-left mr-3">kurir pengiriman : </p>
                           <ul class=" list-group mb-3">
                              <?php foreach ($kurir as $data) : ?>
                                 <li class="list-inline mb-2">
                                    <!-- <input type="hidden" name="id_kurir" id="id_kurir" value="<?= $data['id_kurir'] ?>"> -->
                                    <a href="detail_pemesanan?id_kurir=<?= $data['id_kurir'] ?>" class="text-decoration-none mt-1"> <strong><?= $data['nama_kurir'] ?></strong> - <?= $data['tipe_pengiriman'] ?> (Rp.
                                       <?php
                                       $harga_kirim = $harga_kirim_kota + ($data['harga_per_4_kg']);
                                       // if ($berat_total > 4 && $berat_total < 8) {
                                       //    $harga_kirim = $harga_kirim + ($data['harga_per_4_kg']);
                                       // } else if ($berat_total > 8 && $berat_total < 12) {
                                       //    $harga_kirim = $harga_kirim + ($data['harga_per_4_kg']) * 2;
                                       // }
                                       ?>
                                       <?= $harga_kirim ?>)
                                       <!-- <input type="submit" class="btn" name="select_kurir" name="select_kurir" value=""> -->
                                    </a>
                                 </li>
                              <?php endforeach; ?>
                           <?php } ?>
                        <?php endif; ?>
                     <?php endforeach; ?>
                           </ul>
               </div>
               <?php foreach ($total_cart as $data) : ?>
                  <?php foreach ($total_checkout as $checkout) : ?>
                     <?php if ($_GET['id_kurir'] = '') : ?>
                        <p class="d-inline">Total Pembayaran </p><span class="total-bayar ml-3"><strong> Pilih kurir </strong> </span>
                     <?php else : ?>
                        <p class="d-inline">Total Pembayaran </p><span class="total-bayar ml-3"><strong>Rp.
                              <?php
                              $biaya_kurir = $checkout['harga_per_4_kg'];
                              $checkout_pay = $data['total_cart'] + $biaya_kurir + $harga_kirim_kota;

                              echo number_format($checkout_pay);
                              ?> </strong></span>
                     <?php endif; ?>
                  <?php endforeach; ?>
               <?php endforeach; ?>

               <div class="pembayaran mt-3 ml-4">
                  <input class="d-block form-check-input mt-2 mr-2" type="radio" value="Transfer Bank" name="bank_pembayaran" id="transfer-bank" checked>
                  <label for="transfer-bank">Pembayaran via transfer bank</label>
                  <p class="pembayaran-text mt-n1">Lakukan pembayaran via transfer bank yang tersedia dan lakukan konfirmasi pembayaran. Selesaikan pembayaran sebelum 24 Jam atau pemesanan akan dibatalkan.</p>
               </div>

               <div class="persetujuan mt-3 ml-4 mb-2">
                  <input class="form-check-input mt-2" type="checkbox" name="setuju" id="setuju">
                  <label for="setuju">Saya menyetujui ketentuan & Syarat</label>
               </div>

               <div class="text-center">
                  <?php foreach ($user as $data) : ?>
                     <input type="hidden" name="username" id="username" value="<?= $data['username'] ?>">
                  <?php endforeach; ?>

                  <?php foreach ($trolley as $data) : ?>
                     <input type="hidden" name="id_produk_pesan[]" id="id_produk_pesan" value="<?= $data['id_produk'] ?>">
                     <input type="hidden" name="total_pcs[]" id="total_pcs" value="<?= $data['total_pcs'] ?>">
                  <?php endforeach; ?>

                  <?php foreach ($total_checkout as $data) : ?>
                     <input type="hidden" name="id_kurir" id="id_kurir" value="<?= $data['id_kurir'] ?>">
                     <input type="hidden" name="nama_kurir" id="nama_kurir" value="<?= $data['nama_kurir'] ?>">
                  <?php endforeach; ?>

                  <?php foreach ($harga_pengiriman as $data) : ?>
                     <input type="hidden" name="id_tujuan" id="id_tujuan" value="<?= $data['id_tujuan'] ?>">
                     <input type="hidden" name="tujuan_pengiriman" id="tujuan_pengiriman" value="<?= $data['kota'] ?>">
                  <?php endforeach; ?>

                  <input type="hidden" name="id_pemesanan" id="id_pemesanan">
                  <input type="hidden" name="total_harga_pengiriman" id="total_harga_pengiriman" value="<?= $harga_kirim_kota + $biaya_kurir ?>">
                  <input type="hidden" name="total" id="total" value="<?= $checkout_pay ?>">

                  <button class="btn pesan-button mr-3 pt-2 pb-2" type="submit" name="submit_pesan" name="submit_pesan">PESAN
                     <i class=" fa fa-shopping-cart"></i>
                  </button>
               </div>
            </div>
      </form>
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