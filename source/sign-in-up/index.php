<?php
session_start();

if (isset($_COOKIE['remember'])) {
    $token = $_COOKIE['remember'];
    require '../connect.php';

    $sql = "SELECT * FROM Users WHERE token = '$token' LIMIT 1";

    $result = mysqli_query($connect, $sql);
    $number_rows = mysqli_num_rows($result);

    if ($number_rows === 1) {
        $each = mysqli_fetch_array($result);
        $_SESSION['id_user'] = $each['id_user'];
        $_SESSION['name'] = $each['name'];
        $_SESSION['permission'] = $each['permission'];
    }
    mysqli_close($connect);
}

if (isset($_SESSION['id_user'])) {
    header('location:../');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Signing</title>
</head>

<body>
    <div class="login-wrap">
        <div class="login-html">
            <div>
                <a href="../">
                    <button style="color: red; padding: 10px 20px">HOME</button>
                </a>
            </div>
            <div style="color: red; margin-top: 8px">
                <?php
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
            </div>
            <br>
            <br>
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"> <label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <form action="./process_sign_in.php" method='post'>
                        <div class="group">
                            <label for="email" class="label">Email Address</label>
                            <input id="email" type="email" class="input" name="email" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" class="input" data-type="text" name="password" required>
                        </div>
                        <div class="group">
                            <input id="check" type="checkbox" class="check" checked name="remember">
                            <label for="check"><span class="icon"></span> Keep me Signed in</label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign In" id="btn_sign_in">
                        </div>
                        <div class="foot-lnk">
                            <a href="./forgot_password.php">Forgot Password?</a>
                        </div>
                    </form>
                </div>
                <div class="sign-up-htm">
                    <form action="./process_sign_up.php" method="post">
                        <div class="group">
                            <label for="user" class="label">Username</label>
                            <input id="user" class="input" type="text" name="name" required>
                        </div>
                        <div class="group">
                            <label for="email" class="label">Email Address</label>
                            <input id="email" type="email" class="input" name="email" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" class="input" data-type="text" name="password" required>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Repeat Password</label>
                            <input id="pass" type="password" class="input" data-type="text" name="confirm_password" required>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Sign up" id="btn_sign_up">
                        </div>
                        <div class="foot-lnk">
                            <label for="tab-1">Already Member?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>