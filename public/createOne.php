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
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header(
    "Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, 
    Authorization, X-Requested-With"
);

use App\Model\Livre;

// Obtenir des données publiéesb 
$data = json_decode(file_get_contents("php://input"));

if (!empty($data->isbn) && !empty($data->titre)
    && !empty($data->auteur) && !empty($data->prix)
) {
    // Définir les valeurs des propriétés du produit
    $livre = new Livre;
    // sanitize
    $livre->isbn          = htmlspecialchars(strip_tags($data->isbn));
    $livre->titre         = htmlspecialchars(strip_tags($data->titre));
    $livre->auteur        = htmlspecialchars(strip_tags($data->auteur));
    $livre->annee_edition =  date('Y-m-d H:i:s');
    $livre->prix          = $data->prix;
    $livre_id = $livre->save();
    if ($livre_id) {
        // set response code - 201 created
        http_response_code(201);
        // Le livre a été créé.
        $msg = "Le livre a été ajoutéé";
        echo json_encode(["message" => $msg]);
    } else {
        // Définir le code de réponse - 503 service non disponible
        http_response_code(503);
        // Dire à l'utilisateur
        $msg = "Impossible d'ajouter le produit.";
        echo json_encode(["message" => $msg]);
    }
} else {
    http_response_code(400);
    $msg  = "Impossible de créer un livre. ";
    $msg .= "Les données sont incomplètes.";
    echo json_encode(["message" => $msg]);
}
//Assurez-vous que les données ne sont pas vides