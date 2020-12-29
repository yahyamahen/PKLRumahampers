<?php
session_start();
require_once "function.php";
require_once "model.php";

// if (!isset($_SESSION["login"])) {
//    header("Location: login");
//    exit;
// }

$kurir = read("SELECT * FROM kurir;");
$nama_kurir = read("SELECT nama_kurir FROM kurir GROUP BY nama_kurir");

if (!isset($_GET['kurir']) && isset($_POST['search_btn'])) {
   $key = $_POST['keyword'];
   $kurir = read("SELECT * FROM kurir WHERE nama_kurir LIKE '%$key%' OR 
   tipe_pengiriman LIKE '%$key%';");
}

if (isset($_GET['kurir'])) {
   $krr = $_GET['kurir'];
   $kurir_filter = read("SELECT * FROM kurir WHERE nama_kurir = '$krr';");
   if (isset($_POST['search_btn'])) {
      $key = $_POST['keyword'];
      $kurir_filter = read("SELECT * FROM kurir WHERE nama_kurir = '$krr' && tipe_pengiriman LIKE '%$key%';");
   }
}

function kurirNotice()
{
   global $conn;
   if (isset($_POST["input"])) {
      if (inputKurir($_POST) == 1) {
         echo
            "<script>
               alert('Kurir berhasil ditambahkan');
               document.location.href = 'kurir';
            </script>";
      } else {
         echo
            "<script> 
               alert('Kurir tidak dapat ditambahkan');
               document.location.href = 'kurir';
            </script>;";
         echo "Error : " . mysqli_error($conn);
      }
   }

   if (isset($_POST["update"])) {
      if (updateSurat($_POST) == 1) {
         echo
            "<script>
               alert('Kurir berhasil diupdate');
               document.location.href = 'kurir';
            </script>";
      } else {
         echo
            "<script> 
               alert('Kurir tidak berhasil diupdate');
               document.location.href = 'kurir';
            </script>;";
         echo "Error : " . mysqli_error($conn);
      }
   }
}

if (isset($_GET['delete'])) {
   $id = $_GET['delete'];
   if (deleteKurir($id) > 0) {
      echo
         "<script>
            alert('Kurir Berhasil Dihapus');
            document.location.href='kurir';
         </script>";
   } else {
      echo
         "<script>
            alert('Kurir tidak berhasil dihapus : ');
            document.location.href='kurir';
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
   <title>Kurir</title>

</head>

<body>
   <div class="row">
      <?php require_once "sidebar.php" ?>

      <div class="col-md-10">
         <div class="content">
            <h2 class="mt-1">Data Kurir Rumahampers</h2>
            <div class="row mt-3 table-main">
               <div class="col-md-4">
                  <button type="button" class="btn btn-info tombolTambahData mt-4" data-toggle="modal" data-target="#formModal-input">Tambah Kurir</button>
               </div>
               <div class="col-md-4 d-flex mt-4">
                  <a class="card-link" href="kurir" class=" d-inline" for=""> <strong>Kurir</strong> </a>
                  <ul class="">
                     <?php foreach ($nama_kurir as $data) : ?>
                        <li class="d-inline mr-4"><a class=" card-link" href="kurir?kurir=<?= $data['nama_kurir'] ?>"><?= $data['nama_kurir'] ?></a></li>
                     <?php endforeach; ?>
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
                        <th>ID Kurir</th>
                        <th>Nama Kurir</th>
                        <th>Tipe Pengiriman</th>
                        <th>Harga / 4Kg</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (isset($_GET['kurir'])) : ?>
                        <?php $i = 1;
                        foreach ($kurir_filter as $data) : ?>
                           <tr>
                              <!-- <th><?= $i; ?></th> -->
                              <td align="center" width="3%"><strong><?= $data['id_kurir'] ?></strong></td>
                              <td><strong><?= $data['nama_kurir'] ?></strong></td>
                              <td align="center"><?= $data['tipe_pengiriman'] ?></td>
                              <td align="center">Rp. <?= number_format($data['harga_per_4_kg'], 0, ".", ".") ?></td>
                              <td width="5%" class=" text-center">
                                 <!-- <a class="badge badge-pill badge-primary ml-1" href="detail?id=<?= $data['id_kurir'] ?>">Detail</a> -->
                                 <a class="badge badge-pill badge-success ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal-input" href="kurir?update=<?= $data['id_kurir'] ?>" data-id_kurir="<?= $data['id_kurir'] ?>" data-nama_kurir="<?= $data['nama_kurir'] ?>" data-tipe_pengiriman="<?= $data['tipe_pengiriman'] ?>" data-harga_per_4_kg="<?= $data['harga_per_4_kg'] ?>">Update</a>
                                 <a class="badge badge-pill badge-danger ml-1" onclick="return confirm('Anda Yakin?');" href="kurir?delete=<?= $data['id_kurir'] ?>">Hapus</a>
                              </td>
                           </tr>
                        <?php $i++;
                        endforeach; ?>
                     <?php else : ?>
                        <?php $i = 1;
                        foreach ($kurir as $data) : ?>
                           <tr>
                              <!-- <th><?= $i; ?></th> -->
                              <td align="center" width="5%"><strong><?= $data['id_kurir'] ?></strong></td>
                              <td align><strong><?= $data['nama_kurir'] ?></strong></td>
                              <td align="center"><?= $data['tipe_pengiriman'] ?></td>
                              <td align="center">Rp. <?= number_format($data['harga_per_4_kg'], 0, ".", ".") ?></td>
                              <td width="5%" class=" text-center">
                                 <!-- <a class="badge badge-pill badge-primary ml-1" href="detail?id=<?= $data['id_kurir'] ?>">Detail</a> -->
                                 <a class="badge badge-pill badge-success ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal-input" href="kurir?update=<?= $data['id_kurir'] ?>" data-id_kurir="<?= $data['id_kurir'] ?>" data-nama_kurir="<?= $data['nama_kurir'] ?>" data-tipe_pengiriman="<?= $data['tipe_pengiriman'] ?>" data-harga_per_4_kg="<?= $data['harga_per_4_kg'] ?>">Update</a>
                                 <a href="kurir?delete=<?= $data['id_kurir'] ?>" class="badge badge-pill badge-danger ml-1" onclick="return confirm('Anda Yakin?');">Hapus</a>
                              </td>
                           </tr>
                        <?php $i++;
                        endforeach; ?>
                     <?php endif; ?>
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
                     <input type="hidden" name="id_kurir" id="id_kurir">
                     <div class="form-group">
                        <label for="nama_kurir">Nama Kurir</label>
                        <input type="text" class="form-control" id="nama_kurir" name="nama_kurir" placeholder="Nama Kurir" autocomplete="off">
                     </div>

                     <div class="form-group">
                        <label class="float-right" style="font-size:0.8em" ;>Contoh : <strong>Cepat (1-3 Hari)</strong></label>
                        <label for="perusahaan">Tipe Pengiriman</label>
                        <input type="text" class="form-control" id="tipe_pengiriman" name="tipe_pengiriman" placeholder="Tipe Pengiriman" autocomplete="off">
                     </div>

                     <!-- <div class="form-group">
                        <label for="perusahaan">Durasi Pengiriman</label>
                        <label class="float-right" style="font-size:0.8em" ;>Contoh : <strong>1 - 3 Hari</strong></label>
                        <input type="text" class="form-control" id="durasi_pengiriman" name="durasi_pengiriman" placeholder="Durasi Pengiriman" autocomplete="off">
                     </div> -->

                     <div class="form-group">
                        <label for="harga_per_4_kg">Harga Pengiriman / 4Kg</label>
                        <input type="number" class="form-control" id="harga_per_4_kg" name="harga_per_4_kg" placeholder="Harga Pengiriman / 4Kg" autocomplete="off" min="0">
                     </div>

                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="input" class="btn btn-primary">Tambah</button>
                     </div>
                  </form>
                  <?php kurirNotice() ?>
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
               $('#judulModal').html('Tambah Kurir');
               $('.modal-footer button[type=submit]').html('Tambah');
               $('.modal-footer button[type=submit]').addClass('btn btn-primary');
               $('#nama_kurir').val('');
               $('#tipe_pengiriman').val('');
               $('#harga_per_4_kg').val('');
            });

            $('.tampilModalUbah').on('click', function() {
               $('#judulModal').html('Update Kurir');
               $('.modal-footer button[type=submit]').addClass('btn btn-success');
               $('.modal-footer button[type=submit]').html('Update');
               $('.modal-footer button[type=submit]').attr('name', 'update');

               const id_kurir = $(this).data('id_kurir');
               const nama_kurir = $(this).data('nama_kurir');
               const tipe_pengiriman = $(this).data('tipe_pengiriman');
               const harga_per_4_kg = $(this).data('harga_per_4_kg');

               $('.modal-body #id_kurir').val(id_kurir);
               $('.modal-body #nama_kurir').val(nama_kurir);
               $('.modal-body #tipe_pengiriman').val(tipe_pengiriman);
               $('.modal-body #harga_per_4_kg').val(harga_per_4_kg);
            });
         });
      </script>
</body>

</html>