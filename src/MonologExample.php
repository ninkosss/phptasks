<?php

namespace Inna\Task28;

require_once __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MonologExample
{
    public function run(): void
    {
        // Створюємо логер
        $logger = new Logger('my_app');

        // Додаємо обробник для запису до файлу
        $logger->pushHandler(new StreamHandler('logs/monolog_example.log', Logger::DEBUG));

        // Різні рівні логування
        $logger->debug('Це повідомлення для дебагу');
        $logger->info('Інформаційне повідомлення');
        $logger->notice('Повідомлення про важливу подію');
        $logger->warning('Попередження');
        $logger->error('Повідомлення про помилку');
        $logger->critical('Критична помилка');
        $logger->alert('Тривожне повідомлення');
        $logger->emergency('Надзвичайна ситуація');

        // Логування з контекстом
        $user = ['id' => 123, 'name' => 'John Doe'];
        $logger->info('Користувач увійшов в систему', ['user' => $user]);

        echo "Приклад використання Monolog завершено. Перевірте файл logs/monolog_example.log";
    }
}
