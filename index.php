<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Добро пожаловать на Todo List</h1>
        <?php if (isset($_SESSION['user_id'])): ?>
            <p>Привет, <?php echo $_SESSION['username']; ?>!</p>
            <a href="todos.php">Перейти к Todo-листам</a> |
            <a href="profile.php">Личный кабинет</a> |
            <a href="logout.php">Выйти</a>
        <?php else: ?>
            <p>Вы не авторизованы. Пожалуйста, войдите или зарегистрируйтесь.</p>
            <a href="login.php">Войти</a> |
            <a href="register.php">Зарегистрироваться</a>
        <?php endif; ?>
    </header>

    <main>
        <h2>Что такое Todo-лист?</h2>
        <p>Todo-лист — это список задач, который поможет вам организовать свой день. Вы можете создавать список продуктов, категорий, задач и отслеживать их выполнение.</p>
    </main>

    <footer>
        <p>&copy; 2024 Todo List. Все права защищены.</p>
    </footer>
</body>
</html>
