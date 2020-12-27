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

if (isset($_GET['produk'])) {
   $id_produk = $_GET['produk'];
   $produk = read("SELECT * FROM produk WHERE id_produk = '$id_produk'");
}

if (isset($_GET['kategori'])) {
   $kategori = $_GET['kategori'];
   $marchendise = read("SELECT * FROM produk WHERE kategori = '$kategori'");
}

// if (isset($_GET['pemesanan'])) {
//    $id_pemesanan = $_GET['pemesanan'];
//    $pemesanan = read("SELECT pemesanan.bukti_pembayaran, pemesanan.id_pemesanan, pemesanan.id_produk, produk.nama_produk, pemesanan.total, pemesanan.waktu_pemesanan, pemesanan.status_pemesanan 
//    FROM pemesanan, produk 
//    WHERE pemesanan.id_produk = produk.id_produk && username = '$username' && pemesanan.id_pemesanan = '$id_pemesanan' LIMIT 1");
// }

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

   $harga_pengiriman = read("SELECT list_tujuan_pengiriman.id_tujuan, customers.kota, list_tujuan_pengiriman.harga_pengiriman FROM customers, list_tujuan_pengiriman WHERE customers.username = '$username' && list_tujuan_pengiriman.kota = customers.kota;");

   $pemesanan = read("SELECT pemesanan.bukti_pembayaran, pemesanan.id_pemesanan, pemesanan.id_produk, produk.nama_produk, pemesanan.total, pemesanan.waktu_pemesanan, pemesanan.status_pemesanan 
   FROM pemesanan, produk 
   WHERE pemesanan.id_produk = produk.id_produk && username = '$username' GROUP BY pemesanan.id_pemesanan");

   if (isset($_GET['pemesanan'])) {
      $id_pemesanan = $_GET['pemesanan'];
      $username = $_SESSION['username'];
      $pemesanan = read("SELECT pemesanan.bukti_pembayaran, pemesanan.id_pemesanan, pemesanan.id_produk, produk.nama_produk, pemesanan.total, pemesanan.waktu_pemesanan, pemesanan.status_pemesanan 
      FROM pemesanan, produk 
      WHERE pemesanan.id_produk = produk.id_produk && username = '$username' && pemesanan.id_pemesanan = '$id_pemesanan' LIMIT 1");
   }

   $pembayaran = read("SELECT pemesanan.bukti_pembayaran, pemesanan.id_pemesanan, pemesanan.id_produk, produk.nama_produk, pemesanan.total, pemesanan.waktu_pemesanan, pemesanan.status_pemesanan 
   FROM pemesanan, produk 
   WHERE pemesanan.id_produk = produk.id_produk && username = '$username' ORDER BY pemesanan.waktu_pemesanan DESC LIMIT 1");
}
