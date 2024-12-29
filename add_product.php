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
    $todoId = $_POST['todo_id'];
    $name = $_POST['name'];
    $weight = $_POST['weight'];
    $category = $_POST['category'];

    addProduct($todoId, $name, $weight, $category);
    header("Location: products.php?todo_id=$todoId");
}
?>
