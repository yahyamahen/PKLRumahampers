<?php
session_start();
require_once "function.php";
require_once "resource/access.php";
require_once "model.php";
if_not_login_back_to_home();

if (isset($_POST["upload_bukti_pembayaran_btn"])) {
   if (update_pemesanan($_POST) > 0) {
      echo
         "<script>
            alert('Berhasil upload bukti pembayaran');
            document.location.href = 'riwayat_pemesanan?username=" . $username . "';
		</script>";
   } else {
      echo
         "<script>
         alert('Tidak berhasil upload bukti pembayaran');
			document.location.href = 'riwayat_pemesanan?username=" . $username . "';
		</script>";
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
   <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
   <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
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
                           <?php if ($data['status_pemesanan'] == 'Menunggu Pembayaran') : ?>
                              <?php
                              $timestamp = strtotime($data['waktu_pemesanan']);
                              $limitdate = date("d M Y H:i", $timestamp + 60 * 60 * 24 * 1);
                              $curdate = date("d M Y H:i", time());
                              ?>
                              <?php if ($limitdate > $curdate) : ?>
                                 <?php if (trim($data['bukti_pembayaran']) == "") : ?>
                                    <input type="hidden" name="username" id="username" value="<?= $data['username'] ?>">
                                    <input type="hidden" name="id_pemesanan" id="id_pemesanan" value="<?= $data['id_pemesanan'] ?>">
                                    <input type="hidden" name="status_pemesanan" id="status_pemesanan" value="<?= $data['status_pemesanan'] ?>">
                                    <input type="hidden" name="bukti_pembayaran_lama" id="bukti_pembayaran_lama" value="<?= $data['bukti_pembayaran'] ?>">
                                    <label for="gambar" class="card-link d-block upload-bukti-pembayaran" style="font-size: 0.8em;" style="font-size:0.5em;">Upload Bukti<br> Pembayaran<br><input type="file" name="gambar" id="gambar" class="ml-5 d-none"></label>
                                    <button type="submit" name="upload_bukti_pembayaran_btn" id="upload_bukti_pembayaran_btn" class="btn mt-n4" style="font-size: 0.9em;">Upload</button>
                                 <?php endif; ?>
                              <?php else : ?>
                                 <p style="color: red; font-size:0.8em; font-weight:500;">Expired</p>
                              <?php endif; ?>
                           <?php elseif ($data['status_pemesanan'] == 'Menunggu Konfirmasi Pembayaran') : ?>
                              <?php if (trim($data['bukti_pembayaran']) != "") : ?>
                                 <a class="mt-n2 nav-link tombolUpdateBukti" data-toggle="modal" data-target="#formModal-bukti" style="font-size:0.9em; font-weight:7 00;" href="" data-id_pemesanan="<?= $data['id_pemesanan'] ?>" data-username="<?= $data['username'] ?>" data-status_pemesanan="<?= $data['status_pemesanan'] ?>" data-bukti_pembayaran="<?= $data['bukti_pembayaran'] ?>">Terupload</a>
                              <?php else : ?>
                                 <p style="font-size:0.8em; font-weight:500;"><?= $data['bukti_pembayaran'] ?></p>
                              <?php endif; ?>
                           <?php else : ?>
                              <?php if (trim($data['bukti_pembayaran']) != "") : ?>
                                 <a class="mt-n2 nav-link tombolLihatBukti" data-toggle="modal" data-target="#formModal-bukti" style="font-size:0.9em; font-weight:7 00;" href="" data-id_pemesanan="<?= $data['id_pemesanan'] ?>" data-username="<?= $data['username'] ?>" data-status_pemesanan="<?= $data['status_pemesanan'] ?>" data-bukti_pembayaran="<?= $data['bukti_pembayaran'] ?>">Terupload</a>
                              <?php else : ?>
                                 <p style="font-size:0.8em; font-weight:500;"><?= $data['bukti_pembayaran'] ?></p>
                              <?php endif; ?>
                           <?php endif; ?>
                        </th>
                     </form>
                     <td>
                        <?php
                        $produk_pemesanan = read("SELECT produk.nama_produk FROM produk, pemesanan WHERE pemesanan.id_produk = produk.id_produk && pemesanan.username = '$username' && pemesanan.id_pemesanan = '" . $data['id_pemesanan'] . "';");
                        ?>
                        <?php foreach ($produk_pemesanan as $prd) : ?>
                           <a href=" produk_detail?produk=<?= $data['id_produk'] ?>" class="produk-title"><?= $prd['nama_produk'] ?></a>
                        <?php endforeach; ?>
                     </td>
                     <td align="center" class="total-riwayat-pembelian">Rp. <?= number_format($data['total'], 0, ".", ".") ?></td>
                     <td width="32%" align="center">
                        <?php if ($data['status_pemesanan'] == 'Menunggu Pembayaran') : ?>
                           <?php
                           $timestamp = strtotime($data['waktu_pemesanan']);
                           $curdate = date("d M Y H:i", time());
                           $limitdate = date("d M Y H:i", $timestamp + 60 * 60 * 24 * 1);
                           ?>
                           <?php if ($limitdate > $curdate) : ?>
                              <div class="status-pembayaran mt-3"><a class="card-link" href="detail_pembayaran?pemesanan=<?= $data['id_pemesanan'] ?>"><?= $data['status_pemesanan'] ?></a></div>
                              <p>Sebelum <?= $limitdate ?></p>
                           <?php else : ?>
                              <p class="status-pembayaran mt-3">Expired</p>
                           <?php endif; ?>
                        <?php elseif ($data['status_pemesanan'] == 'Proses Pengiriman') : ?>
                           <p class="status-pembayaran mt-2"><?= $data['status_pemesanan'] ?> </p>
                           <p class="mt-n3" style="font-size: 0.9em;">Resi : <?= $data['resi_pengiriman'] ?> </p>
                        <?php else : ?>
                           <p class="status-pembayaran mt-2"><?= $data['status_pemesanan'] ?> </p>
                        <?php endif; ?>
                     </td>
                     </tr>
                  </tbody>
               <?php endforeach; ?>
            </table>
         </div>
      </div>
   </div>

   <div class="modal fade" id="formModal-bukti" tabhome="-1" aria-labelledby="judulModal" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title ml-0" id="judulModal">BUKTI UPLOAD PEMBAYARAN</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id_pemesanan" id="id_pemesanan">
                  <input type="hidden" name="username" id="username">
                  <input type="hidden" name="status_pemesanan" id="status_pemesanan">
                  <input type="hidden" name="bukti_pembayaran_lama" id="bukti_pembayaran_lama">

                  <div class="form-group">
                     <label for="id_pemesanan">ID Pemesanan</label>
                     <input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan" placeholder="ID Pemesanan" disabled>
                  </div>

                  <div class="form-group">
                     <label for="bukti_pembayaran">Bukti Pembayaran</label>
                     <input type="text" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" placeholder="Bukti Pembayaran" disabled>
                  </div>

                  <div class="list-gambar d-flex list-inline justify-content-center flex-row">
                     <div class="d-flex justify-content-center flex-column overflow-hidden" style="margin:auto; width: 10em;">
                        <img style="width: 10em;" class="img" src="" alt="">
                     </div>
                  </div>

                  <div class="form-group m-auto hide-content">
                     <label for="gambar" class="d-block">Update Bukti Pembayaran</label>
                     <input type="file" class="" id="gambar" name="gambar" placeholder="Foto Produk">
                  </div>

                  <div class="modal-footer hide-content">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" name="upload_bukti_pembayaran_btn" class="btn btn-danger">Update</button>
                  </div>
               </form>
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

   <script>
      // jQuery Update Bukti Pembayaran
      $(function() {
         $('.tombolUpdateBukti').on('click', function() {
            $('#judulModal').html('Update Bukti Pembayaran');
            $('#formModal-bukti .hide-content').removeClass('d-none');

            const username = $(this).data('username');
            const id_pemesanan = $(this).data('id_pemesanan');
            const status_pemesanan = $(this).data('status_pemesanan');
            const bukti_pembayaran = $(this).data('bukti_pembayaran');

            $('#formModal-bukti .modal-body #id_pemesanan').val(id_pemesanan);
            $('#formModal-bukti .modal-body #username').val(username);
            $('#formModal-bukti .modal-body #status_pemesanan').val(status_pemesanan);
            $('#formModal-bukti .modal-body #bukti_pembayaran_lama').val(bukti_pembayaran);
            $('#formModal-bukti .modal-body #bukti_pembayaran').val(bukti_pembayaran);
            $("#formModal-bukti .modal-body .img").attr('src', 'images/customers/' + username + '/' + bukti_pembayaran);
            $("#formModal-bukti .modal-body .img").attr('alt', bukti_pembayaran);
         });

         $('.tombolLihatBukti').on('click', function() {
            $('#judulModal').html('Lihat Bukti Pembayaran');
            $('#formModal-bukti .hide-content').addClass('d-none');

            const username = $(this).data('username');
            const id_pemesanan = $(this).data('id_pemesanan');
            const status_pemesanan = $(this).data('status_pemesanan');
            const bukti_pembayaran = $(this).data('bukti_pembayaran');

            $('#formModal-bukti .modal-body #id_pemesanan').val(id_pemesanan);
            $('#formModal-bukti .modal-body #username').val(username);
            $('#formModal-bukti .modal-body #status_pemesanan').val(status_pemesanan);
            $('#formModal-bukti .modal-body #bukti_pembayaran_lama').val(bukti_pembayaran);
            $('#formModal-bukti .modal-body #bukti_pembayaran').val(bukti_pembayaran);
            $("#formModal-bukti .modal-body .img").attr('src', 'images/customers/' + username + '/' + bukti_pembayaran);
            $("#formModal-bukti .modal-body .img").attr('alt', bukti_pembayaran);
         });
      });
   </script>
</body>

</html>