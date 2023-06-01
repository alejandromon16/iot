<?php
// Include the Database class
require_once 'Database.php';
require_once 'Api.php';

// Create a new instance of the Database class
$database = new Database();

// Get a connection to the database
$conn = $database->getConnection();

// Create a new instance of the Api class
$api = new Api($conn);

// Determine the API endpoint
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle GET requests
    if (isset($_GET['endpoint'])) {
        $endpoint = $_GET['endpoint'];

        if ($endpoint === 'data') {
            $api->read();
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle POST requests
    if (isset($_GET['endpoint'])) {
        $endpoint = $_GET['endpoint'];

        if ($endpoint === 'orders') {
            $api->create();
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Handle PUT requests
    if (isset($_GET['endpoint'])) {
        $endpoint = $_GET['endpoint'];

        if ($endpoint === 'orders') {
            $api->update();
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Handle DELETE requests
    if (isset($_GET['endpoint'])) {
        $endpoint = $_GET['endpoint'];

        if ($endpoint === 'orders') {
            $api->delete();
        }
    }
}
?>
