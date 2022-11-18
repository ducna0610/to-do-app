<?php

function current_url()
{
    $url = "http://" . $_SERVER['HTTP_HOST'];
    return $url;
}

if (($_POST['email']) === '') {
    $_SESSION['error'] = "Hacker lỏ :)";
    header('location: index.php');
    exit;
}

$email = $_POST['email'];

require '../connect.php';

$sql = "SELECT * FROM Users WHERE email = '$email'";

$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) === 1) {
    $each = mysqli_fetch_array($result);
    $id_user = $each['id_user'];
    $name = $each['name'];

    $sql = "DELETE FROM forgot_password WHERE id_user = '$id_user'";
    mysqli_query($connect, $sql);

    $token_expire = uniqid('token_expire_', true) . time();
    $sql = "INSERT INTO forgot_password (id_user, token_expire) 
    values ('$id_user', '$token_expire')";
    mysqli_query($connect, $sql);
    mysqli_close($connect);

    $link = current_url() . '/to-do-app/source/change-password/change_new_password.php?token_expire=' . $token_expire;

    require '../mail/send_mail.php';
    $title = "Change New Password";
    $content = '<a href="' . $link . '">Bấm vào đây để đổi mật khẩu</a> (link chỉ có hiệu lực trong ngày hôm nay!)';
    sendMail($email, $name, $title, $content);
    header('location: https://mail.google.com');
    exit;
} else {
    session_start();
    $_SESSION['error'] = "Tài khoản không tồn tại!";
    header('location: index.php');
}
