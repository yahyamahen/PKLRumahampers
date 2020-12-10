<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <title>Marchendise</title>

</head>

<body>
   <!-- ====================================== NAVBAR ======================================== -->
   <?php require_once "navbar.php" ?>

   <!-- ==============================(WRITE YOUR) BODY (HERE)================================ -->

   <div class="container-main content">
      <div class="row d-flex justify-content-center">
         <div class="col-md-4">
            <div class="filter-marchendise">
               <p>marchendise</p>
            </div>
         </div>

         <div class="col-md-4">
            <div class="search-container">
               <form action="POST">
                  <button type="submit"><i class="fa fa-search"></i></button>
                  <input type="text" placeholder="Temukan hampersmu.." name="search" class="form-control" autocomplete="off">
               </form>
            </div>
         </div>

         <div class="col-md-4">
            <div class="filter-harga">
               <p>filer-harga</p>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-md-12">
            <a class="sub-title" href="#">Sajadah</a>
         </div>
      </div>

   </div>

   <!-- ====================================== FOOTER ======================================== -->
   <?php require_once "footer.php" ?>
   <script src="js/jquery-3.5.1.js"></script>
   <script src="js/jquery-3.5.1.min.js"></script>
   <script src="js/bootstrap.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <!-- <script src="bootstrap.bundle.js"></script> -->
   <!-- <script src="bootstrap.bundle.min.js"></script> -->
   <script src="js/font-awesome.min.js"></script>
   <script src="js/script.js"></script>
</body>

</html>