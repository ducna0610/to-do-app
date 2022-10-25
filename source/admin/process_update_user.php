
<?php
require '../connect.php';

$id_user = $_POST['id_user'];

$name = $_POST['name'];
$password = $_POST['password'];

$sql = "update Users set name = '$name', password = '$password'
where id_user = $id_user";

mysqli_query($connect, $sql);

mysqli_close($connect);

header('location: admin.php');
