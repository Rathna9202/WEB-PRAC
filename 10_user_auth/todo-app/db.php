<?php
$host = 'localhost';
$db = 'todo-app';
$user = 'root'; // default XAMPP user
$pass = ''; // default password is empty

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>