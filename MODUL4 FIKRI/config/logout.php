<?php
session_start();
session_unset();
session_destroy();
header("location:../index.php");
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);
exit;
