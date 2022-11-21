<nav class="nav justify-content-end">
  <?php if (empty($_SESSION['id_user'])) { ?>
    <a href="./sign-in-up" class="nav-link">Sign in / Sign up</a>
  <?php } ?>

  <?php if (isset($_SESSION['id_user'])) { ?>
    <a href="./sign-in-up/sign-out.php" class="nav-link">Sign out</a>
  <?php } ?>
  <?php if (isset($_SESSION['permission'])) { ?>
    <?php if ($_SESSION['permission'] == 1) { ?>
      <a href="./admin" class="nav-link">Admin</a>
    <?php } ?>

    <?php if ($_SESSION['permission'] == 0) { ?>
      <a href="donate.php" class="nav-link">
        <i class="fas fa-donate "></i>
        donate
      </a>
    <?php } ?>
  <?php } ?>
  <?php if (isset($_SESSION['id_user'])) { ?>
    <h1 style="color: gray">
      Welcome
      <i style="color: orange">
        <?php echo $_SESSION['name'] ?>
      </i>
    </h1>
  <?php } ?>
</nav>