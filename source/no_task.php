<?php
require 'connect.php';

if (isset($_SESSION['id_user']))
    $id_user = $_SESSION['id_user'];
$sql = "select id_task from Tasks where id_user = '$id_user'";

$result = mysqli_query($connect, $sql);

$num_rows = mysqli_num_rows($result);

mysqli_close($connect);
?>

<div class="badge bg-dark">
    Todos:
    <span><?php echo $num_rows ?></span>
</div>