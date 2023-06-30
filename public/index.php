<?php

session_start();

use Intetics\MvcTask\Core\Route;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
require_once '../config/app.php';
require_once __DIR__.'/../app/routes/web.php';

$url = $_SERVER['REQUEST_URI'];

try {
    new Route($url);
} catch (Exception $e) {
}

