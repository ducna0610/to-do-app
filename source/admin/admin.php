<?php
session_start();
require '../connect.php';

if (empty($_SESSION['id_user']) || ($_SESSION['permission']) == 0) {
    header('location: index.php');
}

$sql = "SELECT * FROM Users";

$users = mysqli_query($connect, $sql);

$sql = "SELECT * FROM Users WHERE permission = 1";

$admins = mysqli_query($connect, $sql);

$all_user = mysqli_num_rows($users);

$no_admin = mysqli_num_rows($admins);

$no_user = $all_user - $no_admin;

// paging
$page = 1;
if (isset($_GET['page']))
    $page = $_GET['page'];

$limit = 8;

$pages = ceil($no_user / $limit);
// $pages = 100;


$over = $limit * ($page - 1);


$sql = "SELECT id_user, name, email, password, online from Users where permission = 0 LIMIT $limit OFFSET $over";

$result = mysqli_query($connect, $sql);

$array = mysqli_fetch_all($result);

$num_rows = mysqli_num_rows($result);

$sql = "SELECT COUNT(*), Users.id_user
FROM Users LEFT JOIN Todos
ON Users.id_user = Todos.id_user
WHERE permission = 0
GROUP BY id_user";

$no_todo_by_user = mysqli_fetch_all(mysqli_query($connect, $sql));

mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Admin</title>
</head>

<body>

    <!-- Nav -->
    <?php include 'nav.php' ?>

    <div class="container">
        <div class="justify-content-end">
            <!-- Total users -->
            <?php include './total_users.php' ?>

            <!-- Total todos -->
            <?php include './total_todos.php'; ?>

        </div>
    </div>
    <?php include './dash_board.php' ?>

    <?php if ($no_user > 0) { ?>
        <?php include './pagination.php'; ?>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script src="../assets/js/main.js"></script>
</body>

</html>