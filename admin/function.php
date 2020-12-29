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

function query($query)
{
   global $conn;
   $result = mysqli_query($conn, $query);
   $record = [];

   while ($data = mysqli_fetch_assoc($result)) {
      $record[] = $data;
   }

   echo mysqli_error($conn);
   return $record;
}

function registrasi($data)
{
   global $conn;

   $username = strtolower(stripslashes($data["username"]));
   $password = mysqli_real_escape_string($conn, $data["password"]);
   $password2 = mysqli_real_escape_string($conn, $data["password2"]);

   $result = mysqli_query($conn, "SELECT username FROM user WHERE username= '$username'");
   $row = mysqli_fetch_assoc($result);

   if (mysqli_fetch_assoc($result)) {
      echo "<script>
               alert('username sudah terdaftar'); 
            </script>";
      return false;
   }

   if ($password !== $password2) {
      echo "<script>
      alert('konfirmasi password tidak sesuai') </script>";
      return false;
   }

   $password = password_hash($password, PASSWORD_DEFAULT);
   // $password = md5($password);
   // var_dump($password);
   // die;

   mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password')");

   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}

function input($data)
{
   global $conn;
   $id_produk = htmlspecialchars($data["id_produk"]);
   $kategori = htmlspecialchars($data["kategori"]);
   $nama_produk = htmlspecialchars($data["nama_produk"]);
   $harga_produk = ($data["harga_produk"]);
   $jumlah_produk = ($data["jumlah_produk"]);
   $berat_produk = ($data["berat_produk"]);
   $deskripsi_produk = htmlspecialchars($data["deskripsi_produk"]);
   $foto_produk = upload();
   $warna_produk = htmlspecialchars($data["warna_produk"]);


   if (!$foto_produk) {
      return false;
   }

   $query = "INSERT INTO produk VALUES ('$id_produk','$kategori','$nama_produk','$harga_produk','$jumlah_produk','$berat_produk','$deskripsi_produk','$foto_produk','$warna_produk');";

   mysqli_query($conn, $query);
   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}

function upload()
{
   $namaFile = $_FILES['foto_produk']['name'];
   $ukuranFile = $_FILES['foto_produk']['size'];
   $error = $_FILES['foto_produk']['error'];
   $tmpName = $_FILES['foto_produk']['tmp_name'];

   var_dump($_FILES);

   if ($error === 4) {
      echo
         "<script>
			alert('Pilih gambar terlebih dahulu');
		</script>";
      return false;
   }

   $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
   $ekstensiGambar = explode('.', $namaFile);
   $ekstensiGambar = strtolower(end($ekstensiGambar));

   echo $namaFile . $ekstensiGambar;
   if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo
         "<script>
			alert('Yang diupload harus gambar');
		</script>";
      return false;
   }

   if ($ukuranFile > 1000000) {
      echo
         "<script>
			alert('File gambar minimal berukuran 1024kb');
		</script>";
      return false;
   }

   $namaFileBaru = $_POST['id_produk']  . "_" . "0" . "." . $ekstensiGambar;

   $path = "../images/produk/" . $_POST['kategori'] . "/"  . $_POST['id_produk'];
   echo $path;
   if (file_exists($path)) {
      move_uploaded_file($tmpName, '../images/produk/' . $_POST['kategori'] . "/"  . $_POST['id_produk'] . "/" . $namaFileBaru);
   } else {
      mkdir($path, 0777, true);
      move_uploaded_file($tmpName, '../images/produk/' . $_POST['kategori'] . "/"  . $_POST['id_produk'] . "/" . $namaFileBaru);
   }

   return $namaFileBaru;
}

function deleteProduk($id)
{
   global $conn;
   $query = "DELETE FROM produk WHERE id_produk = '$id';";
   mysqli_query($conn, $query);

   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}
