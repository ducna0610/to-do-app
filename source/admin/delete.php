
<?php
require '../connect.php';

$id_user = $_GET['id_user'];

$sql = "DELETE FROM Users
WHERE id_user = '$id_user'";

mysqli_query($connect, $sql);

mysqli_close($connect);

header('location: ./');
