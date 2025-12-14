<?php

session_start();

$navPages = [
    'home' => ['title' => 'Home', 'file' => 'home.php'],
    'about' => ['title' => 'About us', 'file' => 'about.php'],
    'portfolio' => ['title' => 'Portfolio', 'file' => 'portfolio.php'],
    'contacts' => ['title' => 'Contacts', 'file' => 'contacts.php']
];

$requestUri = $_SERVER['REQUEST_URI'];
$path = parse_url($requestUri, PHP_URL_PATH);
$path = ltrim($path, '/');

if (empty($path)) {
    $currentPage = 'home';
} else {
    $currentPage = $path;
}

if (array_key_exists($currentPage, $navPages)) {
    $pageFile = $navPages[$currentPage]['file'];
    $pageTitle = $navPages[$currentPage]['title'] . ' - AGFT';
} elseif ($currentPage === 'login') {
    $pageFile = 'login.php';
    $pageTitle = 'Вхід в систему - AGFT';
} elseif ($currentPage === 'registration') {
    $pageFile = 'registration.php';
    $pageTitle = 'Реєстрація - AGFT';
} else {
    http_response_code(404);
    $pageFile = '404.php';
    $pageTitle = '404 - Сторінку не знайдено - AGFT';
    $currentPage = '404';
}

if (file_exists(__DIR__ . '/pages/' . $pageFile)) {
    include __DIR__ . '/pages/' . $pageFile;
} else {
    http_response_code(404);
    $pageTitle = '404 - Сторінку не знайдено - AGFT';
    $currentPage = '404';
    include __DIR__ . '/pages/404.php';
}
?>
