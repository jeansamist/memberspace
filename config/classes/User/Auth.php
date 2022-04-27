<?php

namespace App\User;


class Auth
{
  public static function isLogin($db, $cookieToken): bool
  {
    $reqCookie = $db->prepare('SELECT value FROM cookies WHERE token = ?');
    $reqCookie->execute([$cookieToken]);
    if ($reqCookie->rowCount() === 1) {
      $userToken = $reqCookie->fetch()->value;
      $reqUser = $db->prepare('SELECT token FROM users WHERE token = ?');
      $reqUser->execute([$userToken]);
      if ($reqUser->rowCount() === 1) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }

    exit();
  }
}
