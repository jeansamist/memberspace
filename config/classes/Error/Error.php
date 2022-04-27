<?php

namespace App\Error;

class Error
{
  protected $errorType;
  protected $errorName;
  protected $errorMsg;
  public function __construct(string $errorType = "default", string $errorName = "Error", string $errorMsg)
  {
    $this->errorType = $errorType;
    $this->errorName = $errorName;
    $this->errorMsg = $errorMsg;
  }
  public function getMsg(): string
  {
    return $this->errorMsg;
  }
}
