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
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use App\Builder\LivreBuilder;

// Obtenir des données publiéesb 
$data = json_decode(file_get_contents("php://input"));
// $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// $id = (int) $_GET['id'] ?? 0;

if (!empty($data->isbn) && !empty($data->titre) && !empty($data->id)
    && !empty($data->auteur) && !empty($data->prix)
) {
    // Définir les valeurs des propriétés du produit
    $livre = LivreBuilder::find($data->id);
    if ($livre->id) {
        // sanitize
        $livre->isbn          = htmlspecialchars(strip_tags($data->isbn)) ?? $livre->isbn;
        $livre->titre         = htmlspecialchars(strip_tags($data->titre)) ?? $livre->titre;
        $livre->auteur        = htmlspecialchars(strip_tags($data->auteur)) ?? $livre->auteur;
        $livre->annee_edition = htmlspecialchars(strip_tags($data->annee_edition)) ?? $livre->annee_edition;
        $livre->prix          = htmlspecialchars(strip_tags($data->prix)) ?? $livre->prix;
        $livre_id = $livre->save();

        if ($livre_id) {
            // Définir le code de réponse - 200 ok
            http_response_code(200);
            echo json_encode(["message" => "Le livre a été mis à jour."]);
        } else {
            // Définir le code de réponse - 503 service non disponible
            http_response_code(503);
            $msg = "Impossible de mettre à jour le livre.";
            echo json_encode(["message" => $msg]);
        }
    } else {
        // Définir le code de réponse - 503 service non disponible
        http_response_code(503);
        $msg = "Impossible de supprimer le livre.";
        echo json_encode(["message" => $msg]);
    }
} else {
    http_response_code(400);
    $msg  = "Impossible de supprimer un livre. ";
    echo json_encode(["message" => $msg]);
}
