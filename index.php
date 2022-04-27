<?php
session_start();
require "./vendor/autoload.php";
require "./config/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/grid.css">
  <link rel="stylesheet" href="./assets/css/main.css">
  <title>Member Space</title>
</head>

<body>
  <?php
  if (isset($_GET["page"])) {
    $page = htmlentities($_GET["page"]);
    include "pages/{$page}.php";
  } else {
    include "pages/login.php";
  }
  ?>
</body>

</html>