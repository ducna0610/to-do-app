<?php
$connect = mysqli_connect('localhost', 'root', '', 'to_do_app');
mysqli_set_charset($connect, 'utf8');

// Debug SQL
// if ((mysqli_error($connect))) {
//         $message = mysqli_error($connect);
//         echo "<script type='text/javascript'>alert('$message');</script>";
// }
