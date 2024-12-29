<?php
session_start();
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$todoId = $_GET['id'];
$userId = $_SESSION['user_id'];

// Удаляем все продукты, связанные с этим Todo-листом
$stmt = $pdo->prepare("DELETE FROM products WHERE todo_id = ?");
$stmt->execute([$todoId]);

// Удаляем сам Todo-лист
$stmt = $pdo->prepare("DELETE FROM todos WHERE id = ? AND user_id = ?");
$stmt->execute([$todoId, $userId]);

header('Location: todos.php');

