<?php

namespace App\Model;

use  App\Database\Db;

abstract class Model
{
    /**
     *  PDO $db
     */
    protected \PDO $db;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    /**
     * Methode T
     *
     * Le nom Table
     * 
     * @param object|null $t - 
     * 
     * @return string
     */
    public static function table(?object $t): ?string
    {
        return (is_object($t)) ?
            strtolower(
                join('', array_slice(explode('\\',  get_class($t)), -1))
            ) : "";
    }
}
