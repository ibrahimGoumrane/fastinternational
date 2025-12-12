<?php
session_start();

// Define base paths
define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/app');
define('PUBLIC_PATH', BASE_PATH . '/public');

// Language support
$lang = $_GET['lang'] ?? $_SESSION['lang'] ?? 'fr';
if (in_array($lang, ['fr', 'en'])) {
    $_SESSION['lang'] = $lang;
} else {
    $lang = 'fr';
}

// Load translations
$translations = include BASE_PATH . "/public/lang/{$lang}.php";

// Single Page Application - always load home controller
require_once APP_PATH . "/controllers/HomeController.php";
$controller = new HomeController($translations, $lang);
$controller->index();
?>
