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
define('APP_ROOT', dirname(getcwd()));
require_once join(DIRECTORY_SEPARATOR, [APP_ROOT, 'bootstrap', 'app.php']);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

use App\Builder\LivreBuilder;

$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = (int) $_GET['id'] ?? 0;

$livre = LivreBuilder::find($id);

if ($livre && $livre->id !== 0) {
    $arrLivre = [
        "id"             => $livre->id,
        "isbn"           => $livre->isbn,
        "titre"          => $livre->titre,
        "auteur"         => $livre->auteur,
        "annee_edition"  => $livre->annee_edition,
        "prix"           => $livre->prix
    ];
    http_response_code(200);
    echo json_encode($arrLivre);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Livre n'existe pas."));
}
