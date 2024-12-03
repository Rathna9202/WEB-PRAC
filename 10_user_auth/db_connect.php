<?php
// db_connect.php
$servername = "localhost";
$username = "root";  // Default MySQL user for XAMPP
$password = "";      // Default MySQL password for XAMPP is empty
$dbname = "user_auth";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
