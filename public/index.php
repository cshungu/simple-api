<?php

/**
 * File book-rest-api
 * 
 * PHP version 8.0.8
 * 
 * @category App
 * @package  App
 * @author   Christian Shungu <christianshungu@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/silex100
 * @version: 1
 * @date     12/02/2021
 * @file     index.php
 */

use App\Model\Livre;

error_reporting(E_ALL);
ini_set('display_errors', '1');
define('APP_ROOT', dirname(getcwd()));
require_once join(
    DIRECTORY_SEPARATOR,
    [APP_ROOT, 'bootstrap', 'app.php']
);
