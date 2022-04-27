<?php

use App\Html\Forms;
use App\Random;

include "./requests/register_request.php";

if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === false) :
?>

  <form action="" method="post">
    <div class="card form">
      <div class="card-title">
        Register
      </div>
      <?= Forms::input("text", "username", isset($_POST['username']) ? $_POST['username'] : null, "You full name") ?>
      <?= Forms::input("text", "mail", isset($_POST['mail']) ? $_POST['mail'] : null, "E-mail") ?>
      <?= Forms::input("text", "pseudo", isset($_POST['pseudo']) ? $_POST['pseudo'] : null, "Pseudo") ?>
      <?= Forms::input("password", "password", isset($_POST['password']) ? $_POST['password'] : null, "Password") ?>
      <div class="card-footer">
        <?= Random::token() ?>
        <?= Forms::button(null, "Register now") ?>
      </div>
      <div style="color: red;"><?= isset($error) ? $error : null ?></div>
      <a href="./?page=register">Login</a>
    </div>
  </form>
<?php
else : header("Location: ./?page=home");
endif;
?>