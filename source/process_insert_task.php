
<?php
session_start();

if (isset($_SESSION['id_user'])) {

    require './connect.php';

    $id_user = $_SESSION['id_user'];

    $content = $_POST['content'];

    $sql = "INSERT INTO Tasks (content, id_user)
    VALUES ('$content', '$id_user')";

    mysqli_query($connect, $sql);

    mysqli_close($connect);
}

header('location: index.php');
