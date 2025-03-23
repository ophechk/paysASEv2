<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.pays.inc.php";

$menuNav = array();
$menuNav[] = array("url" => "./?action=recherche&critere=nom", "label" => "Recherche par nom");
$menunav[] = array("url" => "./?action=recherche&critere=capital", "label" => "Recherche par capitale");

// recuperation des donnees GET, POST, et SESSION
;

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$listePays = getPays();

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Accueil - Pays.fr";
include "$racine/vue/entete.html.php";

include "$racine/vue/vueAccueil.php";
include "$racine/vue/pied.html.php";


?>