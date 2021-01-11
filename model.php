<?php
function if_not_login_back_to_home()
{
   if (!isset($_SESSION['login'])) {
      echo
         "<script>
            alert('Login terlebih dahulu!');
            document.location.href='home';
         </script>";
      exit;
   }
}

$marchendise_list = read("SELECT kategori FROM produk WHERE kategori != 'Custom Box' && kategori != 'Paket Bundle' GROUP BY kategori ORDER BY kategori ASC;");

if (isset($_GET['produk'])) {
   $id_produk = $_GET['produk'];
   $produk = read("SELECT * FROM produk WHERE id_produk = '$id_produk'");
}

if (isset($_GET['kategori'])) {
   $kategori = $_GET['kategori'];
   $marchendise = read("SELECT * FROM produk WHERE kategori = '$kategori'");
}

$quran = read("SELECT * FROM produk WHERE kategori = 'quran' LIMIT 1");
$quran_rand = read("SELECT * FROM produk WHERE kategori = 'quran' ORDER BY RAND();");

$sajadah = read("SELECT * FROM produk WHERE kategori = 'sajadah' LIMIT 1");
$sajadah_rand = read("SELECT * FROM produk WHERE kategori = 'sajadah' ORDER BY RAND();");

$tasbih = read("SELECT * FROM produk WHERE kategori = 'tasbih' LIMIT 1");
$tasbih_rand = read("SELECT * FROM produk WHERE kategori = 'tasbih' ORDER BY RAND();");

$mukenah = read("SELECT * FROM produk WHERE kategori = 'mukenah' LIMIT 1");
$mukenah_rand = read("SELECT * FROM produk WHERE kategori = 'mukenah' ORDER BY RAND();");

$sarung = read("SELECT * FROM produk WHERE kategori = 'sarung' LIMIT 1");
$sarung_rand = read("SELECT * FROM produk WHERE kategori = 'sarung' ORDER BY RAND();");

$custom_box = read("SELECT * FROM produk WHERE kategori = 'custom_box' LIMIT 1");
$custom_box_rand = read("SELECT * FROM produk WHERE kategori = 'custom_box' ORDER BY RAND();");

if (isset($_SESSION['login']) && isset($_SESSION['username'])) {
   $username = $_SESSION['username'];

   $user = read("SELECT * FROM customers WHERE username = '$username';");
   $kurir = read("SELECT * FROM kurir");

   $trolley = read("SELECT trolley.id, customers.foto_profil, customers.username, produk.id_produk, produk.nama_produk, produk.kategori, produk.harga_produk, produk.jumlah_produk, produk.foto_produk, trolley.total_pcs
   FROM produk, trolley, customers
   WHERE produk.id_produk = trolley.id_produk && customers.username = trolley.username && customers.username = '$username';");

   $wishlist = read("SELECT customers.foto_profil, customers.username, produk.id_produk, produk.nama_produk, produk.kategori, produk.harga_produk, produk.jumlah_produk, produk.foto_produk
   FROM produk, wishlist, customers
   WHERE produk.id_produk = wishlist.id_produk && customers.username = wishlist.username && customers.username = '$username';");

   $total_cart = read("SELECT SUM(produk.harga_produk * trolley.total_pcs) AS total_cart FROM produk, customers, trolley 
   WHERE produk.id_produk = trolley.id_produk && customers.username = trolley.username && customers.username = '$username';");

   $total_berat = read("SELECT (SUM(produk.berat_produk * trolley.total_pcs)) AS 'total_berat' 
   FROM produk, trolley, customers 
   WHERE produk.id_produk = trolley.id_produk && customers.username = trolley.username && customers.username = '$username'; ");

   $harga_pengiriman = read("SELECT list_tujuan_pengiriman.id_tujuan, customers.kota as 'kota_customers', list_tujuan_pengiriman.kota as 'kota_pengiriman', list_tujuan_pengiriman.harga_pengiriman FROM customers, list_tujuan_pengiriman WHERE customers.username = '$username' && list_tujuan_pengiriman.kota = customers.kota;");

   $pemesanan = read("SELECT customers.username, pemesanan.bukti_pembayaran, pemesanan.id_pemesanan, pemesanan.id_produk, produk.nama_produk, pemesanan.total, pemesanan.waktu_pemesanan, pemesanan.status_pemesanan, pemesanan.resi_pengiriman
   FROM pemesanan, produk, customers
   WHERE pemesanan.id_produk = produk.id_produk && pemesanan.username = customers.username && customers.username = '$username' GROUP BY pemesanan.id_pemesanan ORDER BY pemesanan.waktu_pemesanan DESC");

   if (isset($_GET['pemesanan'])) {
      $id_pemesanan = $_GET['pemesanan'];
      $username = $_SESSION['username'];
      $pemesanan_terakhir = read("SELECT customers.username, pemesanan.bukti_pembayaran, pemesanan.id_pemesanan, pemesanan.id_produk, produk.nama_produk, pemesanan.total, pemesanan.waktu_pemesanan, pemesanan.status_pemesanan, pemesanan.resi_pengiriman
      FROM pemesanan, produk , customers
      WHERE pemesanan.id_produk = produk.id_produk && pemesanan.username = customers.username && customers.username = '$username' && pemesanan.id_pemesanan = '$id_pemesanan' LIMIT 1");
   }

   $pembayaran = read("SELECT customers.username, pemesanan.bukti_pembayaran, pemesanan.id_pemesanan, pemesanan.id_produk, produk.nama_produk, pemesanan.total, pemesanan.waktu_pemesanan, pemesanan.status_pemesanan, pemesanan.resi_pengiriman
   FROM pemesanan, produk, customers
   WHERE pemesanan.id_produk = produk.id_produk && pemesanan.username = customers.username && customers.username = '$username'  GROUP BY pemesanan.id_pemesanan ORDER BY pemesanan.waktu_pemesanan DESC LIMIT 1");
}
