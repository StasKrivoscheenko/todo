<?php
session_start();
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$todos = getUserTodos($userId);

?>

<h1>My Todo Lists</h1>
<ul>
    <?php foreach ($todos as $todo): ?>
        <li>
            <?php echo $todo['name']; ?>
            <a href="edit_todo.php?id=<?php echo $todo['id']; ?>">Edit</a>
            <a href="delete_todo.php?id=<?php echo $todo['id']; ?>">Delete</a>
            <a href="products.php?todo_id=<?php echo $todo['id']; ?>">View Products</a>
        </li>
    <?php endforeach; ?>
</ul>

<a href="create_todo.php">Create New Todo List</a>
