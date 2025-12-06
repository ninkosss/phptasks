<?php
$pageTitle = 'AGFT — Вхід';
$navLinks = [
    [
        'label' => 'Головна',
        'href'  => 'index.php',
        'class' => 'btn',
    ],
    [
        'label' => 'Логін',
        'href'  => 'login.php',
        'class' => 'btn',
    ],
    [
        'label' => 'Реєстрація',
        'href'  => 'registration.php',
        'class' => 'btn',
    ],
];
$currentPage = basename($_SERVER['PHP_SELF']) ?: 'login.php';
?>
<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
  <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
  <link rel="stylesheet" href="./css/main.css">
</head>
<body class="login-page">
  <div class="wrapper">
    <header class="container">
      <span class="logo">AGFT</span>
      <nav>
        <ul>
          <?php foreach ($navLinks as $link): 
            $isActive = basename($link['href']) === $currentPage;
            $classes = trim(($link['class'] ?? '') . ' ' . ($isActive ? 'active' : ''));
          ?>
          <li<?= $classes ? ' class="' . htmlspecialchars($classes, ENT_QUOTES, 'UTF-8') . '"' : '' ?>>
            <a href="<?= htmlspecialchars($link['href'], ENT_QUOTES, 'UTF-8') ?>">
              <?= htmlspecialchars($link['label'], ENT_QUOTES, 'UTF-8') ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </nav>
    </header>

    <main class="login-container">
      <h1 class="login">Вхід</h1>
      <form action="/login" method="POST">
        <label for="login">
          Логін
          <input type="text" id="login" name="login" placeholder="username">
        </label>
        <label for="email">
          Електронна пошта
          <input type="text" id="email" name="email" placeholder="user@gmail.com">
        </label>
        <label for="phone">
          Телефон
          <input type="text" id="phone" name="phone" placeholder="+380951235412">
        </label>
        <label for="password">
          Пароль
          <input type="password" id="password" name="password">
        </label>
        <button type="submit" class="contrast">Увійти</button>
      </form>
      <p style="text-align: center; margin-top: 1rem;">
        <a href="#">Забули пароль?</a> | <a href="#">Реєстрація</a>
      </p>
    </main>
  </div>
  <script src="./scripts/script.js"></script>
</body>
</html>

