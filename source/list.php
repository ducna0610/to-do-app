<?php

require 'connect.php';

$sql = "SELECT * FROM Todos WHERE id_user = '$id_user'";

$result = mysqli_query($connect, $sql);

$array = mysqli_fetch_array($result);


mysqli_close($connect);
?>

<?php foreach ($result as $each) { ?>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span><?php echo htmlentities($each['content']) ?></span>

        <div>
            <form action="process_update_todo.php" method="post">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $each['id_todo'] ?>">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal_<?php echo $each['id_todo'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color: gray" id="exampleModalLabel">Create at: <?php echo $each['create_at'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="color: black">

                                <div class="form-group">
                                    <label for="exampleInput">Content: </label>
                                    <input type="hidden" value="<?php echo $each['id_todo'] ?>" name="id_todo">
                                    <input type="text" class="form-control" id="exampleInput" placeholder="Content" value="<?php echo htmlentities($each['content']) ?>" name="new_content">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <a href="delete.php?id_todo=<?php echo $each['id_todo'] ?>">
                                    <button type="button" onclick="confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                </a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </li>

<?php } ?>