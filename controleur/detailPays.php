<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.pays.inc.php";
include_once "$racine/modele/bd.favoris.inc.php";
include_once "$racine/modele/authentification.inc.php";

$menuNav = array();
$menuNav[] = Array("url"=>"./?action=recherche&critere=nom","label"=>"Recherche par nom");

// recuperation des donnees GET, POST, et SESSION
$idP = $_GET["idP"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$unPays = getPaysById($idP);


$email = getEmailLoggedOn();

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "detail d'un pays";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueDetailPays.php";
include "$racine/vue/pied.html.php";
?>