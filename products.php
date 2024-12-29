<?php
session_start();
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$todoId = $_GET['todo_id'];
$userId = $_SESSION['user_id'];

// Получаем продукты для указанного Todo-листа
$products = getProductsByTodo($todoId);

?>

<h1>Products for Todo List</h1>

<ul>
    <?php foreach ($products as $product): ?>
        <li>
            <?php echo $product['name']; ?> - <?php echo $product['weight']; ?> kg (<?php echo $product['category']; ?>)
            <a href="delete_product.php?id=<?php echo $product['id']; ?>">Delete</a>
            <a href="edit_product.php?id=<?php echo $product['id']; ?>">Edit</a>
        </li>
    <?php endforeach; ?>
</ul>

<h2>Add New Product</h2>
<form method="POST" action="add_product.php">
    <input type="hidden" name="todo_id" value="<?php echo $todoId; ?>">
    <input type="text" name="name" placeholder="Product Name" required><br>
    <input type="number" step="0.01" name="weight" placeholder="Weight (kg)" required><br>
    <input type="text" name="category" placeholder="Category" required><br>
    <button type="submit">Add Product</button>
</form>

