<?php
if (isset($_COOKIE['user']) && isset($_COOKIE['key'])) {
   $username = $_COOKIE['user'];
   $key = $_COOKIE['key'];

   $result = mysqli_query($conn, "SELECT * FROM customers WHERE username = '$username';");
   $row = mysqli_fetch_assoc($result);

   if ($key === hash('sha256', $row['email'])) {
      $_SESSION['login'] = true;
      $_SESSION['username'] = $row['username'];
   }
}

// if (isset($_SESSION['login'])) {
//    header('Refresh: 0');
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
         $_SESSION['username'] = $row['username'];

         // set remember me
         if (isset($_POST['remember'])) {
            setcookie('user', $row['username']);
            setcookie('key', hash('sha256', $row['email']));
         }

         header("Refresh: 0");
         exit;
      }
   }

   $error = true;
}
