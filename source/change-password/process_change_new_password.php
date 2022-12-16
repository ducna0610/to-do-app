<?php
session_start();

if (($_POST['password']) === '') {
    $_SESSION['error'] = "Hacker lỏ :)";
    header('location: ../sign-in-up/');
    exit;
}

$token_expire = $_POST['token_expire'];
$password = $_POST['password'];

require '../connect.php';

$sql = "SELECT * FROM forgot_password 
WHERE token_expire = '$token_expire'";

$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) === 0) {
    $_SESSION['error'] = "Tài khoản không tồn tại!";
    header('location: ../sign-in-up');
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

mysqli_close($connect);

$_SESSION['error'] = "Đổi mật khẩu thành công!";
header('location: ../sign-in-up');
