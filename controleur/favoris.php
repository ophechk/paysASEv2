<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.favoris.inc.php";


// recuperation des donnees GET, POST, et SESSION
$idPays = $_GET["id"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

$email = getEmailLoggedOn();
if ($email != "") {
    $favoris = getFavorisById($email, $id);

// traitement si necessaire des donnees recuperees
    ;
    if ($favoris == false) {
        addFavoris($email, $id);
    } else {
        delFavoris($email, $id);
    }
}

// redirection vers le referer
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>