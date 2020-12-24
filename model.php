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

function if_not_login()
{
   if (!isset($_SESSION['login'])) {
      echo
         "<script>
            alert('Login terlebih dahulu!');
         </script>";
      exit;
   }
}


if (isset($_GET['wishlist'])) {
   $wishlist = $_GET['wishlist'];
   $query = "SELECT customers.username, produk.id_produk, produk.nama_produk, produk.harga_produk, produk.jumlah_produk 
   FROM produk, wishlist, customers
   WHERE produk.id_produk = wishlist.id_produk && customers.username = wishlist.username && customers.username = '$wishlist';";
   $wishlist = read($query);
}

if (isset($_GET['produk'])) {
   $id_produk = $_GET['produk'];
   $produk = read("SELECT * FROM produk WHERE id_produk = '$id_produk'");
}

if (isset($_GET['kategori'])) {
   $kategori = $_GET['kategori'];
   $marchendise = read("SELECT * FROM produk WHERE kategori = '$kategori'");
}

if (isset($_SESSION['login']) && isset($_SESSION['username'])) {
   $username = $_SESSION['username'];
   $user = read("SELECT * FROM customers WHERE username = '$username';");
}

if (isset($_SESSION['login']) && isset($_SESSION['username']) && isset($_GET['wishlist'])) {
   $wishlist = $_GET['wishlist'];
   $username = $_SESSION['username'];
   $query = "SELECT customers.username, produk.id_produk, produk.nama_produk, produk.harga_produk, produk.jumlah_produk 
   FROM produk, wishlist, customers
   WHERE produk.id_produk = wishlist.id_produk && customers.username = wishlist.username && customers.username = '$username';";
   $wishlist = read($query);
}

if (isset($_SESSION['login']) && isset($_SESSION['username'])) {
   $username = $_SESSION['username'];
   $query = " SELECT customers.username, produk.id_produk, produk.nama_produk, trolley.total_pcs, produk.harga_produk
   FROM produk, trolley, customers
   WHERE produk.id_produk = trolley.id_produk && customers.username = trolley.username && customers.username = '$username';";
   $trolley = read($query);
   $total_cart = read("SELECT SUM(produk.`harga_produk` * trolley.`total_pcs`) AS total_cart FROM produk, customers, trolley
   WHERE produk.`id_produk` = trolley.`id_produk` && customers.`username` = trolley.`username` && customers.`username` = '$username';");
}
