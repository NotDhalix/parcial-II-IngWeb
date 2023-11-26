<?php
session_start();
session_unset();
session_destroy();
setcookie('session_cookie', '', time() - 21600, '/');
setcookie('name_cookie', '', time() - 21600, '/');
header("Location: ../index.html");
exit();
?>