
<?php
require '../connect.php';

$id_user = $_POST['id_user'];

$name = $_POST['name'];
$password = $_POST['password'];

$sql = "UPDATE Users 
SET 
name = '$name', password = '$password'
WHERE id_user = $id_user";

mysqli_query($connect, $sql);

mysqli_close($connect);

header('location: admin.php');
