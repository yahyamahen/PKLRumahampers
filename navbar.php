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
                  <?php foreach ($marchendise_list as $data) : ?>
                     <a class="dropdown-item" href="marchendise?kategori=<?= $data['kategori']; ?>"><?= $data['kategori']; ?></a>
                     <!-- <a class="dropdown-item" href="marchendise?kategori=sajadah">Sajadah</a>
                     <a class="dropdown-item" href="marchendise?kategori=quran">Qur'an</a>
                     <a class="dropdown-item" href="marchendise?kategori=tasbih">Tasbih</a>
                     <a class="dropdown-item" href="marchendise?kategori=mukenah">Mukenah</a>
                     <a class="dropdown-item" href="marchendise?kategori=sarung">Sarung</a> -->
                  <?php endforeach; ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="marchendise?kategori=Paket%20Bundle"><strong>Paket Bundle</strong></a>
                  <a class="dropdown-item" href="marchendise?kategori=custombox"><strong>Custom Box</strong></a>
               </div>
            </li>
            <!-- <li class="nav-item">
               <a class="nav-link" href="artikel" tabindex="-1" aria-disabled="true">Artikel</a>
            </li> -->
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
                     <span>0</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#" tabindex="-1" aria-disabled="true" data-toggle="modal" data-target="#form-input">
                     <i class="fa fa-shopping-cart"></i>
                     <span>0</span>
                  </a>
               </li>
            <?php endif; ?>

            <?php if (isset($_SESSION['login'])) : ?>
               <?php foreach ($user as $data) : ?>
                  <li class="nav-item">
                     <a class="nav-link" href="wishlist?wishlist=<?= $data['username'] ?>" tabindex="-1" aria-disabled="true">
                        <i class="far fa-heart"></i>
                        <span><?= count($wishlist) ?></span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="trolley?trolley=<?= $data['username'] ?>" tabindex="-1" aria-disabled="true">
                        <i class="fa fa-shopping-cart"></i>
                        <span><?= count($trolley) ?></span>
                     </a>
                  </li>
                  <li class="nav-item dropdown d-flex justify-content-center">
                     <a class="nav-link dropdown-toggle square align-self-center ml-2 mr-n1" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php if ($data['foto_profil'] == NULL) : ?>
                           <img class="profile" src="images/assets/guest_user.png" alt="profile">
                        <?php else : ?>
                           <img class="profile" src="images/customers/<?= $data['username'] ?>/<?= $data['foto_profil'] ?>" alt="profile">
                        <?php endif; ?>
                     </a>
                     <a class="nav-link dropdown-toggle align-self-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     </a>
                     <div class="dropdown-menu profile-dropdown dropdown-animation" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="riwayat_pemesanan?username=<?= $data['username'] ?>">Riwayat Pemesanan</a>
                        <a class="dropdown-item" href="edit_biodata?username=<?= $data['username'] ?>">Edit Bidoata</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout">Log Out</a>
                     </div>
                  </li>
               <?php break;
               endforeach; ?>
            <?php endif; ?>

            <?php if (!isset($_SESSION['login'])) : ?>
               <li class="nav-item dropdown d-flex justify-content-center">
                  <a class="nav-link dropdown-toggle align-self-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <label class="mb-n1">LOGIN</label>
                  </a>
                  <div class="dropdown-menu profile-dropdown-unlogin dropdown-animation" aria-labelledby="navbarDropdown">
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
   <?php foreach ($total_cart as $data) : ?>
      <div class="total-body float-right">
         <?php if ($data['total_cart'] == 0) : ?>
            <span class="total-cart-floated" style="font-size: 1em;">Yuk Tambah Hampers di Trolleymu! <a class=" total-price"><i class="fa fa-shopping-cart"></i></a></span>
         <?php else : ?>
            <span class="total-cart-floated">Rp. <?= number_format($data['total_cart'], 0, ".", ".") ?> <a href="detail_pemesanan?id_kurir" class=" total-price"><i class="fa fa-shopping-cart"></i></a></span>
         <?php endif; ?>
      </div>
   <?php endforeach; ?>
<?php endif; ?>