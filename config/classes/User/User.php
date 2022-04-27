<?php

namespace App\User;

use App\Error\AuthError;
use App\Random;

class User extends Auth
{
  public static function register($db, string $username, string $mail, string $pseudo, string $password)
  {

    if (strlen($password) >= 8) {
      $reqUser = $db->db->prepare("SELECT token FROM users WHERE pseudo = ?");
      $reqUser->execute([$pseudo]);
      if ($reqUser->rowCount() === 0) {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
          $userToken = Random::token();
          $cookieToken = Random::token();
          $insertUser = $db->db->prepare('INSERT INTO users (token, username, usermail, pseudo, password) VALUES (?, ?, ?, ?, ?)');
          $insertUser->execute([$userToken, $username, $mail, $pseudo, sha1($password)]);
          $insertCookie = $db->db->prepare('INSERT INTO cookies (token, value) VALUES (?, ?)');
          $insertCookie->execute([$cookieToken, $userToken]);
          setcookie('userCookie', $cookieToken, time() + (60 * 60 * 24 * 14));
          return true;
        } else {
          return new AuthError("register error", "You email isnt corect");
        }
      } else {
        return new AuthError("register error", "You pseudo is already take");
      }
    } else {
      return new AuthError("register error", "You password isnt short");
    }
  }
  public static function login($db, string $pseudo, string $password)
  {
    $reqUser = $db->db->prepare("SELECT token, password FROM users WHERE pseudo = ?");
    $reqUser->execute([$pseudo]);
    if ($reqUser->rowCount() === 1) {
      $user = $reqUser->fecth();
      if ($user->password === sha1($password)) {
        $token = Random::token();
        $insertCookie = $db->db->prepare('INSERT INTO cookies (token, value) VALUES (?, ?)');
        $insertCookie->execute([$token, $user->token]);
        setcookie('userCookie', $token, time() + (60 * 60 * 24 * 14));
        return true;
      } else {
        return new AuthError("login error", "You password isnt corect");
      }
    } else {
      return new AuthError("login error", "User doesnt esist");
    }
  }
}
