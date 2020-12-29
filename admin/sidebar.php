<div class="col-md-2 sidebar">
   <?php foreach ($admin as $data) : ?>
      <div class="profile d-flex flex-column">
         <a class="card-link" href="akun"><?= $data['username'] ?></a>
         <p>Admin</p>
      </div>
   <?php endforeach; ?>

   <div class="menu-bar p-2 d-flex flex-column">
      <p class="mt-2 align-self-center">MENU</p>
      <ul class="list-group">
<<<<<<< HEAD
         <li class="list-inline mb-2"><a href="customer" class=" card-link"><i class="far fa-user mr-2"></i>Customers</a></li>
         <li class="list-inline mb-2"><a href="pemesanan" class=" card-link"><i class="far fa-user mr-2"></i>Pemesanan</a></li>
         <li class="list-inline mb-2"><a href="produk" class=" card-link"><i class="fas fa-at mr-2"></i>Produk</a></li>
         <li class="list-inline mb-2"><a href="kurir" class=" card-link"><i class="fas fa-at mr-2"></i>Kurir</a></li>
         <li class="list-inline mb-2"><a href="list_tujuan_pemesanan" class=" card-link"><i class="fas fa-at mr-2"></i>List Kota Tujuan</a></li>
         <li class="list-inline mb-2"><a href="akun" class=" card-link"><i class="fas fa-at mr-2"></i>Akun Admin</a></li>
         <li class="list-inline mb-2"><a href="logout.php" class=" card-link"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a></li>
=======
         <li class="list-inline mb-2"><a href="customers" class=" card-link"><i class="fas fa-users mr-2"></i>Customers</a></li>
         <li class="list-inline mb-2"><a href="pemesanan" class=" card-link"><i class="fas fa-shopping-cart mr-2"></i>Pemesanan</a></li>
         <li class="list-inline mb-2"><a href="produk" class=" card-link"><i class="fas fa-boxes mr-2"></i>Produk</a></li>
         <li class="list-inline mb-2"><a href="kurir" class=" card-link"><i class="fas fa-shipping-fast mr-2"></i>Kurir</a></li>
         <li class="list-inline mb-2"><a href="list_tujuan_pengiriman" class=" card-link"><i class="fas fa-map-marker-alt mr-2"></i>List Kota Tujuan</a></li>
         <li class="list-inline mb-2"><a href="akun" class=" card-link"><i class="fas fa-user-lock mr-2"></i>Akun Admin</a></li>
         <li class="list-inline mb-2"><a href="logout" class=" card-link"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a></li>
>>>>>>> ede7ab30b2011aa6c502c39948125df48cfeca3f
      </ul>

      <button class="btn btn-outline-primary hub-admin-btn">Hubungi Admin</button>
   </div>
</div>