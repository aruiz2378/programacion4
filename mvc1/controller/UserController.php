<?php
namespace controller;

use controller\BaseController;
use model\User;

class UserController implements BaseController 
{

    public static $mUser;

    public function show() {
        return "views/login";
    }

    public function validateUser($user, $pass) 
    {
        self::$mUser = new User();
        self::$mUser->setUser($user);
        self::$mUser->setPasswd($pass);

        return "views/loggedIn";
    }

    public static function getUser() {
        return self::$mUser;
    }


}