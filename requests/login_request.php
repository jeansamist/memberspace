<?php

use App\User\User;

if (isset($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['pseudo']) && !empty($_POST['password'])) {
  $error = null;
  $login = User::login($db, $_POST['pseudo'], $_POST['password']);
  if ($login === true) {
    $_SESSION['is_login'] = true;
  } else {
    $error = $login->getMsg();
  }
}
