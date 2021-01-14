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


function read($query)
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

   // var_dump($_FILES);

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

   // echo $namaFile . $ekstensiGambar;
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

   $namaFileBaru = $_POST['id_produk']  . "_" . "0" . "." . "jpg";

   $path = "../images/produk/" . $_POST['kategori'] . "/"  . $_POST['id_produk'];
   // echo $path;
   if (file_exists($path)) {
      move_uploaded_file($tmpName, '../images/produk/' . $_POST['kategori'] . "/"  . $_POST['id_produk'] . "/" . $namaFileBaru);
   } else {
      mkdir($path, 0777, true);
      move_uploaded_file($tmpName, '../images/produk/' . $_POST['kategori'] . "/"  . $_POST['id_produk'] . "/" . $namaFileBaru);
   }

   return $namaFileBaru;
}

function upload_gambar($data)
{
   $id_produk = htmlspecialchars($data['id_produk']);
   $kategori = htmlspecialchars($data['kategori']);
   $no_foto = htmlspecialchars($data['no_foto']);

   $filename = $_FILES['foto_produk']['name'];
   $ukuranFile = $_FILES['foto_produk']['size'];
   $error = $_FILES['foto_produk']['error'];
   $tmpName = $_FILES['foto_produk']['tmp_name'];

   if ($error === 4) {
      echo
      "<script>
			alert('Pilih gambar terlebih dahulu');
		</script>";
      return false;
   }

   $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
   $ekstensiGambar = explode('.', $filename);
   $ekstensiGambar = strtolower(end($ekstensiGambar));

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

   $newFileName = $id_produk . "_" . $no_foto . ".jpg";

   $path = "../images/produk/" . $kategori . "/" . $id_produk;
   // echo $path . "/" . $newFileName . "<br>";
   // exit;
   if (file_exists($path)) {
      move_uploaded_file($tmpName, '../images/produk/' . $kategori . "/" . $id_produk . "/" . $newFileName);
   } else {
      mkdir($path, 0777, true);
      move_uploaded_file($tmpName, '../images/produk/' . $kategori . "/" . $id_produk . "/" . $newFileName);
   }

   echo
   "<script>
      alert('Gambar berhasil diupdate');
      document.location.href = 'produk';
   </script>";
   // }
}

function deleteProduk($id)
{
   global $conn;
   $query = "DELETE FROM produk WHERE id_produk = '$id';";
   mysqli_query($conn, $query);

   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}

