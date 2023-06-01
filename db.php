<?php
class Database {
  private $hostname = "localhost";
  private $db_name = "iot";
  private $username = "root";
  private $password = "12345678";
  public $conn;

  public function getConnection() {
    $this->conn = null;

    try {
      $this->conn = new PDO("mysql:host=".$this->hostname.";port=3306;dbname=".$this->db_name, $this->username, $this->password);
      $this->conn->exec("set names utf8");
    } catch(PDOException $exception) {
      echo "Connection error: ".$exception->getMessage();
      throw $exception;
    }

    return $this->conn;
  }
}


