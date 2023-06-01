<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Allow-Origin: *");

include_once 'db.php';
include_once 'api.php';

$db = new Database();
$dbConn = $db->getConnection();

$api = new Api($dbConn);

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
  case 'GET':
    $api->read();
    break;
  case 'POST':
    $api->create();
    break;
  case 'PUT':
    $api->update();
    break;
  case 'DELETE':
    $api->delete();
    break;
  default:
    http_response_code(405);
    echo json_encode(array("message" => "This method is not allowed."));
    break;
}
