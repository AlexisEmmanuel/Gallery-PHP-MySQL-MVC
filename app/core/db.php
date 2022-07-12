<?php

class Connect {
  private $host;
  private $dbname;
  private $dbuser;
  private $dbpassword;

  public function __construct() {
    $this->host = "localhost";
    $this->dbname = "gallery_app";
    $this->dbuser = "root";
    $this->dbpassword = "";
  }
  
  public function connection() {
    try {
      $arg = "mysql: server=$this->host;dbname=$this->dbname;";
      $db = new PDO($arg, $this->dbuser, $this->dbpassword);
      return $db;
    } catch (PDOException $th) {
      echo 'Error message: '.$th->getMessage();
    }
  }
}