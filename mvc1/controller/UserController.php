<?php
namespace controller;

use controller\BaseController;
use model\User;

class UserController implements BaseController 
{
    public static function getInstance() {
        if (!isset($_SESSION["instance"]) || !isset($_SESSION["usuarios"])) 
        {
            $_SESSION["instance"] = new UserController();
            $_SESSION["usuarios"] = [];
        }
        
        return $_SESSION["instance"];
    }

    public function show() {
        return "views/login";
    }

    public function createUser($user, $pass) 
    {
        $usr = new User();
        $usr->setUser($user);
        $usr->setPasswd($pass);

        array_push($_SESSION["usuarios"], $usr);

        return "views/loggedIn";
    }

    public static function getUserByName($name) 
    {
        for ($i = 0; $i < sizeof($_SESSION["usuarios"]); $i++)
        {
            if ($_SESSION["usuarios"][$i]->getUser() == $name)
                return $_SESSION["usuarios"][$i];
        }
    }
}
