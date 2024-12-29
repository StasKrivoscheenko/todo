<?php
// Регистрация пользователя
function registerUser($username, $email, $password) {
    global $pdo;
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $hashedPassword]);
}

// Аутентификация пользователя
function loginUser($username, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        return true;
    }
    return false;
}

// Создание нового todo листа
function createTodoList($userId, $name) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO todos (user_id, name) VALUES (?, ?)");
    $stmt->execute([$userId, $name]);
}

// Получение todo листов пользователя
function getUserTodos($userId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM todos WHERE user_id = ?");
    $stmt->execute([$userId]);
    return $stmt->fetchAll();
}

// Добавление продукта в todo лист
function addProduct($todoId, $name, $weight, $category) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO products (todo_id, name, weight, category) VALUES (?, ?, ?, ?)");
    $stmt->execute([$todoId, $name, $weight, $category]);
}

// Получение продуктов для todo листа
function getProductsByTodo($todoId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM products WHERE todo_id = ?");
    $stmt->execute([$todoId]);
    return $stmt->fetchAll();
}
?>
