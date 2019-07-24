<?php
require_once 'vendor/autoload.php';

session_start();

use controller\UserController;

$uri = explode("/", $_SERVER['REQUEST_URI']);

if (!isset($_GET['page']))
    die('imposible de encontrar la ruta.');

$usrController = UserController::getInstance();

switch ($_GET['page']) {
    case 'login':
        require_once($usrController->createUser($_GET['user'] ?? null, $_GET['password'] ?? null) . ".php");
        break;
    default:
        require_once($usrController->show() . ".php");
        break;
}



