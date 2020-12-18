<footer class="footer">
   <div class="container-main">
      <div class="row">
         <div class="social-media col-md-4">
            <h4>SOCIAL MEDIA</h4>
            <ul>
               <li>
                  <img src="images/assets/whatsapp.png" alt="whatsapp">
                  <a href="#">+6285 6495 72121</a>
               </li>
               <li>
                  <img src="images/assets/gmail.png" alt="email">
                  <a href="#">email@rumahapers.com</a>
               </li>
               <li>
                  <img src="images/assets/instagram.png" alt="instagram">
                  <a href="#">rumahampers</a>
               </li>
            </ul>
         </div>

         <div class="marketplace col-md-4">
            <h4>TEMUKAN KAMI</h4>
            <p>@rumahampers</p>
            <a href="#">
               <img src="images/assets/tokopedia.png" alt="tokopedia">
            </a>
            <a href="#">
               <img src="images/assets/shoppee.png" alt="shoppee">
            </a>
            <a href="#">
               <img src="images/assets/bukalapak.png" alt="bukalapak">
            </a>
            <p>Jl. Pattimura Blok VII No. 43, Genteng, Surabaya
               Jawa Timur 60231, Indonesia</p>
         </div>

         <div class="pembayaran col-md-4">
            <h4>PEMBAYARAN</h4>
            <ul class="">
               <li>
                  <img src="images/assets/bca.png" alt="bca">
                  <img src="images/assets/bni.png" alt="bni">
               </li>
            </ul>
            <ul>
               <li>
                  <img src="images/assets/bri.png" alt="bri">
                  <img src="images/assets/mandiri.png" alt="mandiri">
               </li>
            </ul>
         </div>

         <div class="col-md-12">
            <p><strong>copyrights @2020 rumahampers</strong> </p>
         </div>
      </div>
   </div>
</footer>

<?php
// if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
//    $id = $_COOKIE['id'];
//    $key = $_COOKIE['key'];

//    $query = "SELECT email FROM customers WHERE id = '$id';";

//    $row = readAll($query);

//    if ($key === hash('sha256', $row['email'])) {
//       $_SESSION['login'] = true;
//    }
// }

// if (isset($_SESSION["login"])) {
//    // header("Location: index.php");
//    exit;
// }

// if (isset($_POST["login"])) {

//    $email = $_POST["email"];
//    $password = $_POST["password"];

//    $result = mysqli_query($conn, "SELECT * FROM customers WHERE email = '$email';");

//    // cek email
//    if (mysqli_num_rows($result) === 1) {
//       //cek password
//       $row = mysqli_fetch_assoc($result);
//       if (password_verify($password, $row["password"])) {
//          // set session
//          $_SESSION['login'] = true;

//          // set remember me
//          if (isset($_POST['remember'])) {
//             setcookie('id', $row['id']); //, time() + 60);
//             setcookie('key', hash('sha256', $row['email'])); //, time() + 60);
//          }

//          // header("Location: index.php");
//          exit;
//       }
//    }

//    $error = true;
// }

?>

<?php require "resource/login.php" ?>
<?php require "resource/register.php" ?>