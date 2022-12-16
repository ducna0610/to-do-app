<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    <title>Forgot password</title>
</head>

<body>
    <form action="process_forgot_password.php" method="post">
        Email
        <input type="text" name="email" placeholder="Email của bạn" required>
        <button onclick='confirm("Vui lòng kiểm tra email của bạn sau khi xác nhận. Nếu không tìm thấy, vui lòng kiểm tra bao gồm hòm thư spam.")'>Xác nhận</button>
    </form>
</body>

</html>