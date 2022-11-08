
<?php
session_start();

if (isset($_SESSION['id_user'])) {

    require 'connect.php';


    $id_todo = $_POST['id_todo'];
    $new_content = $_POST['new_content'];

    $sql = "UPDATE Todos 
    SET content = '$new_content'
    WHERE id_todo = '$id_todo'";

    mysqli_query($connect, $sql);

    mysqli_close($connect);
}

header('location: index.php');
