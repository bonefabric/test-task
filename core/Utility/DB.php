<?php
declare(strict_types=1);

namespace Core\Utility;

class DB
{

    private static \PDO $instance;

    private static bool $init = false;

    /**
     * @return \PDO
     */
    public static function getInstance(): \PDO
    {
        if (!static::$init) {
            static::$instance = new \PDO('sqlite:' . ROOT_PATH . 'db' . DIRECTORY_SEPARATOR . 'database.db');
            static::$init = true;
        }
        return static::$instance;
    }
}
