
<?php
require '../connect.php';

$id_user = $_GET['id_user'];

$sql = "DELETE Users
WHERE id_user = $id_user";

mysqli_query($connect, $sql);

mysqli_close($connect);

header('location: admin.php');
