<?php

// Utility function for XSS protection - sanitize user input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

class Database {
    private static $connection = null;
    public static function connect() {
        if (self::$connection === null) {
            try {
                $host = 'localhost';
                $dbname = 'taskop_db';
                $username = 'root';
                $password = '';
                self::$connection = new PDO("mysql:unix_socket=/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock;dbname=$dbname;charset=utf8", $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
    public static function checkUser($login, $password) {
        $conn = self::connect();
        $stmt = $conn->prepare("SELECT * FROM Users WHERE login = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public static function createUser($login, $password, $email = null) {
        $conn = self::connect();
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO Users (login, password, email) VALUES (?, ?, ?)");
        return $stmt->execute([$login, $hashedPassword, $email]);
    }
    public static function createUsersTable() {
        $conn = self::connect();
        $sql = "CREATE TABLE IF NOT EXISTS Users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            login VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        return $conn->exec($sql);
    }
}
?>
