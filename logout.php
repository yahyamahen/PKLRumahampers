<?php
session_start();
echo $_SESSION["login"] . "<br>";
$_SESSION = [];
session_unset();
session_destroy();

setcookie("user", "", time() - 700000);
setcookie("key", "", time() - 700000);

echo $_COOKIE["user"] . "<br>";
echo $_COOKIE["key"];


header("Location: index.php");
exit;
