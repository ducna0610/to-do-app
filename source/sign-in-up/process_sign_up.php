<?php
session_start();
require '../connect.php';

// Chong SQL Injection
$name = addslashes($_POST['name']);
$email = addslashes($_POST['email']);

$password = addslashes($_POST['password']);
$confirm_password = addslashes($_POST['confirm_password']);

// email da ton tai
$sql = "SELECT * FROM Users WHERE email = '$email'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($result);

if ($number_rows === 1) {
    $_SESSION['error'] = "Ai đó đã dùng email này rồi!";
    header('location: ./');
    exit;
}

if ($password !== $confirm_password) {
    $_SESSION['error'] = "Bạn có chắc là nhớ mật khẩu mình đã đặt?";
    header('location: ./');
    exit;
}

if ($name === '' || $email === '' || $password === '' || $confirm_password === '') {
    $_SESSION['error'] = "Á à tắt Javascript à hacker lỏ:)";
    header('location: ./');
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

include '../mail/send_mail.php';
sendMail(
    $email,
    $name,
    'Đăng ký tài khoản thành công',
    '<div>
        <h1>To Do App</h1>
        <b>Hello</b>
        <br>
        Welcome to To Do App
        <br>
        
        <a href="https://ducna0610.epizy.com/to-do-app">Trang chủ</a>
        <br>
        
        <i>
            Thank you for using our application!
        </i>
        <br>
        Regards,
        <br>
        To Do App
    </div>'
);

header('location: ../');
