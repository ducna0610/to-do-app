<?php

require '../mail/send_mail.php';

require '../connect.php';

$sql = "DELETE FROM forgot_password WHERE (current_timestamp() - online) > 864000";
mysqli_query($connect, $sql);

mysqli_close($connect);

sendMail(
    'ducna0610@gmail.com',
    'Admin deeptry',
    'Báo cáo Cron Job',
    '<h2>Đã thực hiện [delete token expire forgot password]</h2> 
    <br/>
    (￣ε￣＠)
    <p>Chúc bạn 1 ngày tốt lành :3</p>'
);
