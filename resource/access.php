<?php
if (isset($_COOKIE['user']) && isset($_COOKIE['key'])) {
   $username = $_COOKIE['user'];
   $key = $_COOKIE['key'];

   $query = "SELECT email FROM customers WHERE username = '$username';";
   $row = read($query);
   // var_dump($row["email"]);

   if ($key === hash('sha256', $row['email'])) {
      $_SESSION['login'] = true;
   }
}

// if (isset($_SESSION['login'])) {
//    header("Location: marchendise.php");
//    exit;
// }

if (isset($_POST["login"])) {

   $email = $_POST["email"];
   $password = $_POST["password"];

   $result = mysqli_query($conn, "SELECT * FROM customers WHERE email = '$email';");

   // cek email
   if (mysqli_num_rows($result) === 1) {
      //cek password
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row["pass"])) {

         // set session
         $_SESSION['login'] = true;

         // set remember me
         if (isset($_POST['remember'])) {
            setcookie('user', $row['username'], time() + 3600);
            setcookie('key', hash('sha256', $row['email']), time() + 3600);
         }

         header("Location: index.php");
         exit;
      }
   }

   $error = true;
}
