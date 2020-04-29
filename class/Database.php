<?php

namespace WeDevsT2;
use \PDO;

class Database
{

  private $db_name = 'todo_oop_php';
  private $db_user = 'root';
  private $db_pass = '';
  private $db_host = 'localhost';
  
  protected function connect() {
    $dsn = 'mysql:host='.$this->db_host.';dbname='.$this->db_name;
    $pdo = new PDO($dsn, $this->db_user, $this->db_pass);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $pdo;
  }

}
