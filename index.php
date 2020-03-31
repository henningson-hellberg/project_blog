<?php
require_once "./admin/db.php";
// require_once "head.php";
// require_once "main-hero.php";
// require_once "read.php";
// require_once "asides.php";
// require_once "footer.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700,800&display=swap" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Liu+Jian+Mao+Cao&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="./styles/style.css">
  <title>Lilla bloggen</title>
</head>
<body>
  <header class="top-header">
    <nav class="top-header__nav">
      <ul class="nav-list">
        <li class="nav-list__item">
          <a href="#">About</a>
        </li>
        <li class="nav-list__item">
          <a href="#">Contact</a>
        </li>
        <li class="nav-list__item">
          <a href="./admin/index.php">Login</a>
        </li>
      </ul>
    </nav>
  </header>
  <main class="main">
    <?php require_once "main-hero.php"; ?>
    <div class="main__content">
      <?php 
      require_once "read.php";
      require_once "asides.php";?>
    </div>
  </main>
  <footer>
    <span>&copy Henningson/Hellberg</span>
    <?php echo date('Y') ?>
  </footer>
</body>
</html>