<?php
session_start();

require 'connect.php';

$id_user = $_SESSION['id_user'];
$id_todo = $_GET['id_todo'];

$sql = "DELETE FROM Todos WHERE id_todo = '$id_todo' AND id_user = '$id_user'";

mysqli_query($connect, $sql);

mysqli_close($connect);

header('location: index.php');
