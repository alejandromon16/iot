<?php
class Api {
  private $conn;

  public function __construct($db) {
    $this->conn = $db;
  }

  public function read() {
    $query = "SELECT * FROM ordenes";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    
    $data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      array_push($data, $row);
    }

    echo json_encode($data);
  }

  public function create() {
    $data = json_decode(file_get_contents("php://input"));

    if(!empty($data->cantidad) && !empty($data->client)){
      $query = "INSERT INTO ordenes SET cantidad=:cantidad, client=:client";
      $stmt = $this->conn->prepare($query);
  
      $stmt->bindParam(":cantidad", $data->cantidad);
      $stmt->bindParam(":client", $data->client);
  
      if($stmt->execute()){
        echo json_encode(array("message" => "Record was created."));
      } else {
        echo json_encode(array("message" => "Unable to create record."));
      }
    } else {
      echo json_encode(array("message" => "Unable to create record. Data is incomplete."));
    }
  }

  public function update() {
    $data = json_decode(file_get_contents("php://input"));

    if(!empty($data->Id) && (!empty($data->cantidad) || !empty($data->client))){
      $query = "UPDATE ordenes SET cantidad=:cantidad, client=:client WHERE Id=:Id";
      $stmt = $this->conn->prepare($query);
  
      $stmt->bindParam(":Id", $data->Id);
      $stmt->bindParam(":cantidad", $data->cantidad);
      $stmt->bindParam(":client", $data->client);
  
      if($stmt->execute()){
        echo json_encode(array("message" => "Record was updated."));
      } else {
        echo json_encode(array("message" => "Unable to update record."));
      }
    } else {
      echo json_encode(array("message" => "Unable to update record. Data is incomplete."));
    }
  }

  public function delete() {
    $data = json_decode(file_get_contents("php://input"));

    if(!empty($data->Id)){
      $query = "DELETE FROM ordenes WHERE Id=:Id";
      $stmt = $this->conn->prepare($query);
  
      $stmt->bindParam(":Id", $data->Id);
  
      if($stmt->execute()){
        echo json_encode(array("message" => "Record was deleted."));
      } else {
        echo json_encode(array("message" => "Unable to delete record."));
      }
    } else {
      echo json_encode(array("message" => "Unable to delete record. Id is missing."));
    }
  }
}
