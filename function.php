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

function readAll($query)
{
   global $conn;
   $result = mysqli_query($conn, $query);
   $record = [];

   while ($data = mysqli_fetch_assoc($result))
      $record[] = $data;

   return $record;
}

function registration($data)
{
   global $conn;

   $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
   $email = htmlspecialchars($data['email']);
   // $username = strtolower(stripcslashes(htmlspecialchars($data["username"])));
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
   $result = mysqli_query($conn, "SELECT email FROM customers WHERE email = '$email';");

   if (mysqli_fetch_assoc($result)) {
      echo
         "<script>
			alert('Email sudah digunakan');
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
   (nama_lengkap, email, pass, no_telp, tanggal_lahir, provinsi, kota, kecamatan, alamat_lengkap, kodepos) 
   VALUES
   ( '$nama_lengkap', '$email', '$pass', '$no_telp', '$tanggal_lahir', '$provinsi', '$kota', '$kecamatan', '$alamat_lengkap', '$kodepos');";

   mysqli_query($conn, $insertsql);

   return mysqli_affected_rows($conn);
}
