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
