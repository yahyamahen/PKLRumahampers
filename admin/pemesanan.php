<?php
session_start();
require_once "function.php";
require_once "model.php";
if_not_login_back_to_login();

$pemesanan = read("SELECT * FROM pemesanan GROUP BY id_pemesanan ORDER BY waktu_pemesanan ASC;");

if (isset($_POST['search_btn'])) {
   $key = $_POST['keyword'];
   $pemesanan = read("SELECT * FROM pemesanan WHERE 
   id_pemesanan LIKE '%$key%' OR 
   username LIKE '%$key%'OR
   id_produk LIKE '%$key%' OR 
   resi_pengiriman LIKE '%$key%' OR
   status_pemesanan LIKE '%$key%';
;");
}

function pemesananNotice()
{
   global $conn;
   if (isset($_POST["update"])) {
      var_dump($_POST);
      if (updatePemesanan($_POST) > 0) {
         echo
            "<script>
               alert('Pemesanan berhasil diupdate');
               document.location.href = 'pemesanan';
            </script>";
      } else {
         echo
            "<script> 
               alert('Pemesanan tidak berhasil diupdate');
               document.location.href = 'pemesanan';
            </script>;";
         echo "Error : " . mysqli_error($conn);
      }
   }
}

if (isset($_GET['delete']) && isset($_GET['username'])) {
   $id_pemesanan = $_GET['delete'];
   $username = $_GET['username'];
   if (deletePemesanan($username, $id_pemesanan) > 0) {
      echo
         "<script>
            alert('Pemesanan berhasil dihapus');
            document.location.href='pemesanan';
         </script>";
   } else {
      echo
         "<script>
            alert('Pemesanan tidak berhasil dihapus : ');
            document.location.href='pemesanan';
         </sciprt>";
      echo "Error : " . mysqli_error($conn);
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
   <link rel="stylesheet" href="../css/bootstrap/bootstrap.css">
   <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <title>Kota Pengirman</title>

</head>

<body>
   <div class="row">
      <?php require_once "sidebar.php" ?>

      <div class="col-md-10">
         <div class="content">
            <h2 class="mt-1">Data Pemesanan Rumahampers</h2>
            <div class="row mt-3 table-main">
               <!-- <div class="col-md-4">
                  <button type="button" class="btn btn-info tombolTambahData mt-4" data-toggle="modal" data-target="#formModal-input">Tambah Kota Pengiriman</button>
               </div> -->
               <!-- <div class="col-md-4 d-flex mt-4">
                  <a class="card-link" href="kurir" class=" d-inline" for=""> <strong>Kurir</strong> </a>
                  <ul class="">
                     <?php foreach ($list_tujuan_pengiriman as $data) : ?>
                        <li class="d-inline mr-4"><a class=" card-link" href="kurir?kurir=<?= $data['provinsi'] ?>"><?= $data['provinsi'] ?></a></li>
                     <?php endforeach; ?>
                  </ul>
               </div> -->
               <div class="col-lg-4 mt-4">
                  <form action="" method="post">
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Pemesanan..." name="keyword" id="keyword" autocomplete="off">
                        <div class="input-group-append">
                           <button class="btn btn-outline-info" type="submit" id="search_btn" name="search_btn">Cari</button>
                        </div>
                     </div>
                  </form>
               </div>

               <table class="table mt-3">
                  <thead>
                     <tr>
                        <!-- <th>No</th> -->
                        <th>ID Pemesanan</th>
                        <th>Username</th>
                        <th>Resi Pengiriman</th>
                        <th>Total</th>
                        <th>Status Pemesanan</th>
                        <th>Bukti Pembayaran</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($pemesanan as $data) : ?>
                        <tr>
                           <!-- <th><?= $i; ?></th> -->
                           <td align="center" width="3%"><strong><?= $data['id_pemesanan'] ?></strong></td>
                           <td><?= $data['username'] ?></td>
                           <td align="center"><?= $data['resi_pengiriman'] ?></td>
                           <td width="15%" align="center">Rp. <?= number_format($data['total'], 0, ".", ".") ?></td>
                           <td align="center">
                              <?php if ($data['status_pemesanan'] == 'Menunggu Pembayaran') : ?>
                                 <?php
                                 $timestamp = strtotime($data['waktu_pemesanan']);
                                 $limitdate = date("d M Y H:i", $timestamp + 60 * 60 * 24 * 1);
                                 $curdate = date("d M Y H:i", time());
                                 ?>
                                 <?php if ($limitdate > $curdate) : ?>
                                    <?= $data['status_pemesanan'] ?>
                                    <?php if (trim($data['bukti_pembayaran']) == "") : ?>
                                       <!-- <button type="submit" name="upload_bukti_pembayaran_btn" id="upload_bukti_pembayaran_btn" class="btn mt-n4" style="font-size: 1em;">Upload</button> -->
                                    <?php endif; ?>
                                 <?php else : ?>
                                    <p style="color: red; font-size:0.8em; font-weight:500;">Expired</p>
                                 <?php endif; ?>
                              <?php else : ?>
                                 <?= $data['status_pemesanan'] ?>
                              <?php endif; ?>
                           </td>
                           <td align="center"><?= $data['bukti_pembayaran'] ?></td>
                           <td width="5%" class=" text-center">
                              <!-- <a class="badge badge-pill badge-primary ml-1" href="detail?id=<?= $data['id_tujuan'] ?>">Detail</a> -->
                              <a class="badge badge-pill badge-success ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal-input" href="pemesanan?update=<?= $data['id_pemesanan'] ?>&username=<?= $data['username']; ?>" data-id_pemesanan="<?= $data['id_pemesanan'] ?>" data-status_pemesanan="<?= $data['status_pemesanan'] ?>" data-username="<?= $data['username'] ?>">Update</a>
                              <a class=" badge badge-pill badge-danger ml-1" onclick="return confirm('Anda Yakin?');" href="pemesanan?delete=<?= $data['id_pemesanan'] ?>&username=<?= $data['username']; ?>">Hapus</a>
                           </td>
                        </tr>
                     <?php $i++;
                     endforeach; ?>

                  </tbody>
               </table>
            </div>
         </div>
      </div>

      <div class="modal fade" id="formModal-input" tabhome="-1" aria-labelledby="judulModal" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header d-flex justify-content-center">
                  <h5 class="modal-title" id="judulModal">Tambah Produk</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form action="" method="post">
                     <input type="hidden" name="id_pemesanan" id="id_pemesanan">
                     <input type="hidden" name="username" id="username">
                     <div class="form-group">
                        <label for="id_pemesanan">ID Pemesanan</label>
                        <input type="text" class="form-control" id="id_pemesanan" name="id_pemesanan" placeholder="id_pemesanan" autocomplete="off" disabled>
                     </div>

                     <div class="form-group">
                        <label for="username">ID Pemesanan</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username" autocomplete="off" disabled>
                     </div>

                     <div class="form-group">
                        <label for="status_pemesanan">Status Pemesanan</label>
                        <select class="form-control" id="status_pemesanan" name="status_pemesanan">
                           <option value="Menunggu Pembayaran">Menunggu Pembayaran</option>
                           <option value="Pemesanan Diproses">Pemesanan Diproses</option>
                           <option value="Proses Pengiriman">Proses Pengiriman</option>
                           <option value="Pesanan Selesai">Pesanan Selesai</option>
                           <option value="Expired">Expired</option>
                        </select>
                     </div>

                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="input" class="btn btn-primary">Tambah</button>
                     </div>
                  </form>
                  <?php pemesananNotice() ?>
               </div>
            </div>
         </div>
      </div>
      <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->

      <script src="../js/js/jquery-3.5.1.js"></script>
      <script src="../js/js/jquery-3.5.1.min.js"></script>
      <script src="../js/js/popper.min.js"></script>
      <script src="../js/js/bootstrap.js"></script>
      <script src="../js/js/bootstrap.min.js"></script>
      <!-- <script src="../js/js/bootstrap.bundle.js"></script> -->
      <!-- <script src="js/js/bootstrap.bundle.min.js"></script> -->
      <script src="../js/js/font-awesome.min.js"></script>

      <script>
         $(function() {
            $('.tombolTambahData').on('click', function() {
               $('#judulModal').html('Status Pemesanan');
               $('.modal-footer button[type=submit]').html('Tambah');
               $('.modal-footer button[type=submit]').addClass('btn btn-primary');
               $('#id_pemesanan').val('');
               $('#username').val('');
               $('#status_pemesanan').val('');
            });

            $('.tampilModalUbah').on('click', function() {
               $('#judulModal').html('Update Produk');
               $('.modal-footer button[type=submit]').addClass('btn btn-success');
               $('.modal-footer button[type=submit]').html('Update');
               $('.modal-footer button[type=submit]').attr('name', 'update');

               const id_pemesanan = $(this).data('id_pemesanan');
               const username = $(this).data('username');
               const status_pemesanan = $(this).data('status_pemesanan');

               $('.modal-body #id_pemesanan').val(id_pemesanan);
               $('.modal-body #username').val(username);
               $('.modal-body #status_pemesanan').val(status_pemesanan);
            });
         });
      </script>
</body>

</html>