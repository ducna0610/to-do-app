<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>To do app</title>
</head>

<body>
    <div class="container ">
        <?php include 'nav.php' ?>
    </div>
    <div class="container">
        <!--  HEADER  -->
        <header class="text-center text-light my-4">
            <h1 class="mb-4">Todo List</h1>
            <form class="search">
                <input type="text" class="form-control m-auto" name="search" placeholder="search todos">
            </form>
            <?php if (isset($_SESSION['id_user'])) { ?>
                <?php include 'no_todo.php' ?>
            <?php } ?>
        </header>

        <!--  LIST  -->
        <ul class="list-group todos mx-auto text-light">
            <?php if (isset($_SESSION['id_user'])) { ?>
                <?php include 'list.php'; ?>
            <?php } else { ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>This is example.</span>
                    <a href="#">
                        <i class="far fa-trash-alt delete"></i>
                    </a>
                </li>
            <?php } ?>
        </ul>
        <!--  FORM  -->
        <form action="process_insert_todo.php" method="post" class="add text-center my-4">
            <label for="add" class="add text-light">Add a new todo:</label>
            <input type="text" class="form-control m-auto" name="content" id="add">
        </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script src="./assets/js/main.js"></script>
</body>

</html>