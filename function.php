<?php
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

function registration($data)
{
   global $conn;

   $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
   $email = htmlspecialchars($data['email']);
   $username = strtolower(stripcslashes(htmlspecialchars($data['username'])));
   $pass = mysqli_real_escape_string($conn, htmlspecialchars($data['pass']));
   $pass2 = mysqli_real_escape_string($conn, htmlspecialchars($data['pass2']));
   $no_telp = htmlspecialchars($data['no_telp']);
   $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
   $provinsi = htmlspecialchars($data['provinsi']);
   $kota = htmlspecialchars($data['kota']);
   $kecamatan = htmlspecialchars($data['kecamatan']);
   $alamat_lengkap = htmlspecialchars($data['alamat_lengkap']);
   $kodepos = htmlspecialchars($data['kodepos']);

   // cek username sudah ada ada belum 
   $result = mysqli_query($conn, "SELECT username FROM customers WHERE username = '$username';");

   if (mysqli_fetch_assoc($result)) {
      echo
         "<script>
			   alert('Username sudah digunakan');
		   </script>";
      return false;
   }

   // konfirmasi password
   if ($pass !== $pass2) {
      echo
         "<script>
			   alert('Password tidak sesuai!');
		   </script>";
      return false;
   }

   // enkirpsi password
   $pass = password_hash($pass, PASSWORD_DEFAULT);

   // tambahkan user baru ke database
   $insertsql =
      "INSERT INTO customers 
      (username, pass, nama_lengkap , email, no_telp, tanggal_lahir, provinsi, kota, kecamatan, alamat_lengkap, kodepos) 
      VALUES
      ( '$username', '$pass', '$nama_lengkap', '$email', '$no_telp', '$tanggal_lahir', '$provinsi', '$kota', '$kecamatan', '$alamat_lengkap', '$kodepos');";

   mysqli_query($conn, $insertsql);

   return mysqli_affected_rows($conn);
}
