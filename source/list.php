<?php

require 'connect.php';

$id_user = $_SESSION['id_user'];

$sql = "SELECT content, id_todo FROM Todos WHERE id_user = '$id_user'";

$result = mysqli_query($connect, $sql);

$array = mysqli_fetch_all($result);

mysqli_close($connect);
?>

<?php for ($i = 0; $i < count($array); $i++) { ?>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span><?php echo $array[$i][0] ?></span>

        <a href="delete.php?id_todo=<?php echo $array[$i][1] ?>">
            <i class="far fa-trash-alt delete"></i>
        </a>
    </li>
<?php } ?>