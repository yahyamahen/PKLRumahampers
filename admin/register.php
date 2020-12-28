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
   <title>Admin Rumahampers</title>

</head>

<body class="register-body">
   <div class="row register-frame">
      <div class="col-md-6">
         <div class="hero">
            <div class="header-title">
               <h1> SiPesan</h1>
               <h5>(Sistem Informasi Surat Pengantar Perusahaan)</h5>
            </div>
         </div>
      </div>

      <div class="col-md-6 d-flex flex-column justify-content-center">
         <div class="form-register-body align-self-center mr-5 mt-2">
            <h3>Daftar</h3>
            <form class="row g-2" action="" method="post">
               <div class="col-md-12">
                  <label for="npm" class="form-label">NPM</label>
                  <input type="text" class="form-control" id="npm" name="npm" placeholder="NPM">
               </div>
               <div class="col-12">
                  <label for="nama_mhs" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" placeholder="Nama Lengkap Mahasiswa">
               </div>
               <div class="col-md-6">
                  <label for="jurusan" class="form-label">Jurusan</label>
                  <select id="jurusan" name="jurusan" class="form-control">
                     <option selected value="Teknik Infromatika">Teknik Informatika</option>
                     <option value="Sistem Informasi">Sistem Informasi</option>
                  </select>
               </div>
               <div class="col-md-6">
                  <label for="semester" class="form-label">Semester</label>
                  <input type="number" class="form-control" id="semester" name="semester" placeholder="Semester">
               </div>
               <div class="col-12">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="mahasiswa@mail.com">
               </div>
               <div class="col-md-12">
                  <label for="pass" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="********">
               </div>
               <div class="col-md-12">
                  <label for="pass2" class="form-label">Konfirmasi Password</label>
                  <input type="password" class="form-control" id="password2" name="password2" placeholder="********">
               </div>
               <div class="col-12">
                  <button type="submit" class="mt-4 form-control btn btn-primary" name="regist">DAFTAR</button>
                  <?php // adminCreated(); 
                  ?>
               </div>
            </form>
            <div class="col-12">
               <li class="list-group text-center mt-2"><a href="login">LOGIN</a></li>
               <p class="text-center">NPM sudah digunakan? <a href="#">Hubungi Admin</a></p>
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
   <script src="js/script.js"></script>
</body>

</html>