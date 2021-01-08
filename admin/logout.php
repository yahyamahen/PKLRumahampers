<?php
session_start();
require_once "function.php";
require_once "model.php";
if_not_login_back_to_login();

$_SESSION = [];
session_unset();
session_destroy();

setcookie('id', '', time() - 700000);
setcookie('key', '', time() - 700000);

header("Location: login");
exit;
