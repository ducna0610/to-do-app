<?php
session_start();
require '../connect.php';

$name = addslashes($_POST['name']);
$email = addslashes($_POST['email']);

$password = ($_POST['password']);
$confirm_password = ($_POST['confirm_password']);

// email da ton tai
$sql = "SELECT * FROM Users WHERE email = '$email'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);

if ($number_rows == 1) {
    $_SESSION['error'] = "Ai đó đã sài email này rồi!";
    header('location: index.php');
    exit;
}

if ($password != $confirm_password) {
    $_SESSION['error'] = "Bạn có chắc là nhớ mật khẩu mình đã đặt?";
    header('location: index.php');
    exit;
}

if ($name == '' || $email == '' || $password == '' || $confirm_password == '') {
    $_SESSION['error'] = "Á à tắt Javascript à ko có đâu:)";
    header('location: index.php');
    exit;
}

$sql = "INSERT INTO Users (name, email, password)
VALUES ('$name', '$email', '$password')";

mysqli_query($connect, $sql);

$sql = "SELECT * FROM Users WHERE email = '$email'";

$result = mysqli_query($connect, $sql);

$each = mysqli_fetch_array($result);


$_SESSION['id_user'] = $each['id_user'];
$_SESSION['name'] = $each['name'];
$_SESSION['permission'] = 0;

mysqli_close($connect);

header('location: ../index.php');
