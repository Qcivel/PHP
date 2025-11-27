<?php
//MODIFIER UN COMPTE : ROUTE EN METHOD PUT

/////////////////////////////
//  HEADER DE LA ROUTE :
/////////////////////////////

// Accès depuis n'importe quel site ou appareil (*)
header("Access-Control-Allow-Origin:*");

// Format des données envoyées
header("Content-Type: application/json; charset=UTF-8");

// Méthode autorisée, ici PUT, mais ça peut être GET, POST ou DELETE
header("Access-Control-Allow-Methods: GET");

// Entêtes autorisées
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] !== "GET"){
    //Si la Requête n'utilise pas la méthode GET :
    //1) J'encode un code de réponse HTTP
    http_response_code(405); // 405 -> Code d'erreur pour : Méthode non autorisé

    //2) J'encode la réponse (qui est en tableau associatif) sous forme de JSON
    $json = json_encode(["message" => "Vous n'utilisez pas la bonne méthode GET"]);

    //3) J'envoie la réponse en effectuant son affichae
    print_r($json);
    return;

}