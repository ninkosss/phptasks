<?php
require_once __DIR__ . '/../Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = sanitizeInput($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Перевірка користувача через базу даних
    $user = Database::checkUser($login, $password);

    if ($user) {
        $_SESSION['user'] = $user['login'];
        $_SESSION['user_id'] = $user['id'];
        header('Location: /');
        exit;
    } else {
        $error = 'Невірний логін або пароль';
    }
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
  <link rel="stylesheet" href="../css/main.css">
</head>
<body class="login-page">
  <div class="login-container">
    <h1 class="login">Вхід</h1>
    <?php if (isset($error)): ?>
        <p style="color: red; text-align: center;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="POST" action="">
      <label for="email">
        Логін
        <input type="text" id="email" name="email" placeholder="Введіть логін" required
               value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
      </label>
      <label for="password">
        Пароль
        <input type="password" id="password" name="password" required>
      </label>
      <button type="submit" class="contrast">Увійти</button>
    </form>
    <p style="text-align: center; margin-top: 1rem;">
      <a href="#">Забули пароль?</a> | <a href="/registration">Реєстрація</a>
    </p>
  </div>
</body>
</html>
