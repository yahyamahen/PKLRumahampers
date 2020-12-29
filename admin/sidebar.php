<div class="col-md-2 sidebar">
   <?php foreach ($admin as $data) : ?>
      <div class="profile d-flex flex-column">
         <img class="rounded-circle d-inline-block  mb-3" src="images/admin/<?= $data['id_admin'] ?>/<?= $data['foto_admin'] ?>" alt="profile">
         <a class="card-link" href="akun"><?= $data['id_admin'] ?></a>
         <!-- <p><?= $data['posisi'] ?></p> -->
         <p>Admin</p>
      </div>
   <?php endforeach; ?>

   <div class="menu-bar p-2 d-flex flex-column">
      <p class="mt-2 align-self-center">MENU</p>
      <ul class="list-group">
         <li class="list-inline mb-2"><a href="customers" class=" card-link"><i class="fas fa-users mr-2"></i>Customers</a></li>
         <li class="list-inline mb-2"><a href="pemesanan" class=" card-link"><i class="fas fa-shopping-cart mr-2"></i>Pemesanan</a></li>
         <li class="list-inline mb-2"><a href="produk" class=" card-link"><i class="fas fa-boxes mr-2"></i>Produk</a></li>
         <li class="list-inline mb-2"><a href="kurir" class=" card-link"><i class="fas fa-shipping-fast mr-2"></i>Kurir</a></li>
         <li class="list-inline mb-2"><a href="list_tujuan_pengiriman" class=" card-link"><i class="fas fa-map-marker-alt mr-2"></i>List Kota Tujuan</a></li>
         <li class="list-inline mb-2"><a href="akun" class=" card-link"><i class="fas fa-user-lock mr-2"></i>Akun Admin</a></li>
         <li class="list-inline mb-2"><a href="logout" class=" card-link"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a></li>
      </ul>

      <button class="btn btn-outline-primary hub-admin-btn">Hubungi Admin</button>
   </div>
</div>