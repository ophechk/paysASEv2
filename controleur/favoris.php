<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.favoris.inc.php";


// recuperation des donnees GET, POST, et SESSION
$idP = $_GET["idP"];
$idU = getidULoggedOn();
$mesPaysFavoris = getFavorisByIdU($idU); 


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

$idU = getidULoggedOn();
if ($idU != "") {
    $favoris = getFavorisById($idU, $idP);

// traitement si necessaire des donnees recuperees
    ;
    if ($favoris == false) {
        addfavoris($idU, $idP);
    } else {
        delfavoris($idU, $idP);
    }
}

// redirection vers le referer
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>