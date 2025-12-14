<?php
try {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $pdo = new PDO("mysql:unix_socket=/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS taskop_db CHARACTER SET utf8 COLLATE utf8_general_ci";
    $pdo->exec($sql);
    echo "<div style='color: green; font-size: 18px;'>База даних 'taskop_db' успішно створена!</div>";
    $pdo->exec("USE taskop_db");
    $createTableSql = "CREATE TABLE IF NOT EXISTS Users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        login VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($createTableSql);
    echo "<div style='color: green; font-size: 16px;'>Таблиця 'Users' успішно створена!</div>";
    echo "<br><a href='index.php'>Перейти до тестування</a>";
    echo "<br><br><a href='http://localhost/phpmyadmin/index.php?route=/server/databases' target='_blank'>Перевірити в phpMyAdmin</a>";
} catch (PDOException $e) {
    echo "<div style='color: red; font-size: 18px;'>Помилка створення бази даних: " . $e->getMessage() . "</div>";
    echo "<br>Переконайтеся, що MySQL сервер запущений і phpMyAdmin працює.";
}
?>
