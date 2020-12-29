<?php
session_start();
require_once "function.php";
require_once "model.php";

// if (!isset($_SESSION["login"])) {
//    header("Location: login");
//    exit;
// }

$list_tujuan_pengiriman = read("SELECT * FROM list_tujuan_pengiriman;");

if (isset($_POST['search_btn'])) {
   $key = $_POST['keyword'];
   $list_tujuan_pengiriman = read("SELECT * FROM list_tujuan_pengiriman WHERE 
   provinsi LIKE '%$key%' OR 
   kota LIKE '%$key%';");
}

function listTujuanNotice()
{
   global $conn;
   if (isset($_POST["input"])) {
      if (inputKota($_POST) == 1) {
         echo
            "<script>
               alert('Kota tujuan pengiriman berhasil ditambahkan');
               document.location.href = 'list_tujuan_pengiriman';
            </script>";
      } else {
         echo
            "<script> 
               alert('Kota tujuan pengiriman tidak dapat ditambahkan');
               document.location.href = 'list_tujuan_pengiriman';
            </script>;";
         echo "Error : " . mysqli_error($conn);
      }
   }

   if (isset($_POST["update"])) {
      if (updateKota($_POST) == 1) {
         echo
            "<script>
               alert('Kota tujuan pengiriman berhasil diupdate');
               document.location.href = 'list_tujuan_pengiriman';
            </script>";
      } else {
         echo
            "<script> 
               alert('Kota tujuan pengiriman tidak berhasil diupdate');
               document.location.href = 'list_tujuan_pengiriman';
            </script>;";
         echo "Error : " . mysqli_error($conn);
      }
   }
}

if (isset($_GET['delete'])) {
   $id = $_GET['delete'];
   if (deleteKota($id) > 0) {
      echo
         "<script>
            alert('Kota tujuan pengiriman  berhasil dihapus');
            document.location.href='list_tujuan_pengiriman';
         </script>";
   } else {
      echo
         "<script>
            alert('Kota tujuan pengiriman  tidak berhasil dihapus : ');
            document.location.href='list_tujuan_pengiriman';
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
            <h2 class="mt-1">Data Kota Pengiriman Rumahampers</h2>
            <div class="row mt-3 table-main">
               <div class="col-md-4">
                  <button type="button" class="btn btn-info tombolTambahData mt-4" data-toggle="modal" data-target="#formModal-input">Tambah Kota Pengiriman</button>
               </div>
               <div class="col-md-4 d-flex mt-4">
                  <!-- <a class="card-link" href="kurir" class=" d-inline" for=""> <strong>Kurir</strong> </a> -->
                  <!-- <ul class="">
                     <?php foreach ($list_tujuan_pengiriman as $data) : ?>
                        <li class="d-inline mr-4"><a class=" card-link" href="kurir?kurir=<?= $data['provinsi'] ?>"><?= $data['provinsi'] ?></a></li>
                     <?php endforeach; ?> -->
                  </ul>
               </div>
               <div class="col-lg-4 mt-4">
                  <form action="" method="post">
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Kurir..." name="keyword" id="keyword" autocomplete="off">
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
                        <th>ID Tujuan</th>
                        <th>Provinsi</th>
                        <th>Kota / Kabupaten</th>
                        <th>Harga Pengiriman</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($list_tujuan_pengiriman as $data) : ?>
                        <tr>
                           <!-- <th><?= $i; ?></th> -->
                           <td align="center" width="3%"><strong><?= $data['id_tujuan'] ?></strong></td>
                           <td><?= $data['provinsi'] ?></td>
                           <td align="center"><?= $data['kota'] ?></td>
                           <td align="center">Rp. <?= number_format($data['harga_pengiriman'], 0, ".", ".") ?></td>
                           <td width="5%" class=" text-center">
                              <!-- <a class="badge badge-pill badge-primary ml-1" href="detail?id=<?= $data['id_tujuan'] ?>">Detail</a> -->
                              <a class="badge badge-pill badge-success ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal-input" href="kurir?update=<?= $data['id_tujuan'] ?>" data-id_tujuan="<?= $data['id_tujuan'] ?>" data-provinsi="<?= $data['provinsi'] ?>" data-kota="<?= $data['kota'] ?>" data-harga_pengiriman="<?= $data['harga_pengiriman'] ?>">Update</a>
                              <a class="badge badge-pill badge-danger ml-1" onclick="return confirm('Anda Yakin?');" href="list_tujuan_pengiriman?delete=<?= $data['id_tujuan'] ?>">Hapus</a>
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
                     <input type="hidden" name="id_tujuan" id="id_tujuan">
                     <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi" autocomplete="off">
                     </div>

                     <div class="form-group">
                        <!-- <label class="float-right" style="font-size:0.8em" ;>Contoh : <strong>Cepat (1-3 Hari)</strong></label> -->
                        <label for="perusahaan">Kota / Kabupaten</label>
                        <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota / Kabupaten" autocomplete="off">
                     </div>

                     <!-- <div class="form-group">
                        <label for="perusahaan">Durasi Pengiriman</label>
                        <label class="float-right" style="font-size:0.8em" ;>Contoh : <strong>1 - 3 Hari</strong></label>
                        <input type="text" class="form-control" id="durasi_pengiriman" name="durasi_pengiriman" placeholder="Durasi Pengiriman" autocomplete="off">
                     </div> -->

                     <div class="form-group">
                        <label for="harga_pengiriman">Harga Pengiriman Kota</label>
                        <input type="number" class="form-control" id="harga_pengiriman" name="harga_pengiriman" placeholder="Harga Pengiriman Kota" autocomplete="off" min="0">
                     </div>

                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="input" class="btn btn-primary">Tambah</button>
                     </div>
                  </form>
                  <?php listTujuanNotice() ?>
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
               $('#judulModal').html('Tambah Kota Pengiriman');
               $('.modal-footer button[type=submit]').html('Tambah');
               $('.modal-footer button[type=submit]').addClass('btn btn-primary');
               $('#provinsi').val('');
               $('#kota').val('');
               $('#harga_pengiriman').val('');
            });

            $('.tampilModalUbah').on('click', function() {
               $('#judulModal').html('Update Kota Pengiriman');
               $('.modal-footer button[type=submit]').addClass('btn btn-success');
               $('.modal-footer button[type=submit]').html('Update');
               $('.modal-footer button[type=submit]').attr('name', 'update');

               const id_tujuan = $(this).data('id_tujuan');
               const provinsi = $(this).data('provinsi');
               const kota = $(this).data('kota');
               const harga_pengiriman = $(this).data('harga_pengiriman');

               $('.modal-body #id_tujuan').val(id_tujuan);
               $('.modal-body #provinsi').val(provinsi);
               $('.modal-body #kota').val(kota);
               $('.modal-body #harga_pengiriman').val(harga_pengiriman);
            });
         });
      </script>
</body>

</html>