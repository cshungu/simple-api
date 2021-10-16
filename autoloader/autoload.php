<?php

/**
 * File
 * 
 * PHP version 8.0.8
 * 
 * @category App
 * @package  App
 * @author   Christian Shungu <christianshungu@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/cshungu
 * @version: 1
 * @date     10/10/2021
 * @file     autoload.php
 */
//Inclusion de tous classes
//require APP_ROOT.DIRECTORY_SEPARATOR.'core/autoloader/Loader.php';
require_once join(DIRECTORY_SEPARATOR, [APP_ROOT, 'autoloader', 'Loader.php']);
Loader::register();
