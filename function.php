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


function update($data)
{
   global $conn;
   $key = $data["username"];

   $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
   $email = htmlspecialchars($data['email']);
   // $username = strtolower(stripcslashes(htmlspecialchars($data['username'])));
   // $password = mysqli_real_escape_string($conn, htmlspecialchars($data['password']));
   // $pass2 = mysqli_real_escape_string($conn, htmlspecialchars($data['pass2']));
   $no_telp = htmlspecialchars($data['no_telp']);
   $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
   $provinsi = htmlspecialchars($data['provinsi']);
   $kota = htmlspecialchars($data['kota']);
   $kecamatan = htmlspecialchars($data['kecamatan']);
   $alamat_lengkap = htmlspecialchars($data['alamat_lengkap']);
   $kodepos = htmlspecialchars($data['kodepos']);
   $gambarLama = htmlspecialchars($data['gambar_lama']);

   if ($_FILES['gambar']['error'] === 4) {
      $gambar = $gambarLama;
   } else {
      $gambar = upload();
   }

   $query = "UPDATE customers SET nama_lengkap = '$nama_lengkap', email = '$email', no_telp = '$no_telp', tanggal_lahir = '$tanggal_lahir', provinsi = '$provinsi', kota = '$kota', kecamatan = '$kecamatan', alamat_lengkap = '$alamat_lengkap', kodepos = '$kodepos', foto_profil = '$gambar' WHERE username = '$key';";

   mysqli_query($conn, $query);
   return mysqli_affected_rows($conn);
}

function upload()
{
   $namaFile = $_FILES['gambar']['name'];
   $ukuranFile = $_FILES['gambar']['size'];
   $error = $_FILES['gambar']['error'];
   $tmpName = $_FILES['gambar']['tmp_name'];

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
   if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo
         "<script>
			alert('Yang diupload harus gambar');
		</script>";
      return false;
   }

   if ($ukuranFile > 5000000) {
      echo
         "<script>
			alert('File gambar minimal berukuran 4096kb');
		</script>";
      return false;
   }

   $namaFileBaru = $_POST['username'] . "_" . date('d-M-Y', time()) . "_" . uniqid() . "." . $ekstensiGambar;

   $path = "images/" . $_POST['username'];
   if (file_exists($path)) {
      move_uploaded_file($tmpName, 'images/' . $_POST['username'] . "/" . $namaFileBaru);
   } else {
      mkdir($path, 0777, true);
      move_uploaded_file($tmpName, 'images/' . $_POST['username'] . "/" . $namaFileBaru);
   }

   return $namaFileBaru;
}

function wishlist_trolley_added_notice()
{
   global $conn;

   if (isset($_POST["add_wishlist"])) {
      if (add_wishlist_trolley($_POST) == 1) {
         echo
            "<script>
				   alert('Produk berhasil ditambahkan pada wishlist');
            </script>";
      } else {
         echo "<script> alert('Error :  " . mysqli_error($conn) . "'</script>;";
      }
   }

   if (isset($_POST["add_trolley"])) {
      if (add_wishlist_trolley($_POST) == 1) {
         echo
            "<script>
				   alert('Produk berhasil ditambahkan pada trolley');
			   </script>";
      } else {
         echo "<script> alert('Error :  " . mysqli_error($conn) . "'</script>;";
      }
   }
}


function add_wishlist_trolley($data)
{
   global $conn;
   if (isset($data['add_wishlist']) && isset($data['id_produk'])) {
      $username = htmlspecialchars($data['username']);
      $id_produk = htmlspecialchars($data['id_produk']);

      $result = mysqli_query($conn, "SELECT * FROM wishlist WHERE username = '$username' && id_produk = '$id_produk';");

      if (mysqli_fetch_assoc($result)) {
         echo
            "<script>
               alert('Produk di wishlist sudah ada');
            </script>";
         return false;
      }

      $insertsql = "INSERT INTO wishlist (id, username, id_produk) VALUES ( '', '$username', '$id_produk');";
      mysqli_query($conn, $insertsql);

      echo mysqli_error($conn);
      return mysqli_affected_rows($conn);
   }

   if (isset($_POST['add_trolley'])) {
      $username = htmlspecialchars($data['username']);
      $id_produk = htmlspecialchars($data['id_produk']);
      $total_pcs = htmlspecialchars($data['total_pcs']);

      $result = mysqli_query($conn, "SELECT * FROM trolley WHERE username = '$username' && id_produk = '$id_produk';");

      if (mysqli_fetch_assoc($result)) {
         echo
            "<script>
               alert('Produk di trolley sudah ada');
            </script>";
         return false;
      }

      $insertsql = "INSERT INTO trolley (id, username, id_produk, total_pcs) VALUES ( '', '$username', '$id_produk', '$total_pcs');";
      mysqli_query($conn, $insertsql);

      echo mysqli_error($conn);
      return mysqli_affected_rows($conn);
   }
}


function delete_wishlist($username, $id_produk)
{
   global $conn;
   $query = "DELETE FROM wishlist WHERE username = '$username' && id_produk = '$id_produk';";
   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}


function delete_trolley($username, $id_produk)
{
   global $conn;
   $query = "DELETE FROM trolley WHERE username = '$username' && id_produk = '$id_produk';";
   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
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
