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

// Получаем текущие данные Todo-листа
$stmt = $pdo->prepare("SELECT * FROM todos WHERE id = ? AND user_id = ?");
$stmt->execute([$todoId, $userId]);
$todo = $stmt->fetch();

if (!$todo) {
    echo "Todo list not found.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $stmt = $pdo->prepare("UPDATE todos SET name = ? WHERE id = ?");
    $stmt->execute([$name, $todoId]);
    header('Location: todos.php');
}
?>

<h1>Edit Todo List</h1>
<form method="POST">
    <input type="text" name="name" value="<?php echo $todo['name']; ?>" required><br>
    <button type="submit">Save Changes</button>
</form>
