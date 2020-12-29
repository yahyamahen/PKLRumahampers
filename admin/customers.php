<?php
session_start();
require_once "function.php";
require_once "model.php";
if_not_login_back_to_login();

$customers = read("SELECT * FROM customers;");

if (isset($_POST['search_btn'])) {
   $key = $_POST['keyword'];
   $customers = read("
      SELECT * FROM customers WHERE 
      username LIKE '%$key%' OR 
      nama_lengkap LIKE '%$key%' OR  
      email LIKE '%$key%' OR 
      no_telp LIKE '%$key%' OR 
      provinsi LIKE '%$key%' OR 
      kota LIKE '%$key%';");
}

function customersNotice()
{
   global $conn;
   if (isset($_POST["update"])) {
      if (updateCustomers($_POST) > 0) {
         echo
            "<script>
               alert('Password customer berhasil diupdate');
               document.location.href = 'customers';
            </script>";
      } else {
         echo
            "<script> 
               alert('Password customer tidak berhasil diupdate');
               document.location.href = 'customers';
            </script>;";
         echo "Error : " . mysqli_error($conn);
      }
   }
}

if (isset($_GET['delete'])) {
   $id = $_GET['delete'];
   if (deleteCustomers($id) > 0) {
      echo
         "<script>
            alert('Customer berhasil dihapus');
            document.location.href='customers';
         </script>";
   } else {
      echo
         "<script>
            alert('Customer tidak berhasil dihapus');
            document.location.href='customers';
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
            <h2 class="mt-1">Data Customers Rumahampers</h2>
            <div class="row mt-3 table-main">
               <!-- <div class="col-md-4">
                  <button type="button" class="btn btn-info tombolTambahData mt-4" data-toggle="modal" data-target="#formModal-input">Tambah Kota Pengiriman</button>
               </div> -->
               <!-- <div class="col-md-4 d-flex mt-4">
                  <a class="card-link" href="kurir" class=" d-inline" for=""> <strong>Kurir</strong> </a>
                  <ul class="">
                     <?php foreach ($customers as $data) : ?>
                        <li class="d-inline mr-4"><a class=" card-link" href="kurir?kurir=<?= $data['provinsi'] ?>"><?= $data['provinsi'] ?></a></li>
                     <?php endforeach; ?>
                  </ul>
               </div> -->
               <div class="col-lg-4 mt-4">
                  <form action="" method="post">
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Data Customers..." name="keyword" id="keyword" autocomplete="off">
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
                        <th> # </th>
                        <th>Username</th>
                        <th>Nama Customers</th>
                        <th>Email</th>
                        <th>No. Telp</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $i = 1;
                     foreach ($customers as $data) : ?>
                        <tr>
                           <th width="3%"><?= $i; ?></th>
                           <td><strong><?= $data['username'] ?></strong></td>
                           <td><?= $data['nama_lengkap'] ?></td>
                           <td align="center"><?= $data['email'] ?></td>
                           <td align="center"><?= $data['no_telp'] ?></td>
                           <td width="5%" class=" text-center">
                              <a class="badge badge-pill badge-primary ml-1" href="customers?username=<?= $data['username'] ?>">Detail</a>
                              <a class="badge badge-pill badge-success ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal-input" href="customers?update=<?= $data['username'] ?>" data-username="<?= $data['username'] ?>" data-nama_lengkap="<?= $data['nama_lengkap'] ?>" data-email="<?= $data['email'] ?>" data-password="<?= $data['password'] ?>">Update</a>
                              <a class="badge badge-pill badge-danger ml-1" onclick="return confirm('Anda Yakin?');" href="customers?delete=<?= $data['username'] ?>">Hapus</a>
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
                     <!-- <input type="hidden" name="username" id="username"> -->
                     <div class="form-group">
                        <label for="provinsi">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username" autocomplete="off" disabled>
                     </div>

                     <div class="form-group">
                        <label for="perusahaan">Nama Customers</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" autocomplete="off" disabled>
                     </div>

                     <div class="form-group">
                        <label for="harga_pengiriman">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" disabled>
                     </div>

                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="*********" autocomplete="off">
                     </div>

                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="input" class="btn btn-primary">Tambah</button>
                     </div>
                  </form>
                  <?php customersNotice() ?>
               </div>
            </div>
         </div>
      </div>

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
               $('#username').val('');
               $('#nama_lengkap').val('');
               $('#email').val('');
               $('#password').val('');
            });

            $('.tampilModalUbah').on('click', function() {
               $('#judulModal').html('Update Password Customers');
               $('.modal-footer button[type=submit]').addClass('btn btn-success');
               $('.modal-footer button[type=submit]').html('Update');
               $('.modal-footer button[type=submit]').attr('name', 'update');

               const username = $(this).data('username');
               const nama_lengkap = $(this).data('nama_lengkap');
               const email = $(this).data('email');
               const password = $(this).data('password');

               $('.modal-body #username').val(username);
               $('.modal-body #nama_lengkap').val(nama_lengkap);
               $('.modal-body #email').val(email);
               $('.modal-body #password').val('');
            });
         });
      </script>
</body>

</html>