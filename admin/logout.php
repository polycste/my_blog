<?php
session_start();
setcookie('username', '');
setcookie('cookie', '');
unset($_SESSION);
session_destroy();
header('Location: ../frontend/home.php');
