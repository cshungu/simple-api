<?php

/**
 * App
 * 
 * PHP version 7.4.5
 * 
 * @category App
 * @package  App
 * @author   Christian Shungu <christianshungu@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     https://github.com/silex100
 * @version: 1
 * @date     12/02/2021
 * @file     functions.php
 */
function debug()
{
    $numargs = func_get_args();
    echo "<pre>";
    echo print_r([...$numargs], true);
    echo "</pre>";
}
