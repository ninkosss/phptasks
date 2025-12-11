<?php

namespace Inna\Task28;

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;

class VarDumperExample
{
    public function run(): void
    {
        echo "<h2>Приклад використання Symfony VarDumper</h2>";

        // Простий масив
        $array = ['apple', 'banana', 'cherry'];
        echo "<h3>Простий масив:</h3>";
        dump($array);

        // Асоціативний масив
        $assocArray = [
            'name' => 'John',
            'age' => 30,
            'city' => 'Kyiv'
        ];
        echo "<h3>Асоціативний масив:</h3>";
        dump($assocArray);

        // Об'єкт
        $object = (object) [
            'title' => 'Програміст',
            'salary' => 50000,
            'skills' => ['PHP', 'JavaScript', 'SQL']
        ];
        echo "<h3>Об'єкт:</h3>";
        dump($object);

        // Багаторівневий масив
        $nestedArray = [
            'users' => [
                ['id' => 1, 'name' => 'Alice'],
                ['id' => 2, 'name' => 'Bob']
            ],
            'settings' => [
                'theme' => 'dark',
                'language' => 'uk'
            ]
        ];
        echo "<h3>Багаторівневий масив:</h3>";
        dump($nestedArray);

        // Використання VarDumper для HTML виводу
        echo "<h3>HTML формат (якщо підтримується):</h3>";
        $dumper = new HtmlDumper();
        $cloner = new VarCloner();
        $dumper->dump($cloner->cloneVar($nestedArray));
    }
}
