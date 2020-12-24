<link rel="stylesheet" href="css/style.css">
<div class="navbar-main">
   <nav class="navbar navbar-expand-lg navbar-dark mr-auto">
      <a class="navbar-brand" href="home"> <i class="fa fa-home"></i> Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Marchendise</a>
               <div class="dropdown-menu marchendise-dropdown dropdown-animation" aria-labelledby="navbarDropdown">
                  <?php // foreach ($produk as $pr) : 
                  ?>
                  <!-- <a class="dropdown-item" href="marchendise?marchendise=<?= $pr['kategori']; ?>"><?= $pr['kategori']; ?></a> -->
                  <a class="dropdown-item" href="marchendise?kategori=sajadah">Sajadah</a>
                  <a class="dropdown-item" href="marchendise?kategori=quran">Qur'an</a>
                  <a class="dropdown-item" href="marchendise?kategori=tasbih">Tasbih</a>
                  <a class="dropdown-item" href="marchendise?kategori=mukenah">Mukenah</a>
                  <a class="dropdown-item" href="marchendise?kategori=sarung">Sarung</a>
                  <?php // endforeach; 
                  ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="marchendise?marchendise=paketbundle"><strong>Paket Bundle</strong></a>
                  <a class="dropdown-item" href="marchendise?marchendise=custombox"><strong>Custom Box</strong></a>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="artikel" tabindex="-1" aria-disabled="true">Artikel</a>
            </li>
         </ul>
         <ul class="navbar-nav mr-auto">
            <li>
               <img class="logo-home" src="images/assets/Logo.png" alt="Rumahampers">
            </li>
         </ul>

         <ul class="navbar-nav">
            <?php if (!isset($_SESSION['login'])) : ?>
               <li class="nav-item">
                  <a class="nav-link" href="#" tabindex="-1" aria-disabled="true" data-toggle="modal" data-target="#form-input">
                     <i class="far fa-heart"></i>
                     <span>5</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#" tabindex="-1" aria-disabled="true" data-toggle="modal" data-target="#form-input">
                     <i class="fa fa-shopping-cart"></i>
                     <span>3</span>
                  </a>
               </li>
            <?php endif; ?>

            <?php if (isset($_SESSION['login'])) : ?>
               <?php foreach ($user as $usr) : ?>
                  <li class="nav-item">
                     <a class="nav-link" href="wishlist?wishlist=<?= $usr['username'] ?>" tabindex="-1" aria-disabled="true">
                        <i class="far fa-heart"></i>
                        <span>5</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="trolley?trolley=<?= $usr['username'] ?>" tabindex="-1" aria-disabled="true">
                        <i class="fa fa-shopping-cart"></i>
                        <span>3</span>
                     </a>
                  </li>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="profile" src="images/<?= $usr['username'] ?>/<?= $usr['foto_profil'] ?>" alt="profile">
                     </a>
                     <div class="dropdown-menu profile-dropdown dropdown-animation" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="riwayat_pemesanan?username=<?= $usr['username'] ?>">Riwayat Pemesanan</a>
                        <a class="dropdown-item" href="edit_biodata?username=<?= $usr['username'] ?>">Edit Bidoata</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout">Log Out</a>
                     </div>
                  </li>
               <?php endforeach; ?>
            <?php endif; ?>

            <?php if (!isset($_SESSION['login'])) : ?>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img class="profile" src="images/assets/guest_user.png" alt="profile">
                  </a>
                  <div class="dropdown-menu profile-dropdown dropdown-animation" aria-labelledby="navbarDropdown">
                     <input type="button" class="btn dropdown-item tombolLogin" data-toggle="modal" data-target="#form-input" value="Login">
                     <input type="button" class="btn dropdown-item tombolRegister" data-toggle="modal" data-target="#form-register" value="Register">
                  </div>
               </li>
            <?php endif; ?>
         </ul>
      </div>
   </nav>
   <div class="motto-bar d-flex justify-content-center">
      <h5>MAKE YOUR DREAM HAMPERS</h5>
   </div>
</div>

<?php if (isset($_SESSION['login'])) : ?>
   <?php foreach ($total_cart as $t_cart) : ?>
      <div class="total-body float-right">
         <span class="total-cart-floated">Rp. <?= $t_cart['total_cart'] ?> <a href="detail_pemesanan" class="total-price"><i class="fa fa-shopping-cart"></i></a></span>
      </div>
   <?php endforeach; ?>
<?php endif; ?>