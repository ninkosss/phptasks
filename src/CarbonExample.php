<?php

namespace Inna\Task28;

require_once __DIR__ . '/../vendor/autoload.php';

use Carbon\Carbon;

class CarbonExample
{
    public function run(): void
    {
        echo "<h2>Приклад використання Carbon</h2>";

        // Поточна дата і час
        $now = Carbon::now();
        echo "<p><strong>Поточна дата і час:</strong> {$now->toDateTimeString()}</p>";
        echo "<p><strong>Тільки дата:</strong> {$now->toDateString()}</p>";
        echo "<p><strong>Тільки час:</strong> {$now->toTimeString()}</p>";

        // Створення конкретної дати
        $birthday = Carbon::create(2007, 5, 15, 14, 30, 0);
        echo "<p><strong>Дата народження:</strong> {$birthday->format('d.m.Y H:i:s')}</p>";

        // Операції з датами
        $tomorrow = Carbon::tomorrow();
        $yesterday = Carbon::yesterday();
        $nextWeek = $now->copy()->addWeek();
        $lastMonth = $now->copy()->subMonth();

        echo "<p><strong>Завтра:</strong> {$tomorrow->toDateString()}</p>";
        echo "<p><strong>Вчора:</strong> {$yesterday->toDateString()}</p>";
        echo "<p><strong>Через тиждень:</strong> {$nextWeek->toDateString()}</p>";
        echo "<p><strong>Місяць тому:</strong> {$lastMonth->toDateString()}</p>";

        // Різниця між датами
        $diff = $now->diffForHumans($birthday);
        echo "<p><strong>Вік від дати народження:</strong> {$diff}</p>";

        $daysUntilBirthday = $now->diffInDays($birthday->copy()->year($now->year));
        echo "<p><strong>Днів до наступного дня народження:</strong> {$daysUntilBirthday}</p>";

        // Перевірки дат
        echo "<p><strong>Чи є сьогодні вихідним?</strong> " . ($now->isWeekend() ? 'Так' : 'Ні') . "</p>";
        echo "<p><strong>Чи є сьогодні буднім днем?</strong> " . ($now->isWeekday() ? 'Так' : 'Ні') . "</p>";
        echo "<p><strong>Чи є поточний рік високосним?</strong> " . ($now->isLeapYear() ? 'Так' : 'Ні') . "</p>";

        // Форматування
        echo "<p><strong>Український формат:</strong> {$now->locale('uk')->isoFormat('LLLL')}</p>";
        echo "<p><strong>Короткий формат:</strong> {$now->format('d/m/Y H:i')}</p>";

        // Порівняння дат
        $future = $now->copy()->addDays(5);
        echo "<p><strong>Чи є майбутня дата після поточної?</strong> " . ($future->isAfter($now) ? 'Так' : 'Ні') . "</p>";
        echo "<p><strong>Чи є минула дата до поточної?</strong> " . ($lastMonth->isBefore($now) ? 'Так' : 'Ні') . "</p>";
    }
}
