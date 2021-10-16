<?php

namespace App\Database;

class Db
{
    /**
     * Db
     * 
     * @var    Db
     * @access private 
     * @static 
     */
    private static $_instance;

    /**
     * Constructor 
     * 
     * @param  void - 
     * @see    PDO::__construct()
     * @access private 
     */
    private function __construct()
    {
    }

    /**
     * Crée et retourne l'objet Db
     *
     * @access public
     * @static
     * @param  void
     * 
     * @return DB $instance
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            $db = new DbConnexion(
                new DbConfiguration(
                    ...include_once join(
                        DIRECTORY_SEPARATOR,
                        [APP_ROOT, 'config', 'param.php']
                    )
                )
            );
            try {
                self::$_instance = new \PDO(
                    $db->dsn(),
                    $db->username(),
                    $db->password()
                );
            } catch (\PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        return self::$_instance;
    }
}
