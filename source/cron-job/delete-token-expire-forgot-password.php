<?php

require '../connect.php';

$sql = "DELETE FROM forgot_password WHERE day(create_at) != day(current_timestamp())";

mysqli_query($connect, $sql);

mysqli_close($connect);
