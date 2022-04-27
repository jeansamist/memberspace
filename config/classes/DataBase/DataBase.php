<?php

namespace App\DataBase;

use PDO;
// use PDOStatement;

class DataBase
{
  protected $dbServer;
  protected $dbName;
  protected $dbUser;
  protected $dbPassword;
  public $db;
  public function __construct(string $dbServer = "localhost", string $dbName, string $dbUser = "root", string $dbPassword = "")
  {
    $this->dbServer = $dbServer;
    $this->dbName = $dbName;
    $this->dbUser = $dbUser;
    $this->dbPassword = $dbPassword;
    $this->db = new PDO("mysql:host={$this->dbServer};dbname={$this->dbName}", $this->dbUser, $this->dbPassword, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
  }
}
