<?php
require 'db.php';

$action = $_POST['action'] ?? '';

switch ($action) {
    case 'create':
        $title = $_POST['title'];
        $stmt = $pdo->prepare("INSERT INTO todos (title) VALUES (:title)");
        $stmt->execute(['title' => $title]);
        break;

    case 'update':
        $id = $_POST['id'];
        $completed = $_POST['completed'] ? 1 : 0;
        $stmt = $pdo->prepare("UPDATE todos SET completed = :completed WHERE id = :id");
        $stmt->execute(['completed' => $completed, 'id' => $id]);
        break;

    case 'delete':
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM todos WHERE id = :id");
        $stmt->execute(['id' => $id]);
        break;

    default:
        break;
}
?>
