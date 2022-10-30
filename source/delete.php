<?php

require 'connect.php';

$id_todo = $_GET['id_todo'];

$sql = "DELETE FROM Todos WHERE id_todo = '$id_todo'";

mysqli_query($connect, $sql);

mysqli_close($connect);

header('location: index.php');
