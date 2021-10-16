<?php

/**
 * Bootstrap/app
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
 * @file     bootstrap/app.php
 */

session_cache_limiter(false);
session_start();
require_once join(DIRECTORY_SEPARATOR, [APP_ROOT, 'config', 'functions.php']);
require_once join(DIRECTORY_SEPARATOR, [APP_ROOT, 'autoloader', 'autoload.php']);
// require_once join(DIRECTORY_SEPARATOR, [APP_ROOT, 'config', 'dataSeed.php']);
