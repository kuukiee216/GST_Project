<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Adjust the path to include db_config.php based on its actual location
include 'PHPFiles/db_config (local)/db_config.php';

// Assuming dbConnection class is defined in db_config.php
$db = new dbConnection(); // Create an instance of the dbConnection class
$conn = $db->dbConnect(); // Call the dbConnect method to establish a connection

if ($conn) {
    echo "Connection successful";
    // You can perform database operations here
} else {
    echo "Connection failed: " . $db->conn->errorInfo()[2]; // Display connection error
}
?>
