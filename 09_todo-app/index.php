<?php
require 'db.php';

// Fetch todos
$stmt = $pdo->query("SELECT * FROM todos");
$todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>
<body>
    <h1>Todo List</h1>
    <form id="todoForm">
        <input type="text" name="title" placeholder="Add a new todo" required>
        <button type="submit">Add Todo</button>
    </form>

    <ul id="todoList">
        <?php foreach ($todos as $todo): ?>
            <li data-id="<?= $todo['id'] ?>">
                <input type="checkbox" onchange="toggleComplete(<?= $todo['id'] ?>)" <?= $todo['completed'] ? 'checked' : '' ?>>
                <?= htmlspecialchars($todo['title']) ?>
                <button onclick="deleteTodo(<?= $todo['id'] ?>)">Delete</button>
            </li>
        <?php endforeach; ?>
    </ul>

    <script>
        document.getElementById('todoForm').onsubmit = function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            formData.append('action', 'create');

            fetch('actions.php', {
                method: 'POST',
                body: formData
            }).then(() => location.reload());
        };

        function toggleComplete(id) {
            const checkbox = event.target;
            fetch('actions.php', {
                method: 'POST',
                body: new URLSearchParams({
                    action: 'update',
                    id: id,
                    completed: checkbox.checked ? 1 : 0
                })
            });
        }

        function deleteTodo(id) {
            fetch('actions.php', {
                method: 'POST',
                body: new URLSearchParams({
                    action: 'delete',
                    id: id
                })
            }).then(() => location.reload());
        }
    </script>
</body>
</html>
