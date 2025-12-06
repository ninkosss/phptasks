<?php
$pageTitle = 'AGFT — Головна';
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
$currentPage = basename($_SERVER['PHP_SELF']) ?: 'index.php';
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
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
        <main>
            <div class="hero container">
                <div class="hero-info">
                    <h2>3D game Tests</h2>
                    <h1>Work that we produce for our clients</h1>
                    <p>We offer computer game options based on participation in beta tests.</p>
                    <button class="btn">Get more details</button>
                </div>
                <img src="./img/joystick.svg" alt="Геймпад">
            </div>
            <div class="container trending">
                <a href="#" class="see-all">See all</a>
                <h3>Currently Trending Games</h3>
                <div class="games">
                    <div class="block">
                        <img src="./img/ittakestwo.png" alt="It takes Two">
                        <span>It takes two</span>
                    </div>
                    <div class="block">
                        <img src="./img/splitfiction.png" alt="Split fiction">
                        <span>Split fiction</span>
                    </div>
                    <div class="block">
                        <img src="./img/bytebond.png" alt="Bytebond">
                        <span>Bytebond</span>
                    </div>
                    <div class="block">
                        <img src="./img/awayout.png" alt="A Way Out">
                        <span>A way out</span>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer>
        <div class="blocks container">
            <div>
                <span class="logo">AGFT</span>
                <p>All our customers are satisfied. Try it with your friend or loved one.</p>
            </div>
            <div>
                <h4>About us</h4>
                <ul>
                    <li>Games</li>
                    <li>Portfolio</li>
                    <li>Careers</li>
                    <li>Contact us</li>
                </ul>
            </div>
            <div>
                <h4>Contact us</h4>
                <p>Our company has been operating for many years, and we look forward to working with you.</p>
                <p>+3920410240</p>
            </div>
        </div>
        <hr>
        <p>Copyright 2024 AGFT All rights reserved</p>
    </footer>
    <script src="./scripts/script.js"></script>
</body>
</html>

