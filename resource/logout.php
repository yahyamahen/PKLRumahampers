<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('user', '', time() - 9999);
setcookie('key', '', time() - 9999);

header("Location: ../index.php");
exit;
