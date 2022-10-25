
<?php
require '../connect.php';

$id_user = $_GET['id_user'];

$sql = "delete Users
where id_user = $id_user";

die($sql);

mysqli_query($connect, $sql);

mysqli_close($connect);

header('location: admin.php');
