<?php
require '../connect.php';

$sql = "SELECT Tasks.id_task FROM Users JOIN Tasks ON Users.id_user = Tasks.id_user where permission = 0";

$result = mysqli_query($connect, $sql);

$num_rows = mysqli_num_rows($result);

mysqli_close($connect);
?>
<p class="badge bg-dark">
    Total tasks:
    <span><?php echo $num_rows ?></span>
</p>