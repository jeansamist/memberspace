<?php

namespace App;

class Random
{
  public static function token(int $lengths = 30): string
  {
    $letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $token = "";
    for ($i = 0; $i < $lengths; $i++) {
      $index = rand(0, (strlen($letters) - 1));
      $token .= $letters[$index];
    }
    return $token;
  }
}
