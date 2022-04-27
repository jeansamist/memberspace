<?php

use App\Html\Forms;
use App\Random;

include "./requests/login_request.php";

if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === false) :
?>

  <form action="" method="post">
    <div class="card form">
      <div class="card-title">
        Login
      </div>
      <?= Forms::input("text", "pseudo", "", "Pseudo") ?>
      <?= Forms::input("password", "password", "", "Password") ?>
      <div class="card-footer">
        <?= Random::token() ?>
        <?= Forms::button(null, "Login now") ?>
      </div>
      <a href="./?page=register">Register</a>
    </div>
  </form>
<?php
else : header("Location: ./?page=home");
endif;
?>