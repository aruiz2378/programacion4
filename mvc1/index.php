<?php
require_once 'vendor/autoload.php';

use controller\UserController;

$uri = explode("/", $_SERVER['REQUEST_URI']);
$modulo = "";

if ( strpos($uri[3], "?") !== false) {
    $modulo = explode("?",$uri[3])[0];
} else
    $modulo = $uri[3];    

var_dump($modulo);

if (is_null($modulo) || empty($modulo) || $modulo == "index")
{
    $usrController = new UserController();
    require_once($usrController->show() . ".php");
}
else if ($modulo == "login") {
    $usrController = new UserController();
    require_once($usrController->validateUser($_GET['user'], $_GET['password']) . ".php");
}

