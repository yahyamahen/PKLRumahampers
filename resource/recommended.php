<div class="marchendise-list d-flex justify-content-center flex-wrap">
   <?php $marchendise = read("SELECT * FROM produk ORDER BY RAND() LIMIT 5;") ?>
   <?php $i = 1;
   foreach ($marchendise as $data) : ?>
      <div class="card product-card" style="width: 15.4rem;">
         <div class="square">
            <img src="images/produk/<?= $data['kategori'] ?>/<?= $data['foto_produk'] ?>" class=" card-img-top m-2 mb-n2" alt="product<?= $i ?>">
         </div>
         <div class="card-body">
            <a href="produk_detail?produk=<?= $data['id_produk'] ?>" class="card-title product-title"><?= $data['nama_produk'] ?></a>
            <h5 class="card-text product-price">Rp. <?= number_format($data['harga_produk']) ?></h5>
            <div class="action-button d-flex justify-content-end">
               <?php if (!isset($_SESSION['login'])) : ?>
                  <form action="" method="post">
                     <button type=button name="add_wishlist" id="add_wishlist"><i class="heart-wishtlist fa fa-heart" data-toggle="modal" data-target="#form-input"></i></button>
                     <button type=button name="add_trolley" id="add_trolley" data-toggle="modal" data-target="#form-input"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                  </form>
               <?php else :  ?>
                  <form action="" method="post">
                     <input type="hidden" name="username" id="username" value="<?= $username ?>">
                     <input type="hidden" name="id_produk" id="id_produk" value="<?= $data['id_produk'] ?>">
                     <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                     <button type=submit name="add_wishlist" id="add_wishlist"><i class="heart-wishtlist fa fa-heart"></i></button>
                     <button type=submit name="add_trolley" id="add_trolley"><i class="cart-trolley fa fa-shopping-cart"></i></button>
                  </form>
               <?php endif; ?>
            </div>
         </div>
      </div>
   <?php $i++;
   endforeach; ?>
   <?php wishlist_trolley_added_notice() ?>
</div>