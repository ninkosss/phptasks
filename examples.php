<?php

require_once __DIR__ . '/vendor/autoload.php';

use Inna\Task28\MonologExample;
use Inna\Task28\VarDumperExample;
use Inna\Task28\CarbonExample;

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Демонстрація Composer пакетів</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #333;
        }
        .section {
            margin-bottom: 40px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .monolog-section { border-color: #007cba; }
        .vardumper-section { border-color: #28a745; }
        .carbon-section { border-color: #ffc107; }
        pre {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }
        .code {
            background: #f1f3f4;
            padding: 2px 4px;
            border-radius: 3px;
            font-family: monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Демонстрація використання Composer пакетів</h1>
        <p>Цей файл демонструє використання трьох популярних PHP пакетів: Monolog, VarDumper та Carbon.</p>

        <div class="section monolog-section">
            <h2>1. Monolog - Логування</h2>
            <p>Monolog - це потужна бібліотека для логування в PHP. Вона підтримує різні обробники (handlers) та формати.</p>
            <?php
            $monologExample = new MonologExample();
            $monologExample->run();
            ?>
        </div>

        <div class="section vardumper-section">
            <h2>2. Symfony VarDumper - Дебагінг</h2>
            <p>Symfony VarDumper надає зручні функції для дебагінгу та відображення структури даних.</p>
            <?php
            $varDumperExample = new VarDumperExample();
            $varDumperExample->run();
            ?>
        </div>

        <div class="section carbon-section">
            <h2>3. Carbon - Робота з датами</h2>
            <p>Carbon - це розширення PHP DateTime, яке робить роботу з датами та часом набагато зручнішою.</p>
            <?php
            $carbonExample = new CarbonExample();
            $carbonExample->run();
            ?>
        </div>

        <div class="section">
            <h2>Перегляд логів</h2>
            <p>Monolog записує логи до файлів. Перегляньте вміст директорії <span class="code">logs/</span>:</p>
            <?php
            if (file_exists('logs/monolog_example.log')) {
                echo "<h3>Зміст logs/monolog_example.log:</h3>";
                echo "<pre>" . htmlspecialchars(file_get_contents('logs/monolog_example.log')) . "</pre>";
            } else {
                echo "<p>Файл логів ще не створений.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
