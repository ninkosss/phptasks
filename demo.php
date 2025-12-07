<?php

$pageTitle = 'AGFT — Демонстрація Composer пакетів';

require_once 'src/PackagesDemo.php';

use Inna\Task28\PackagesDemo;

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
    [
        'label' => 'Демо пакетів',
        'href'  => 'demo.php',
        'class' => 'btn',
    ],
];
$currentPage = basename($_SERVER['PHP_SELF']) ?: 'demo.php';
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="stylesheet" href="./css/main.css">
    <style>
        .demo-content {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem;
        }
        .demo-content pre {
            background: #f5f5f5;
            padding: 1rem;
            border-radius: 5px;
            overflow-x: auto;
        }
        .demo-content code {
            background: #e0e0e0;
            padding: 0.2rem 0.4rem;
            border-radius: 3px;
        }
    </style>
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
            <div class="demo-content">
                <?php
                $demo = new PackagesDemo();
                $demo->demonstratePackages();
                ?>
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
</html></content>
</xai:function_call">**Створено файл demo.php для відображення демонстрації пакетів.**

Тепер перевірю чи все працює правильно, запустивши демо-файл. Але спочатку потрібно перевірити чи немає помилок у коді. 

<xai:function_call name="read_lints">
<parameter name="paths">["/Users/macbook/Desktop/phptasks/src/PackagesDemo.php", "/Users/macbook/Desktop/phptasks/demo.php"]
