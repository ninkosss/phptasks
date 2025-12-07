<?php
session_start();

// Обробка форми входу
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Простий приклад аутентифікації (в реальному проекті використовуйте базу даних та хешування)
    if ($email === 'admin@example.com' && $password === 'password') {
        $_SESSION['user'] = $email;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Невірний email або пароль';
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Вхід в систему</title>
  <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
  <link rel="stylesheet" href="./css/main.css">
</head>
<body class="login-page">
  <div class="login-container">
    <h1 class="login">Вхід</h1>
    <?php if (isset($error)): ?>
        <p style="color: red; text-align: center;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="POST" action="">
      <label for="email">
        Електронна пошта
        <input type="email" id="email" name="email" placeholder="user@example.com" required
               value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
      </label>
      <label for="password">
        Пароль
        <input type="password" id="password" name="password" required>
      </label>
      <button type="submit" class="contrast">Увійти</button>
    </form>
    <p style="text-align: center; margin-top: 1rem;">
      <a href="#">Забули пароль?</a> | <a href="#">Реєстрація</a>
    </p>
  </div>
</body>
</html>