<?php
session_start();
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['user_id'];
    $name = $_POST['name'];
    createTodoList($userId, $name);
    header('Location: todos.php');
}
?>

<h1>Create New Todo List</h1>
<form method="POST">
    <input type="text" name="name" placeholder="Todo List Name" required><br>
    <button type="submit">Create Todo List</button>
</form>
