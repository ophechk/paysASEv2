<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.pays.inc.php";
include_once "$racine/modele/bd.photo.inc.php";
include_once "$racine/modele/bd.favoris.inc.php";
include_once "$racine/modele/authentification.inc.php";

// creation du menu burger
$menuNav = array();
$menuNav[] = Array("url"=>"#top","label"=>"Le pays");
$menuNav[] = Array("url"=>"#capital","label"=>"Capitale");
$menuNav[] = Array("url"=>"#photos","label"=>"Photos");

// recuperation des donnees GET, POST, et SESSION
$idP = $_GET["idP"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$unPays = getPaysByIdP($idP);

$lesPhotos = getPhotosByIdPh($idPh);
$email = getEmailLoggedOn();

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "detail d'un pays";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueDetailResto.php";
include "$racine/vue/pied.html.php";
?>