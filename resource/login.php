<!-- Modal -->
<!-- <link rel="stylesheet" href="css/style.css"> -->

<div class="modal fade" id="form-input" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="judulModal">LOGIN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="" method="post">
               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control mb-3" id="email" name="email" placeholder="email">

                  <label class="d-inline" for="password">Password</label>
                  <a class=" d-inline float-right card-link" href="lupa_password" class="card-link d-block mb-1 mt-1">Lupa Password?</a>
                  <input type="password" class="form-control" id="password" name="password" placeholder="*******">

                  <input class="mt-3" type="checkbox" name="remember" id="remember">
                  <label for="remember">Remember Me</label>
               </div>

               <div class="modal-footer mt-n2">
                  <button type="submit" name="login" class="btn btn-danger modal-button">LOGIN</button>
                  <?php if (isset($error) && !isset($_SESSION['login'])) : ?>
                     <?php echo "<script> alert('Email / Password salah') </script>"; ?>
                     <p style="color: salmon; font-style: italic; text-align: center;">email / password salah</p>
                  <?php endif; ?>
               </div>
            </form>
            <div class="d-flex justify-content-center text-center">
               <label>Belum punya akun? </label><a href="#" class="card-link d-block mb-2" data-toggle="modal" data-target="#form-register"> Register</a>
            </div>
         </div>
      </div>
   </div>
</div>