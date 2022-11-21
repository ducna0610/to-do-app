<?php
session_start();
require '../connect.php';

$email = addslashes($_POST['email']);
$password = addslashes($_POST['password']);

if (isset($_POST['remember'])) {
    $remember = true;
} else {
    $remember = false;
}

if ($email == '' || $password == '') {
    $_SESSION['error'] = "Á à tắt Javascript à hacker lỏ:)";
    header('location: index.php');
    exit;
}

date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date("Y-m-d G:i:s", time());

$sql = "SELECT * FROM Users
WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($connect, $sql);

$number_rows = mysqli_num_rows($result);

if ($number_rows == 1) {
    $each = mysqli_fetch_array($result);
    $id_user = $each['id_user'];

    $_SESSION['id_user'] = $id_user;
    $_SESSION['name'] = $each['name'];
    $_SESSION['permission'] = $each['permission'];

    $sql = "UPDATE Users SET online = '$date' WHERE id_user = $id_user";

    mysqli_query($connect, $sql);

    if ($remember) {
        $token = uniqid('user_', true) . time();

        $sql = "UPDATE Users
        SET token = '$token'
        WHERE id_user = '$id_user'";

        mysqli_query($connect, $sql);

        setcookie('remember', $token, time() + 60 * 60 * 24 * 30);
    }

    if ($each['permission'] == 1) {
        header('location: ../admin');
        exit;
    } else {
        header('location: ../');
        exit;
    }
} else {
    $_SESSION['error'] = "Tài khoản hoặc mật khẩu không chính xác!";
    header('location: ./');
    exit;
}

mysqli_close($connect);
