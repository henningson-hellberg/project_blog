<?php
require_once "db.php";
require_once "head.php";
if (isset($_GET['id'])) {
  require_once "update.php";
} else {
  require_once "create.php";
}
require_once "read.php";
require_once "footer.php";