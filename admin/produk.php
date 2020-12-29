<?php
session_start();
require_once "function.php";
require_once "model.php";

$kategori = read("SELECT kategori FROM produk GROUP BY kategori ORDER BY kategori ASC;");
$produk = read("SELECT * FROM produk;");

if (isset($_GET['kategori'])) {
   $ktg = $_GET['kategori'];
   $produk_filter = query("SELECT * FROM produk WHERE kategori = '$ktg';");
   // if (isset($_POST['search_btn'])) {
   //    $key = $_POST['keyword'];
   //    $surat_filter = read("SELECT * FROM surat WHERE kategori = '$ktg' && 
   // 	judul_surat LIKE '%$key%' OR
   // 	perusahaan LIKE '%$key%';");
   // }
}

$conn = mysqli_connect("localhost", "root", "", "rumahampers");

//cek apakah tombol submit sudah ditekan ato blm
if (isset($_POST["submit"])) {

   if (input($_POST) > 0) {
      echo "
				<script>
					alert('data berhasil ditambahkan');
					document.location.href = 'produk.php';
				</script>
			";
   } else {
      echo "
				<script>
					alert('data gagal ditambahkan');
				</script>
			";
   }
}

if (isset($_GET['delete'])) {
   $id_produk = $_GET['delete'];
   if (deleteProduk($id_produk) > 0) {
      echo "
         <script>
            alert('data berhasil dihapus');
            document.location.href = 'produk.php';
         </script>
      ";
   } else {
      echo "
         <script>
            alert('data gagal dihapus');
         </script>
      ";
   }
}

?>

<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="../css/bootstrap/bootstrap.css">
   <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <title>Admin Rumahampers</title>

</head>

