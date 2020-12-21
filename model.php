<?php
if (isset($_GET['wishlist'])) {
   $wishlist = $_GET['wishlist'];
   $query = "SELECT customers.username, produk.nama_produk, produk.harga_produk, produk.jumlah_produk 
   FROM produk, wishlist, customers
   WHERE produk.id_produk = wishlist.id_produk && customers.username = wishlist.username && customers.username = '$wishlist';";
   $wishlist = read($query);
}

if (isset($_GET['produk'])) {
   $id_produk = $_GET['produk'];
   $produk = read("SELECT * FROM produk WHERE id_produk = '$id_produk'");
}

if (isset($_GET['marchendise'])) {
   $kategori = $_GET['marchendise'];
   $marchendise = read("SELECT * FROM produk WHERE kategori = '$kategori'");
}

if (isset($_SESSION['login']) && isset($_SESSION['username'])) {
   $username = $_SESSION['username'];
   $user = read("SELECT * FROM customers WHERE username = '$username';");
}
