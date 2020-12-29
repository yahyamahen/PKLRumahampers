<?php
date_default_timezone_set("Asia/Bangkok");

function connection()
{
   $dbServer = 'localhost';
   $dbUser = 'root';
   $dbPass = '';
   $dbName = "rumahampers";

   $conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbName);

   if (!$conn)
      die('Koneksi gagal: ' . mysqli_error($conn));

   mysqli_select_db($conn, $dbName);
   return $conn;
}

$conn = connection();

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

function read($query)
{
   global $conn;
   $result = mysqli_query($conn, $query);
   $record = [];

   while ($data = mysqli_fetch_assoc($result))
      $record[] = $data;

   echo mysqli_error($conn);
   return $record;
}

// =================================== KURIR ===================================== ///

function inputKurir($data)
{
   global $conn;

   $id_kurir = $data["id_kurir"];
   $nama_kurir = htmlspecialchars($data['nama_kurir']);
   $tipe_pengiriman = htmlspecialchars($data['tipe_pengiriman']);
   $harga_per_4_kg = htmlspecialchars($data['harga_per_4_kg']);

   echo $result = mysqli_query($conn, "SELECT id FROM kurir WHERE id = '$id_kurir'");
   if (mysqli_fetch_assoc($result)) {
      echo "<script>
               alert('Kurir sudah Terdaftar');
            </script>";
      return false;
   }

   mysqli_query($conn, "INSERT INTO kurir VALUES ('', '$nama_kurir', '$tipe_pengiriman', '$harga_per_4_kg');");

   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}

function updateSurat($data)
{
   global $conn;
   $id_kurir = $data["id_kurir"];
   $nama_kurir = htmlspecialchars($data['nama_kurir']);
   $tipe_pengiriman = htmlspecialchars($data['tipe_pengiriman']);
   $harga_per_4_kg = htmlspecialchars($data['harga_per_4_kg']);

   $query = "UPDATE kurir SET nama_kurir = '$nama_kurir', tipe_pengiriman = '$tipe_pengiriman', harga_per_4_kg = '$harga_per_4_kg' WHERE id_kurir = '$id_kurir';";

   mysqli_query($conn, $query);
   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}

function deleteKurir($id)
{
   global $conn;
   $query = "DELETE FROM kurir WHERE id_kurir = '$id';";

   mysqli_query($conn, $query);
   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}

// =================================== LIST TUJUAN PENGIRIMAN ===================================== ///

function inputKota($data)
{
   global $conn;

   $id_tujuan = $data["id_tujuan"];
   $provinsi = htmlspecialchars($data['provinsi']);
   $kota = htmlspecialchars($data['kota']);
   $harga_pengiriman = htmlspecialchars($data['harga_pengiriman']);

   echo $result = mysqli_query($conn, "SELECT id FROM list_tujuan_pengiriman WHERE id = '$id_tujuan'");
   if (mysqli_fetch_assoc($result)) {
      echo "<script>
               alert('Kota sudah Terdaftar');
            </script>";
      return false;
   }

   mysqli_query($conn, "INSERT INTO list_tujuan_pengiriman VALUES ('', '$provinsi', '$kota', '$harga_pengiriman');");

   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}

function updateKota($data)
{
   global $conn;
   $id_tujuan = $data["id_tujuan"];
   $provinsi = htmlspecialchars($data['provinsi']);
   $kota = htmlspecialchars($data['kota']);
   $harga_pengiriman = htmlspecialchars($data['harga_pengiriman']);

   $query = "UPDATE list_tujuan_pengiriman SET provinsi = '$provinsi', kota = '$kota', harga_pengiriman = '$harga_pengiriman' WHERE id_tujuan = '$id_tujuan';";

   mysqli_query($conn, $query);
   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}

function deleteKota($id)
{
   global $conn;
   $query = "DELETE FROM list_tujuan_pengiriman WHERE id_tujuan = '$id';";

   mysqli_query($conn, $query);
   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}


// =================================== CUSTOMERS ===================================== ///

function updateCustomers($data)
{
   global $conn;
   $username = $data["username"];
   $password = htmlspecialchars($data['password']);
   $password = password_hash($password, PASSWORD_DEFAULT);

   // $kota = htmlspecialchars($data['kota']);
   // $harga_pengiriman = htmlspecialchars($data['harga_pengiriman']);

   $query = "UPDATE customers SET pass = '$password' WHERE username = '$username';";

   mysqli_query($conn, $query);
   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}

function deleteCustomers($id)
{
   global $conn;
   $query = "DELETE FROM customers WHERE username = '$id';";

   mysqli_query($conn, $query);

   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}

// =================================== PEMESANAN ===================================== ///

function udpatePemesanan($data)
{
   global $conn;
   $id_pemesanan = $data["id_pemesanan"];
   $username = $data["status_pemesanan"];
   $status_pemesanan = $data["status_pemesanan"];

   $query = "UPDATE pemesanan SET status_pemesanan = '$status_pemesanan' WHERE username = '$username' && id_pemesanan = '$id_pemesanan';";

   mysqli_query($conn, $query);
   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}

function deletePemesanan($username, $id_pemesanan)
{
   global $conn;
   $query = "DELETE FROM pemesanan WHERE username = '$username' && id_pemesanan = '$id_pemesanan';";
   mysqli_query($conn, $query);

   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}
