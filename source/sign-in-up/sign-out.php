<?php

session_start();

unset($_SESSION['id_user']);
unset($_SESSION['name']);
unset($_SESSION['permisson']);
$_SESSION['permission'] = 0;

setcookie('remember', null, -1);

header('location: ../');
