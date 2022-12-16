<?php
session_start();

if (empty($_GET['token_expire'])) {
    $_SESSION['error'] = "Hacker lỏ :)";
    header('location: ../sign-in-up/');
    exit;
}

$token_expire = $_GET['token_expire'];
require '../connect.php';
$sql = "SELECT * FROM forgot_password WHERE token_expire = '$token_expire'";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) === 0) {
    $_SESSION['error'] = "Link đã hết hiệu lực vui lòng chọn lại quên mật khẩu!";
    header('location: ../sign-in-up/');
    exit;
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
</head>

<body>
    <form action="process_change_new_password.php" method="post">
        <input type="hidden" name="token_expire" value="<?php echo $token_expire ?>">
        Mật khẩu mới
        <input type="text" name="password" required>
        <br>
        <button>Đổi mật khẩu</button>
    </form>
</body>

</html>