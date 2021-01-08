<?php
session_start();
require_once "function.php";
require_once "model.php";
if_not_login_back_to_login();

if (isset($_GET['username'])) {
   $username = $_GET['username'];
   $customers = read("SELECT * FROM customers WHERE username = '$username';");
}

function passwordUpdated()
{
   global $conn;
   if (isset($_POST['update_password'])) {
      if (updatePassword($_POST) > 0) {
         echo
            "<script>
            alert('Password Baru Customers : " . $_POST['password_baru'] . "');
            document.location.href= 'detail_customers?username=" . $_POST['username_pass'] . "';
         </script>";
      } else {
         echo "<script> alert('Error :  " . mysqli_error($conn) . "');</script>;";
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
   <link rel="stylesheet" href="../css/bootstrap/bootstrap.css">
   <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <title>Bidoata Customers</title>

</head>

<body>
   <div class="row">
      <?php require_once "sidebar.php" ?>

      <div class="row akun-body">
         <div class="col-md-12">
            <div class="biodata-title mt-5">
               <h3 class=" d-inline ml-5">BIODATA CUSTOMER</h3>
               <?php foreach ($customers as $data) : ?>
                  <input type="button" class="ml-3 mt-n2 btn btn-outline-info sunting-mhs-btn" data-toggle="modal" data-target="#form-update" value="Sunting" name="update_mhs" id="update_mhs" data-npm="<?= $data['npm'] ?>" data-nama_mhs="<?= $data['nama_mhs'] ?>" data-jurusan="<?= $data['jurusan'] ?>" data-semester="<?= $data['semester'] ?>" data-email="<?= $data['email'] ?>" data-foto_profil_lama="<?= $data['foto_profil'] ?>">
               <?php endforeach; ?>
            </div>
            <div class="profile-details mt-4 ml-5">
               <?php foreach ($customers as $data) : ?>
                  <?php if (trim($data['foto_profil'] == '')) : ?>
                     <div class="d-flex justify-content-center overflow-hidden align-self-center mb-4" style="width: 9em; height:9em; border-radius:400em;">
                        <img class="d-inline-block align-self-center" style="width:8em;" src="../images/assets/guest_user.png" alt="guest">
                     </div>
                  <?php else : ?>
                     <div class="d-flex justify-content-center overflow-hidden align-self-center mb-4" style="width: 9em; height:9em; border-radius:400em;">
                        <img class="d-inline-block align-self-center" style="width:9em;" src="../images/customers/<?= $data['username'] ?>/<?= $data['foto_profil'] ?>" alt="profile">
                     </div>
                  <?php endif; ?>
                  <table cellspacing="0px" cellpadding="1px" border="0px" class="ml-1">
                     <tr>
                        <td class="pr-5">Username</td>
                        <td align="center">:</td>
                        <td class="pl-2"><?= $data['username'] ?></td>
                     </tr>

                     <tr>
                        <td class="pr-5">Nama Lengkap</td>
                        <td align="center">:</td>
                        <td class="pl-2"><?= $data['nama_lengkap']; ?></td>
                     </tr>

                     <tr>
                        <td class="pr-5">Email</td>
                        <td align="center">:</td>
                        <td class="pl-2"><?= $data['email'] ?></td>
                     </tr>
                     <tr>
                        <td class="pr-5">No Telepon</td>
                        <td align="center">:</td>
                        <td class="pl-2"><?= $data['no_telp'] ?></td>
                     </tr>
                     <tr>
                        <td class="pr-5">Tanggal Lahir</td>
                        <td align="center">:</td>
                        <td class="pl-2"><?= date('d M Y', strtotime($data['tanggal_lahir'])); ?></td>
                     </tr>
                     </tr>
                     <tr>
                        <td class="pr-5">Provinsi</td>
                        <td align="center">:</td>
                        <td class="pl-2"><?= $data['provinsi'] ?></td>
                     </tr>
                     <tr>
                        <td class="pr-5">Kota</td>
                        <td align="center">:</td>
                        <td class="pl-2"><?= $data['kota'] ?></td>
                     </tr>
                     <tr>
                        <td class="pr-5">Kecamatan</td>
                        <td align="center">:</td>
                        <td class="pl-2"><?= $data['kecamatan'] ?></td>
                     </tr>
                     <tr>
                        <td class="pr-5">Alamat Lengkap</td>
                        <td align="center">:</td>
                        <td class="pl-2"><?= $data['alamat_lengkap'] ?></td>
                     </tr>
                     <tr>
                        <td class="pr-5">Kode Pos</td>
                        <td align="center">:</td>
                        <td class="pl-2"><?= $data['kodepos'] ?></td>
                     </tr>
                     <tr>
                        <td colspan="3">
                           <p><a data-toggle="modal" data-target="#form-update-password" href="detail_customers?username=<?= $data['username'] ?>" class="pt-2 d-block card-link">Ganti Password</a></p>
                        </td>
                     </tr>
                  </table>
               <?php endforeach; ?>
            </div>
         </div>
      </div>

      <div class="modal fade" id="form-update-password" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title ml-5 pl-5" id="judulModal">UPDATE PASSWORD</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form action="" class="row g-3" method="POST">
                     <div class="row biodata-body">
                        <input type="hidden" name="username_pass" id="username_pass" value="<?= $data['username'] ?>">
                        <div class="col-md-12">
                           <label for="username_pass" class="form-label">Username</label>
                           <input type="text" class="form-control" id="username_pass" name="username_pass" placeholder="Username" value="<?= $data['username']; ?>" disabled>
                        </div>
                        <div class="col-12">
                           <label for="password_baru" class="form-label">Password Baru</label>
                           <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="********">
                        </div>
                     </div>
               </div>
               <div class="modal-footer mt-n2 d-flex">
                  <button type="submit" name="update_password" id="update_password" class="btn btn-info modal-button w-25">Update Password</button>
               </div>
               </form>
               <?php passwordUpdated(); ?>
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
   </div>

</body>

</html>