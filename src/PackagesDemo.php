<?php

namespace Inna\Task28;

require_once __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Carbon\Carbon;

class PackagesDemo
{
    private Logger $logger;
    private string $logFile = 'logs/app.log';

    public function __construct()
    {
        // Створюємо директорію для логів, якщо вона не існує
        if (!is_dir('logs')) {
            mkdir('logs', 0777, true);
        }

        // Налаштовуємо Monolog логер
        $this->logger = new Logger('packages_demo');
        $this->logger->pushHandler(new StreamHandler($this->logFile, Logger::DEBUG));
        $this->logger->pushHandler(new FirePHPHandler());
    }

    public function demonstratePackages(): void
    {
        echo "<h1>Демонстрація використання Composer пакетів</h1>";
        echo "<h2>1. Monolog - Логування</h2>";

        // Використання Monolog
        $this->logger->info('Початок демонстрації пакетів');
        $this->logger->warning('Це попередження для демонстрації');
        $this->logger->error('Це помилка для демонстрації');

        echo "<p>Повідомлення записані до файлу <code>{$this->logFile}</code></p>";

        echo "<h2>2. Symfony VarDumper - Дебагінг</h2>";

        // Використання VarDumper
        $testData = [
            'string' => 'Привіт, світ!',
            'array' => ['a', 'b', 'c'],
            'object' => (object)['property' => 'value'],
            'null' => null,
            'boolean' => true,
            'number' => 42
        ];

        echo "<p>Використання dump():</p>";
        dump($testData);

        echo "<h2>3. Carbon - Робота з датами</h2>";

        // Використання Carbon
        $now = Carbon::now();
        $tomorrow = Carbon::tomorrow();
        $yesterday = Carbon::yesterday();
        $nextWeek = Carbon::now()->addWeek();

        echo "<p><strong>Поточна дата і час:</strong> {$now->toDateTimeString()}</p>";
        echo "<p><strong>Завтра:</strong> {$tomorrow->toDateString()}</p>";
        echo "<p><strong>Вчора:</strong> {$yesterday->toDateString()}</p>";
        echo "<p><strong>Через тиждень:</strong> {$nextWeek->toDateTimeString()}</p>";

        // Демонстрація форматування
        echo "<p><strong>Український формат:</strong> {$now->locale('uk')->isoFormat('LLLL')}</p>";

        // Різниця в часі
        $diff = $now->diffForHumans($nextWeek);
        echo "<p><strong>Різниця між зараз і через тиждень:</strong> {$diff}</p>";

        // Перевірка чи дата є вихідним
        echo "<p><strong>Чи є сьогодні вихідним?</strong> " . ($now->isWeekend() ? 'Так' : 'Ні') . "</p>";

        $this->logger->info('Демонстрація завершена успішно');
    }

    public function getLogContents(): string
    {
        if (file_exists($this->logFile)) {
            return file_get_contents($this->logFile);
        }
        return "Файл логів ще не створений";
    }
}

// Демонстрація роботи
$demo = new PackagesDemo();
$demo->demonstratePackages();

echo "<h2>Зміст лог-файлу:</h2>";
echo "<pre>" . htmlspecialchars($demo->getLogContents()) . "</pre>";

?></content>
</xai:function_call">**Створено демо-файл з використанням всіх пакетів:**
- **Monolog** - для логування з записом до файлу
- **VarDumper** - для дебагінгу та відображення даних
- **Carbon** - для роботи з датами та часом

Тепер створимо файл для відображення цієї демонстрації. Створю окремий маршрут у index.php або створимо новий файл demo.php. Краще створити окремий файл demo.php для чистоти. 

<xai:function_call name="write">
<parameter name="file_path">/Users/macbook/Desktop/phptasks/demo.php
