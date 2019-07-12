<?php

namespace libs\Database;
use PDO;

class Database extends \PDO
{
    protected static $instance;

    protected $cache;

    static function getInstance($dsn = NULL, $dbname = NULL, $dbpass = NULL)
    {
        if (!self::$instance)
            self::$instance = new Database("mysql:host=186.159.129.2;dbname=PROGRA4", "progra4", "progra4");

        return self::$instance;
    }

    function __construct($dsn, $dbname, $dbpass)
    {
        parent::__construct($dsn, $dbname, $dbpass);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->cache = [];
    }

    function getPreparedStatment($query)
    {
        $hash = md5($query);
        if (!isset($this->cache[$hash])) {
            $this->cache[$hash] = $this->prepare($query);
        }
        return $this->cache[$hash];
    }

    function __destruct()
    {
        $this->cache = NULL;
    }
}
