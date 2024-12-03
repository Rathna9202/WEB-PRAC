<?php 
// db.php 
$servername = "localhost"; 
$username = "root"; // Your MySQL username 
$password = ""; // Your MySQL password 
$dbname = "user_auth"; 
// Create a connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check the connection 
if ($conn->connect_error) { 
die("Connection failed: " . $conn->connect_error); 
} 
?>