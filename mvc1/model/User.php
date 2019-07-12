<?php

namespace model;

class User extends Model
{
    protected static $tableName = "users";
    protected static $primaryKey = 'id';

    private $user;
    private $passwd;

    public function __construct() { }

    /**
     * Get the value of passwd
     */ 
    public function getPasswd()
    {
        return $this->getColumnValue('password');
    }

    /**
     * Set the value of passwd
     *
     * @return  self
     */ 
    public function setPasswd($passwd)
    {
        $this->setColumnValue('password', $passwd);
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->getColumnValue('user');
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->setColumnValue('user', $user);

        return $this;
    }
}
