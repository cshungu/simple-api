<?php

/**
 * App\Builder\LivreBuilder
 * 
 * PHP version 8.0.8
 * 
 * @category App
 * @package  App
 * @author   Christian Shungu <christianshungu@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/cshungu
 * @version: 1
 * @date     12/02/2021
 * @file     LivreBuilder.php
 */

namespace App\Builder {

    use App\Model\Livre;

    /**
     * App\Builder\LivreBuilder
     * 
     * @category App
     * @package  App
     * @author   Christian Shungu <christianshungu@lanteas.com>
     * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
     * @link     https://github.com/silex100
     */
    class LivreBuilder
    {
        /**
         * From
         * 
         * @param string $name -
         * @param string $args -
         * 
         * @return Livre
         */
        public static function __callStatic($name, $args = [])
        {
            return call_user_func_array(
                [new Livre, $name],
                $args
            );
        }
    }
}
