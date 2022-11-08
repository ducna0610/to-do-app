<?php

require '../connect.php';

$sql = "DELETE FROM forgot_password WHERE day(create_at) != day(current_timestamp())";
mysqli_query($connect, $sql);

sendMail('ducna0610@gmail.com', 'Admin deeptry', 'Báo cáo Cron Job', '<h2>Đã thực hiện [delete token expire forgot password]</h2> <br/> <p>Chúc bạn 1 ngày tốt lành :3</p>');

mysqli_close($connect);
