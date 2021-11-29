<?php

$_POST = json_decode(file_get_contents("php://input"),true); // on decode ce qui est envoyé par le front

// Permet d'éviter les problèmes de CORS (sécurité)

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, x-requested-with');
header('Content-Type: text/plain');

$result = $_POST['result']; // on recupére le résultat envoyé par axios

file_put_contents('resultats.txt', "\n$result", FILE_APPEND);


?>