function update($data)
{
   global $conn;
   $key = $data["id_produk"];

   $id_produk = htmlspecialchars($data["id_produk"]);
   $kategori = htmlspecialchars($data["kategori"]);
   $nama_produk = htmlspecialchars($data["nama_produk"]);
   $harga_produk = ($data["harga_produk"]);
   $jumlah_produk = ($data["jumlah_produk"]);
   $berat_produk = ($data["berat_produk"]);
   $deskripsi_produk = htmlspecialchars($data["deskripsi_produk"]);
   $foto_produk_lama = ($data["foto_produk_lama"]);
   $warna_produk = htmlspecialchars($data["warna_produk"]);

   // var_dump($_FILES);
   // echo $foto_produk_lama . "<br>";

   if ($_FILES['foto_produk']['error'] === 4) {
      $foto_produk = $foto_produk_lama;
   } else {
      $foto_produk = upload();
   }
   // echo $foto_produk;
   // exit;

   $query = "UPDATE produk SET id_produk = '$id_produk', kategori = '$kategori' , nama_produk = '$nama_produk' , harga_produk = '$harga_produk' , jumlah_produk = '$jumlah_produk' , berat_produk = '$berat_produk' , deskripsi_produk = '$deskripsi_produk' , foto_produk = '$foto_produk' , warna_produk = '$warna_produk' WHERE id_produk = '$key';";

   $result = mysqli_query($conn, $query);

   // echo mysqli_affected_rows($conn);
   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
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

function updateKurir($data)
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

function deleteCustomers($username)
{
   global $conn;
   $query = "DELETE FROM wishlist WHERE username = '$username';";
   mysqli_query($conn, $query);

   $query = "DELETE FROM trolley WHERE username = '$username';";
   mysqli_query($conn, $query);

   $query = "DELETE FROM pemesanan WHERE username = '$username';";
   mysqli_query($conn, $query);

   $query = "DELETE FROM customers WHERE username = '$username';";
   mysqli_query($conn, $query);
   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}

function updatePassword($data)
{
   global $conn;
   $username = htmlspecialchars($data['username_pass']);
   $password = mysqli_real_escape_string($conn, $data["password_baru"]);
   $password = password_hash($data['password_baru'], PASSWORD_DEFAULT);

   $query = "UPDATE customers SET pass = '$password' WHERE username = '$username';";

   mysqli_query($conn, $query);
   return mysqli_affected_rows($conn);
}


// =================================== PEMESANAN ===================================== ///

function updatePemesanan($data)
{
   global $conn;
   $id_pemesanan = $data["id_pemesanan"];
   $username = $data['username'];
   $status_pemesanan = htmlspecialchars($data['status_pemesanan']);

   $query = "UPDATE pemesanan SET status_pemesanan = '$status_pemesanan' WHERE id_pemesanan = '$id_pemesanan' && username = '$username';";

   mysqli_query($conn, $query);

   echo mysqli_error($conn);
   return mysqli_affected_rows($conn);
}

function update_pemesanan($data)
{
   global $conn;
   $id_pemesanan = $data["id_pemesanan"];
   $username = $data['username'];
   $status_pemesanan = $data['status_pemesanan'];
   $id_kurir = $data['id_kurir'];
   $nama_kurir = $data['nama_kurir'];
   $id_tujuan = $data['id_tujuan'];
   $kota = $data['kota'];
   $resi_pengiriman =  null;

   if ($status_pemesanan == 'Menunggu Pembayaran') {
      $status_pemesanan = 'Pemesanan Diproses';
   } else if ($status_pemesanan == 'Menunggu Konfirmasi Pembayaran') {
      $status_pemesanan = 'Pemesanan Diproses';
   } else if ($status_pemesanan == 'Pemesanan Diproses') {
      $status_pemesanan = 'Proses Pengiriman';
      $resi_pengiriman =  $id_pemesanan . "/" . $nama_kurir . "_" . $id_kurir . "/" .  $id_tujuan . "_" . $kota  . "/" . date('d-m-Y', time());
   } else if ($status_pemesanan == 'Proses Pengiriman') {
      $status_pemesanan = 'Pesanan Selesai';
      $resi_pengiriman =  $id_pemesanan . "/" . $nama_kurir . "_" . $id_kurir . "/" .  $id_tujuan . "_" . $kota  . "/" . date('d-m-Y', time());
   } else if ($status_pemesanan == 'Pesanan Selesai') {
      echo "
      <script>
         alert('Pemesanan sudah selesai');
         document.location.href='pemesanan';
      </script>";
      return false;
   } else {
      echo "
      <script>
         alert('Waktu pembayaran sudah expired');
         document.location.href='pemesanan';
      </script>";
   }

   // echo "<br>" . $id_pemesanan;
   // echo "<br>" . $username;
   // echo "<br>" . $status_pemesanan;
   // echo "<br>" . $id_kurir;
   // echo "<br>" . $nama_kurir;
   // echo "<br>" . $id_tujuan;
   // echo "<br>" . $resi_pengiriman;
   // exit;

   $query = "UPDATE pemesanan SET status_pemesanan = '$status_pemesanan', resi_pengiriman = '$resi_pengiriman' WHERE id_pemesanan = '$id_pemesanan' && username = '$username';";

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

function search($cari)
{
   $query = "SELECT * FROM produk WHERE id_produk LIKE '%$cari%' OR 
		nama_produk LIKE '%$cari%'";

   return query($query);
}