<body>
   <div class="row">
      <?php require_once "sidebar.php" ?>

      <div class="col-md-10">
         <div class="content">
            <h2 class="mt-1">Admin Rumahampers</h2>

            <div class="row mt-3 table-main">
               <div class="col-md-4">
                  <button type="button" class="btn btn-info tombolTambahData mt-4" data-toggle="modal" data-target="#formModal-input">Tambah Produk</button>
               </div>
               <div class="col-md-4 d-flex">
                  <a class="card-link" href="produk" class=" d-inline" for=""> <strong>Kategori</strong> </a>
                  <ul class="">
                     <?php foreach ($kategori as $data) : ?>
                        <li class="d-inline mr-4"><a class=" card-link" href="produk?kategori=<?= $data['kategori'] ?>"><?= $data['kategori'] ?></a></li>
                     <?php endforeach; ?>
                  </ul>
               </div>
               <div class="col-lg-4">
                  <form action="" method="post">
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Produk..." name="keyword" id="keyword" autocomplete="off">
                        <div class="input-group-append">
                           <button class="btn btn-outline-info" type="submit" id="search_btn" name="search_btn">Cari</button>
                        </div>
                     </div>
                  </form>
               </div>

               <table class="table mt-3">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Jumlah Stok</th>
                        <th>Harga Produk</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (isset($_GET['kategori'])) : ?>
                        <?php $i = 1;
                        foreach ($produk_filter as $data) : ?>
                           <tr>
                              <th><?= $i; ?></th>
                              <td align="center" width="3%"><strong><?= $data['id_produk'] ?></strong></td>
                              <td align="center" class="d-flex">
                                 <div class="square mr-3">
                                    <img src="../images/produk/<?= $data['kategori'] ?>/<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>" alt="<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>">
                                 </div>
                                 <div class="nama-produk mt-n2    align-self-center">
                                    <strong><?= $data['nama_produk'] ?></strong>
                                 </div>
                              </td>
                              <td align="center"><?= $data['kategori'] ?></td>
                              <td align="center"><?= $data['jumlah_produk'] ?></td>
                              <td align="center">Rp. <?= number_format($data['harga_produk'], 0, ".", ".") ?></td>
                              <td width="5%" class=" text-center">
                                 <!-- <a class="badge badge-pill badge-primary ml-1" href="detail?id=<?= $data['id_produk'] ?>">Detail</a> -->
                                 <a class="badge badge-pill badge-success ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal-input" href="produk?update=<?= $data['id_produk']  ?>">Update</a>
                                 <a class="badge badge-pill badge-danger ml-1" onclick="return confirm('Anda Yakin?');" href="produk?delete=<?= $data['id_produk'] ?>">Hapus</a>
                              </td>
                           </tr>
                        <?php $i++;
                        endforeach; ?>
                     <?php else : ?>
                        <?php $i = 1;
                        foreach ($produk as $data) : ?>
                           <tr>
                              <th><?= $i; ?></th>
                              <td align="center" width="3%"><strong><?= $data['id_produk'] ?></strong></td>
                              <td align="center" class="d-flex">
                                 <div class="square mr-3">
                                    <img src="../images/produk/<?= $data['kategori'] ?>/<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>" alt="<?= $data['id_produk'] ?>/<?= $data['foto_produk'] ?>">
                                 </div>
                                 <div class="nama-produk mt-n2    align-self-center">
                                    <strong><?= $data['nama_produk'] ?></strong>
                                 </div>
                              </td>
                              <td align="center"><?= $data['kategori'] ?></td>
                              <td align="center"><?= $data['jumlah_produk'] ?></td>
                              <td align="center">Rp. <?= number_format($data['harga_produk'], 0, ".", ".") ?></td>
                              <td width="5%" class=" text-center">
                                 <!-- <a class="badge badge-pill badge-primary ml-1" href="detail?id=<?= $data['id_produk'] ?>">Detail</a> -->
                                 <a class="badge badge-pill badge-success ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal-input" href="produk?update=<?= $data['id_produk']  ?>">Update</a>
                                 <a class="badge badge-pill badge-danger ml-1" onclick="return confirm('Anda Yakin?');" href="produk?delete=<?= $data['id_produk'] ?>">Hapus</a>
                              </td>
                           </tr>
                        <?php $i++;
                        endforeach; ?>
                     <?php endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>

      <div class="modal fade" id="formModal-input" tabhome="-1" aria-labelledby="judulModal" aria-hidden="true">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="judulModal">Tambah Produk</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form action="#" method="post" enctype="multipart/form-data">

                     <div class="form-group">
                        <label for="id_produk">ID_Produk</label>
                        <input type="text" class="form-control" id="id_produk" name="id_produk" placeholder="ID Produk">
                     </div>

                     <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori">
                           <option value="Paket Bundle" selected>Paket Bundle</option>
                           <option value="Custom Box">Custom Box</option>
                           <option value="Sajadah">Sajadah</option>
                           <option value="Tasbih">Tasbih</option>
                           <option value="Quran">Quran</option>
                           <option value="Mukenah">Mukenah</option>
                           <option value="Sarung">Sarung</option>
                        </select>
                     </div>

                     <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk">
                     </div>

                     <div class="form-group">
                        <label for="harga_produk">Harga Produk</label>
                        <input type="number" class="form-control" id="harga_produk" name="harga_produk" placeholder="Harga produk">
                     </div>

                     <div class="form-group">
                        <label for="jumlah_produk">Jumlah Produk</label>
                        <input type="number" class="form-control" id="jumlah_produk" name="jumlah_produk" placeholder="Jumlah produk">
                     </div>

                     <div class="form-group">
                        <label for="berat_produk">Berat Produk</label>
                        <input type="number" class="form-control" id="berat_produk" name="berat_produk" placeholder="Berat produk">
                     </div>

                     <div class="form-group">
                        <label for="deskripsi_produk">Deskripsi Produk</label>
                        <textarea rows="3" class="form-control" id="deskripsi_produk" name="deskripsi_produk" placeholder="Deskripsi Produk"></textarea>
                        <p style="font-size: 0.9em;">Contoh : <br>
                           Sajadah dari Turki ukuran 70 x 150 cm Bahan Satin Tebal</p>
                     </div>

                     <div class="form-group">
                        <label for="warna_produk">Warna Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="warna_produk" placeholder="Warna Produk">
                     </div>

                     <div class="form-group">
                        <label for="foto_produk">Foto Produk</label>
                        <input type="file" class="" id="foto_produk" name="foto_produk" placeholder="Foto Produk">
                     </div>

                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->

      <script src="../js/js/jquery-3.5.1.js"></script>
      <script src="../js/js/jquery-3.5.1.min.js"></script>
      <script src="../js/js/popper.min.js"></script>
      <script src="../js/js/bootstrap.js"></script>
      <script src="../js/js/bootstrap.min.js"></script>
      <!-- <script src="../js/js/bootstrap.bundle.js"></script> -->
      <!-- <script src="js/js/bootstrap.bundle.min.js"></script> -->
      <script src="../js/js/font-awesome.min.js"></script>
      <script src="js/script.js"></script>
</body>

</html>