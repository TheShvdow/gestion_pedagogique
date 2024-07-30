<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\CourseController;
use App\Controllers\SessionController;

session_start();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($uri) {
    case '/':
    case '/courses':
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        $controller = new CourseController();
        $controller->listCourses();
        break;

    case '/sessions':
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        $controller = new SessionController();
        $controller->showSessions();
        break;

    case '/login':
        $controller = new AuthController();
        $controller->login();
        break;

    case '/register':
    $controller = new AuthController(); 
        $controller->register();
        break;

    case '/logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        echo 'Page not found';
        break;
}
