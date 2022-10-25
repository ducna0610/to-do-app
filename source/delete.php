<?php

require 'connect.php';

$id_task = $_GET['id_task'];

$sql = "delete from Tasks where id_task = '$id_task'";

mysqli_query($connect, $sql);

mysqli_close($connect);

header('location: index.php');
