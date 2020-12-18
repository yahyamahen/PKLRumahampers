<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('user', '');
setcookie('key', '');

header("Location: ../index.php");
exit;
