<?php
require_once __DIR__ . '/../Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = sanitizeInput($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    $email = sanitizeInput($_POST['email'] ?? '');

    $errors = [];

    // Валідація
    if (empty($login)) {
        $errors[] = 'Логін обов\'язковий';
    }

    if (empty($password)) {
        $errors[] = 'Пароль обов\'язковий';
    } elseif (strlen($password) < 6) {
        $errors[] = 'Пароль повинен містити мінімум 6 символів';
    }

    if ($password !== $confirmPassword) {
        $errors[] = 'Паролі не співпадають';
    }

    if (empty($email)) {
        $errors[] = 'Email обов\'язковий';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Невірний формат email';
    }

    if (empty($errors)) {
        try {
            // Спроба створити користувача
            $result = Database::createUser($login, $password, $email);

            if ($result) {
                $success = 'Реєстрація успішна! Тепер ви можете увійти в систему.';
            } else {
                $errors[] = 'Помилка при створенні користувача';
            }
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Duplicate entry
                $errors[] = 'Користувач з таким логіном вже існує';
            } else {
                $errors[] = 'Помилка бази даних: ' . $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Реєстрація - AGFT</title>
  <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
  <link rel="stylesheet" href="../css/main.css">
</head>
<body class="login-page">
  <div class="login-container">
    <h1>Реєстрація</h1>

    <?php if (isset($success)): ?>
        <div style="color: green; text-align: center; margin-bottom: 1rem; padding: 1rem; background-color: #d4edda; border: 1px solid #c3e6cb; border-radius: 0.25rem;">
            <?php echo htmlspecialchars($success); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <div style="color: red; text-align: center; margin-bottom: 1rem; padding: 1rem; background-color: #f8d7da; border: 1px solid #f5c6cb; border-radius: 0.25rem;">
            <ul style="margin: 0; padding-left: 1.2rem;">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
      <label for="login">
        Логін
        <input type="text" id="login" name="login" placeholder="Введіть логін" required
               value="<?php echo htmlspecialchars($_POST['login'] ?? ''); ?>">
      </label>

      <label for="email">
        Email
        <input type="email" id="email" name="email" placeholder="user@example.com" required
               value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
      </label>

      <label for="password">
        Пароль
        <input type="password" id="password" name="password" required>
      </label>

      <label for="confirm_password">
        Підтвердіть пароль
        <input type="password" id="confirm_password" name="confirm_password" required>
      </label>

      <button type="submit" class="contrast">Зареєструватися</button>
    </form>

    <p style="text-align: center; margin-top: 1rem;">
      Вже маєте акаунт? <a href="/login">Увійти</a>
    </p>
  </div>
</body>
</html>
