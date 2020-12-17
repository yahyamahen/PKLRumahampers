<link rel="stylesheet" href="css/style.css">
<div class="navbar-main">
   <nav class="navbar navbar-expand-lg navbar-dark mr-auto">
      <a class="navbar-brand" href="index.php"> <i class="fa fa-home"></i> Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Marchendise</a>
               <div class="dropdown-menu marchendise-dropdown dropdown-animation" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="marchendise.php">Sajadah</a>
                  <a class="dropdown-item" href="marchendise.php">Qur'an</a>
                  <a class="dropdown-item" href="marchendise.php">Tasbih</a>
                  <a class="dropdown-item" href="marchendise.php">Mukenah</a>
                  <a class="dropdown-item" href="marchendise.php">Sarung</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="marchendise.php"><strong>Paket Bundle</strong></a>
                  <a class="dropdown-item" href="marchendise.php"><strong>Custom Box</strong></a>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="artikel.php" tabindex="-1" aria-disabled="true">Artikel</a>
            </li>
         </ul>
         <ul class="navbar-nav mr-auto">
            <li>
               <img class="logo-home" src="images/assets/Logo.png" alt="Rumahampers">
            </li>
         </ul>

         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" href="wishlist.php" tabindex="-1" aria-disabled="true">
                  <i class="far fa-heart"></i>
                  <span>5</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="trolley.php" tabindex="-1" aria-disabled="true">
                  <i class="fa fa-shopping-cart"></i>
                  <span>3</span>
               </a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                  <img class="profile" src="images/assets/profile.jpg" alt="profile">

               </a>
               <div class="dropdown-menu profile-dropdown dropdown-animation" aria-labelledby="navbarDropdown">
                  <input type="button" class="btn dropdown-item tombolLogin" data-toggle="modal" data-target="#form-input" value="Login">
                  <input type="button" class="btn dropdown-item tombolRegister" data-toggle="modal" data-target="#form-register" value="Register">
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="riwayat_pemesanan.php">Riwayat Pemesanan</a>
                  <a class="dropdown-item" href="edit_biodata.php">Edit Bidoata</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">Log Out</a>
               </div>
            </li>
         </ul>
      </div>
   </nav>
   <div class="motto-bar d-flex justify-content-center">
      <h5>MAKE YOUR DREAM HAMPERS</h5>
   </div>
</div>

<div class="total-body float-right">
   <span class="total-cart-floated">Rp. 178000 <a href="detail_pemesanan.php" class="total-price"><i class="fa fa-shopping-cart"></i></a></span>
</div>