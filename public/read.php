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
error_reporting(E_ALL);
ini_set('display_errors', '0');
define('APP_ROOT', dirname(getcwd()));
require_once join(DIRECTORY_SEPARATOR, [APP_ROOT, 'bootstrap', 'app.php']);

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

use App\Builder\LivreBuilder as Livre;

$arrLivre = Livre::findAll() ?? [];

if (is_array($arrLivre) && count($arrLivre)) {
    http_response_code(200);
    echo json_encode($arrLivre);
} else {
    http_response_code(404);
    echo json_encode(["message" => "Aucun livre trouvé"]);
}
