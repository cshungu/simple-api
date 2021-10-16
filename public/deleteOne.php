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
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use App\Builder\LivreBuilder;

// Obtenir des données publiéesb 
$data = json_decode(file_get_contents("php://input"));
if (!empty($data->id)) {
    // Définir les valeurs des propriétés du produit
    $bool = LivreBuilder::delete($data->id);
    if ($bool) {
        // Définir le code de réponse - 200 ok
        http_response_code(200);
        echo json_encode(["message" => "Le livre a été supprimé ."]);
    } else {
        // Définir le code de réponse - 503 service non disponible
        http_response_code(503);
        $msg = "Impossible de supprimer le livre.";
        echo json_encode(["message" => $msg]);
    }
} else {
    http_response_code(400);
    $msg  = "Impossible de supprimer un livre. ";
    $msg .= "Les données sont incomplètes.";
    echo json_encode(["message" => $msg]);
}
