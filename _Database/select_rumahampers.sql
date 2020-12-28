-- filter-harga ==
SELECT * FROM produk WHERE kategori = 'quran' && nama_produk LIKE '%madinah%' && harga_produk BETWEEN '90000' AND '100000';

-- wishlist ==
SELECT customers.foto_profil, customers.username, produk.id_produk, produk.nama_produk, produk.kategori, produk.harga_produk, produk.jumlah_produk, produk.foto_produk
   FROM produk, wishlist, customers
   WHERE produk.id_produk = wishlist.id_produk && customers.username = wishlist.username && customers.username = '$username';

-- trolley ==
SELECT trolley.id, customers.foto_profil, customers.username, produk.id_produk, produk.nama_produk, produk.kategori, produk.harga_produk, produk.jumlah_produk, produk.foto_produk, trolley.total_pcs
   FROM produk, trolley, customers
   WHERE produk.id_produk = trolley.id_produk && customers.username = trolley.username && customers.username = '$username';

-- total_cart ==
SELECT SUM(produk.harga_produk * trolley.total_pcs) AS total_cart FROM produk, customers, trolley 
   WHERE produk.id_produk = trolley.id_produk && customers.username = trolley.username && customers.username = '$username';

-- total-Berat ==
SELECT (SUM(produk.berat_produk * trolley.total_pcs)) AS 'total_berat' 
   FROM produk, trolley, customers 
   WHERE produk.id_produk = trolley.id_produk && customers.username = trolley.username && customers.username = '$username'; 

-- Find Harga Pengiriman Kota ==
SELECT list_tujuan_pengiriman.id_tujuan, customers.kota as 'kota_customers', list_tujuan_pengiriman.kota as 'kota_pengiriman', list_tujuan_pengiriman.harga_pengiriman FROM customers, list_tujuan_pengiriman WHERE customers.username = '$username' && list_tujuan_pengiriman.kota = customers.kota;

-- Riwayat Pemesanan
SELECT customers.username, pemesanan.bukti_pembayaran, pemesanan.id_pemesanan, pemesanan.id_produk, produk.nama_produk, pemesanan.total, pemesanan.waktu_pemesanan, pemesanan.status_pemesanan 
   FROM pemesanan, produk, customers
   WHERE pemesanan.id_produk = produk.id_produk && pemesanan.username = customers.username && customers.username = '$username' GROUP BY pemesanan.id_pemesanan ORDER BY pemesanan.waktu_pemesanan DESC;

-- Klik pemesanan
SELECT customers.username, pemesanan.bukti_pembayaran, pemesanan.id_pemesanan, pemesanan.id_produk, produk.nama_produk, pemesanan.total, pemesanan.waktu_pemesanan, pemesanan.status_pemesanan 
   FROM pemesanan, produk , customers
   WHERE pemesanan.id_produk = produk.id_produk && pemesanan.username = customers.username && customers.username = '$username' && pemesanan.id_pemesanan = '$id_pemesanan' LIMIT 1;

-- Pembayaran
SELECT customers.username, pemesanan.bukti_pembayaran, pemesanan.id_pemesanan, pemesanan.id_produk, produk.nama_produk, pemesanan.total, pemesanan.waktu_pemesanan, pemesanan.status_pemesanan 
   FROM pemesanan, produk, customers
   WHERE pemesanan.id_produk = produk.id_produk && pemesanan.username = customers.username && customers.username = '$username'  GROUP BY pemesanan.id_pemesanan ORDER BY pemesanan.waktu_pemesanan DESC LIMIT 1;