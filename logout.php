<?php
session_start();
require_once "function.php";
require_once "model.php";
if_not_login_back_to_home();

echo $_SESSION["login"] . "<br>";
$_SESSION = [];
session_unset();
session_destroy();

setcookie("user", "", time() - 700000);
setcookie("key", "", time() - 700000);

echo $_COOKIE["user"] . "<br>";
echo $_COOKIE["key"];


header("Location: home");
exit;
