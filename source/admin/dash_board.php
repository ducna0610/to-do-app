<?php if ($no_user > 0) { ?>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">
                                Name
                                &nbsp;
                                <a href="" class="">
                                    <i class="fa fa-sort" aria-hidden="true"></i>
                                </a>
                            </th>
                            <th scope="col">
                                Email
                                &nbsp;
                                <a href="" class="">
                                    <i class="fa fa-sort" aria-hidden="true"></i>
                                </a>
                            </th>
                            <th scope="col">
                                Password
                                &nbsp;
                                <a href="" class="">
                                    <i class="fa fa-sort" aria-hidden="true"></i>
                                </a>
                            </th>
                            <th scope="col">
                                Todos
                                &nbsp;
                                <a href="" class="">
                                    <i class="fa fa-sort" aria-hidden="true"></i>
                                </a>
                            </th>
                            <th scope="col">
                                Online
                                &nbsp;
                                <a href="" class="">
                                    <i class="fa fa-sort" aria-hidden="true"></i>
                                </a>
                            </th>
                            <th scope="col">Submit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($array as $each) { ?>
                            <form action="process_update_user.php" method="post">
                                <tr>
                                    <td>
                                        <span>
                                            <input type="text" value="<?php echo htmlentities($each[0]) ?>" readonly name="id_user">
                                        </span>
                                    </td>
                                    <td>
                                        <span>
                                            <input type="text" value="<?php echo htmlentities($each[1]) ?>" name="name">
                                        </span>
                                    </td>
                                    <td><span><?php echo htmlentities($each[2])  ?></span></td>
                                    <td>
                                        <span>
                                            <input type="text" value="<?php echo htmlentities($each[3]) ?>" name="password">
                                        </span>
                                    </td>
                                    <td><span> <?php echo $no_todo_by_user[$over++][0] ?> </span></td>
                                    <td><span><?php echo htmlentities($each[4]) ?></span></td>
                                    <td>
                                        <input type="submit" value="change">
                                    </td>
                                    <td>
                                        <a onclick="return confirm('Ure sure?')" href=" ./delete.php?id_user=<?php echo htmlentities($each[0]) ?>">
                                            <i class="fas fa-trash-alt fa-1x"></i>
                                        </a>
                                    </td>
                                </tr>
                            </form>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } else { ?>
    <p class="badge container-fluid">Không có dữ liệu</p>
<?php } ?>