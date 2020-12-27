<?php
session_start();
require_once "function.php";
require_once "resource/access.php";
require_once "model.php";
if_not_login_back_to_home();

if (isset($_POST["edit"])) {
   if (update($_POST) > 0) {
      echo
         "<script>
         alert('Data Customers Terupdate');
         document.location.href = 'edit_biodata';
		</script>";
   } else {
      echo
         "<script>
			alert('Data Customers Tidak Berhasil Diupdate');
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
   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <title>Edit Bidoata</title>

</head>

<body class="white-bg">
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->
   <div class="container-main content">
      <div class="row">
         <div class="col-md-12">
            <form action="" class="row g-3" method="POST" enctype="multipart/form-data">
               <div class="col-md-12 biodata-title mt-5 mb-4">
                  <h3 class=" d-inline ml-4">BIODATA</h3>
                  <button type="submit" class="float-right mr-4 mt-n1 btn btn-outline-danger" type="submit" name="edit">Sunting</button>
               </div>
               <div class="row biodata-body">
                  <?php foreach ($user as $usr) : ?>
                     <input type="hidden" class="form-control" name="username" id="username" autocomplete="off" value="<?= $usr['username']; ?>">
                     <input type="hidden" class="form-control" name="gambar_lama" id="gambar_lama" autocomplete="off" value="<?= $usr['foto_profil']; ?>">

                     <div class="square m-auto">
                        <img class="" src=" images/customers/<?= $usr['username']; ?>/<?= $usr['foto_profil']; ?>" alt="profile">
                     </div>
                     <div class="col-md-12 mt-4 ml-3 d-flex justify-content-center">
                        <input type="file" name="gambar" id="gambar" class="align-self-center ml-5">
                     </div>
                     <div class="col-md-12 mt-3">
                        <label for="nama" class="form-label">Nama Lengkap *</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap Kamu" autocomplete="off" value="<?= $usr['nama_lengkap']; ?>">
                     </div>
                     <div class="col-md-12 mt-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email@mail.com" autocomplete="off" value="<?= $usr['email']; ?>">
                     </div>
                     <div class="col-md-12 mt-3">
                        <label for="password" class="form-label">Password *</label><a class="float-right card-link" href="#">Ganti Password</a>
                        <input type="password" class="form-control" name="password" id="password" placeholder="**********" autocomplete="off" disabled>
                     </div>
                     <div class="col-md-12 mt-3">
                        <label for="no_telp" class="form-label">No. Handphone *</label>
                        <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="085777333888" autocomplete="off" value="<?= $usr['no_telp']; ?>">
                     </div>
                     <div class="col-md-12 mt-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="16-10-2000" autocomplete="off" value="<?= $usr['tanggal_lahir']; ?>">
                     </div>
                     <div class="col-md-12 mt-3">
                        <label class="form-label">Alamat *</label>
                     </div>
                     <div class="col-md-4">
                        <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?= $usr['provinsi']; ?>">
                     </div>
                     <div class="col-md-4">
                        <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota/Kabupaten" value="<?= $usr['kota']; ?>">
                     </div>
                     <div class="col-md-4">
                        <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?= $usr['kecamatan']; ?>">
                     </div>
                     <div class="col-md-10 mt-3">
                        <input type="textarea" class="form-control alamat-lengkap" name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat Lengkap" value="<?= $usr['alamat_lengkap']; ?>">
                     </div>
                     <div class="col-md-2 mt-3">
                        <input type="number" class="form-control" name="kodepos" id="kodepos" placeholder="Kode Pos" autocomplete="off" value="<?= $usr['kodepos']; ?>">
                     </div>
                     <!-- <div class="col-md-12 mt-3">
                     <label for="catatan" class="form-label">Catatan Pemesanan *</label>
                     <input type="textarea" class="form-control catatan-pemesanan" name="catatan" id="catatan">
                     </div> -->
                  <?php endforeach; ?>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- </div> -->

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