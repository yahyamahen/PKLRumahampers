-- filter-harga ==
SELECT * FROM produk WHERE kategori = 'quran' && nama_produk LIKE '%madinah%' && harga_produk BETWEEN '90000' AND '100000';

-- wishlist ==
SELECT customers.foto_profil, customers.username, produk.id_produk, produk.nama_produk, produk.harga_produk, produk.jumlah_produk 
   FROM produk, wishlist, customers
   WHERE produk.id_produk = wishlist.id_produk && customers.username = wishlist.username && customers.username = 'yahyamahen';

-- trolley ==
SELECT trolley.id, customers.foto_profil, customers.username, produk.id_produk, produk.nama_produk, trolley.total_pcs, produk.harga_produk
   FROM produk, trolley, customers
   WHERE produk.id_produk = trolley.id_produk && customers.username = trolley.username && customers.username = 'yahyamahen';

-- total_cart ==
SELECT SUM(produk.harga_produk * trolley.total_pcs) AS total_cart FROM produk, customers, trolley 
   WHERE produk.id_produk = trolley.id_produk && customers.username = trolley.username && customers.username = '$username';

-- total-Berat ==
SELECT SUM((produk.berat_produk * trolley.total_pcs)) AS 'total_berat'
   FROM produk, trolley, customers 
   WHERE produk.id_produk = trolley.id_produk && customers.username = trolley.username && customers.username = 'yahyamahen';

-- Find Harga Pengiriman Kota ==
SELECT list_tujuan_pengiriman.id_tujuan, customers.kota, list_tujuan_pengiriman.harga_pengiriman FROM customers, list_tujuan_pengiriman WHERE customers.username = '$username' && list_tujuan_pengiriman.kota = customers.kota;