<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["liste"] = "listePays.php";
    $lesActions["detail"] = "detailPays.php";
    $lesActions["recherche"] = "recherchePays.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["updProfil"] = "updProfil.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["favoris"] = "favoris.php";
    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>