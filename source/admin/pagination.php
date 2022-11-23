<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php if ($page === 1) { ?>
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
        <?php } else { ?>
            <li class="page-item ">
                <a class="page-link" href="./admin.php?page=<?php echo $page - 1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
        <?php } ?>

        <?php for ($i = 1; $i <= $pages; $i++) { ?>
            <?php if ($i === $page) { ?>
                <li class="page-item active">
                    <a class="page-link" href="./admin.php?page=<?php echo $i ?>">
                        <?php echo $i ?>
                    </a>
                </li>
            <?php } else { ?>
                <li class="page-item">
                    <a class="page-link" href="./admin.php?page=<?php echo $i ?>">
                        <?php echo $i ?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>



        <?php if ($page === $pages) { ?>
            <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        <?php } else { ?>
            <li class="page-item">
                <a class="page-link" href="./admin.php?page=<?php echo $page + 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        <?php } ?>
    </ul>
</nav>