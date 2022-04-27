<?php

namespace App\Error;

class AuthError extends Error
{
  public function __construct(string $errorName = "Error", string $errorMsg)
  {
    $this->errorType = "AuthError";
    $this->errorName = $errorName;
    $this->errorMsg = $errorMsg;
  }
}
