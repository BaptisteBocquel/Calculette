<?php

    //PARTIE ENVOIE DES DONNEES AU FRONTEND

    // Permet d'éviter les problèmes de CORS (sécurité)

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, x-requested-with');
    header('Content-Type: text/plain');

    $fichier = file("resultats.txt"); // Nom du fichier à afficher, son adresse de localisation
 
    $total = count($fichier); // Nombre total des lignes du fichier

    for($i = 0; $i < $total; $i++) 
    { 
        
        echo $fichier[$i]; // On affiche ligne par ligne le contenu du fichier

    } 

?>