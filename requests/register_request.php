<?php

use App\User\User;

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['mail']) && !empty($_POST['mail']) && isset($_POST['pseudo']) && isset($_POST['password']) && !empty($_POST['pseudo']) && !empty($_POST['password'])) {
  $error = null;
  $register = User::register($db, $_POST['username'], $_POST['mail'], $_POST['pseudo'], $_POST['password']);
  if ($register === true) {
    $_SESSION['is_login'] = true;
  } else {
    $error = $register->getMsg();
  }
}
