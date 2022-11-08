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

        <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color: gray" id="exampleModalLabel">Ngay tao</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="color: black">
                            Noi dung
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <a href="delete.php?id_todo=<?php echo $array[$i][1] ?>">
                <i class="far fa-trash-alt delete"></i>
            </a> -->
        </div>

    </li>

<?php } ?>