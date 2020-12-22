<div class="marchendise-list d-flex justify-content-between">
   <?php $marchendise = read("SELECT * FROM produk ORDER BY RAND() LIMIT 5;") ?>
   <?php $i = 1;
   foreach ($marchendise as $mrc) : ?>
      <div class="card product-card m-3" style="width: 18rem;">
         <img src="images/produk/<?= $mrc['id_produk'] ?>/<?= $mrc['foto_produk'] ?>" class="card-img-top m-2 mb-n2" alt="product<?= $i ?>">
         <div class="card-body">
            <a href="" class="card-title product-title"><?= $mrc['nama_produk'] ?></a>
            <h5 class="card-text product-price">Rp. <?= $mrc['harga_produk'] ?></h5>
            <div class="action-button float-right">
               <form action="" method="post" class="d-flex">
                  <input type="hidden" name="username" id="username" value="<?= $username ?>">
                  <input type="hidden" name="id_produk" id="id_produk" value="<?= $mrc['id_produk'] ?>">
                  <input type="hidden" name="total_pcs" id="total_pcs" value="1">
                  <button type=submit name="add_wishlist" id="add_wishlist"><i class="heart-wishtlist fa fa-heart"></i></button>
                  <button type=submit name="add_trolley" id="add_trolley"><i class="cart-trolley fa fa-shopping-cart"></i></button>
               </form>
            </div>
         </div>
      </div>
   <?php $i++;
   endforeach; ?>
   <?php wishlist_trolley_added_notice() ?>
</div>