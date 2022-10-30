<?php

$token_expire = $_POST['token_expire'];
$password = $_POST['password'];

require '../connect.php';

$sql = "SELECT * FROM forgot_password 
WHERE token_expire = '$token_expire'";

$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result) === 0) {
    session_start();
    $_SESSION['error'] = "Tài khoản không tồn tại!";
    header('location: index.php');
    exit;
}

$id_user = mysqli_fetch_array($result)['id_user'];
$sql = "UPDATE Users 
SET
password = '$password'
WHERE
id_user = '$id_user'";

mysqli_query($connect, $sql);

// ---------------------------------------------------------

$sql = "DELETE FROM forgot_password 
WHERE
id_user = '$id_user'";

mysqli_query($connect, $sql);