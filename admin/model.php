<?php

function if_not_login_back_to_login()
{
   if (!isset($_SESSION['login'])) {
      echo
         "<script>
            alert('Login terlebih dahulu!');
            document.location.href='login';
         </script>";
      exit;
   }
}

$user = read("SELECT * FROM user");
// if (isset($_SESSION['login'])) {
// }
