<?php
require '../connect.php';

$sql = "SELECT Todos.id_todo FROM Users JOIN Todos ON Users.id_user = Todos.id_user where permission = 0";

$result = mysqli_query($connect, $sql);

$num_rows = mysqli_num_rows($result);

mysqli_close($connect);
?>
<p class="badge bg-dark">
    Total Todos:
    <span><?php echo $num_rows ?></span>
</p>