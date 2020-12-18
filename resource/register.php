<?php
// require_once "function.php";
function userCreated()
{
   global $conn;

   if (isset($_POST["regist"])) {
      if (registration($_POST) == 1) {
         echo "User berhasil ditambahkan";
         echo
            "<script>
				   alert('User berhasil ditambahkan');
			   </script>";
      } else {
         echo "<script> alert('Error :  " . mysqli_error($conn) . "'</script>;";
      }
   }
}
?>

<!-- Modal -->
<div class="modal fade" id="form-register" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="judulModal">DAFTAR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="" method="post">
               <div class="row">
                  <div class="col-md-12">
                     <label for="nama_lengkap" class="form-label">Nama Lengkap *</label>
                     <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap Kamu" autocomplete="off">
                  </div>
                  <div class="col-md-12 mt-2">
                     <label for="username" class="form-label">Username *</label>
                     <input type="text" class="form-control" name="username" id="username" placeholder="Buat Username" autocomplete="off">
                  </div>
                  <div class="col-md-12 mt-2">
                     <label for="email" class="form-label">Email *</label>
                     <input type="email" class="form-control" name="email" id="email" placeholder="email@mail.com" autocomplete="off">
                  </div>
                  <div class="col-md-12 mt-2">
                     <label for="pass" class="form-label">Password *</label>
                     <input type="password" class="form-control" name="pass" id="pass" placeholder="**********" autocomplete="off">
                  </div>
                  <div class="col-md-12 mt-2">
                     <label for="pass2" class="form-label">Konfirmasi Password *</label>
                     <input type="password" class="form-control" name="pass2" id="pass2" placeholder="**********" autocomplete="off">
                  </div>
                  <div class="col-md-12 mt-2">
                     <label for="no_telp" class="form-label">No. Handphone *</label>
                     <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="085777333888" autocomplete="off">
                  </div>
                  <div class="col-md-12 mt-2">
                     <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                     <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="16-10-2000" autocomplete="off">
                  </div>
                  <div class="col-md-12 mt-2">
                     <label class="form-label">Alamat *</label>
                  </div>
                  <div class="col-md-4">
                     <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi">
                  </div>
                  <div class="col-md-4">
                     <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota/Kabupaten">
                  </div>
                  <div class="col-md-4">
                     <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan">
                  </div>
                  <div class="col-md-12 mt-2">
                     <input type="textarea" class="form-control alamat-lengkap" name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat Lengkap">
                  </div>
                  <div class="col-md-12 mt-2">
                     <input type="number" class="form-control" name="kodepos" id="kodepos" placeholder="Kode Pos" autocomplete="off">
                  </div>
               </div>
               <!-- <div class="col-md-12 mt-2">
                     <label for="catatan" class="form-label">Catatan Pemesanan *</label>
                     <input type="textarea" class="form-control catatan-pemesanan" name="catatan" id="catatan">
                  </div> -->

               <div class="modal-footer">
                  <button type="submit" name="regist" class="btn btn-primary modal-button">DAFTAR</button>
                  <?php userCreated(); ?>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>