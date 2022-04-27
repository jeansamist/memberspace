<?php

use App\DataBase\DataBase;
use App\User\Auth;

$db = new DataBase("localhost", "memberspace");
if (isset($_COOKIE['userCookie'])) {
  if (Auth::isLogin($db->db, $_COOKIE['userCookie'])) {
    $_SESSION['is_login'] = true;
  } else {
    $_SESSION['is_login'] = false;
  }
} else {
  $_SESSION['is_login'] = false;
}
