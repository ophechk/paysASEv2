<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.resto.inc.php";
include_once "$racine/modele/bd.photo.inc.php";

// creation du menu burger
$menuNav = array();
$menuNav[] = array("url" => "./?action=recherche&critere=nom", "label" => "Recherche par nom");
$menuNav[] = array("url" => "./?action=recherche&critere=capital", "label" => "Recherche par capitale");

// critere de recherche par defaut
$critere = "nom";
if (isset($_GET["critere"])) {
    $critere = $_GET["critere"];
}

// recuperation des donnees GET, POST, et SESSION
if (isset($_GET["critere"])) {
    $critere = $_GET["critere"];
}
$nom = "";
if (isset($_POST["nom"])) {
    $nom = $_POST["nom"];
}
$capital = "";
if (isset($_POST["capital"])) {
    $capital = $_POST["capital"];
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


switch ($critere) {
    case 'nom':
        // recherche par nom
        $listePays = getPaysByNom($nom);
        break;
    case 'capital':
        // recherche par adresse
        $listePays = getPaysByCapital($capital);
        break;
}

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Recherche d'un pays";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueRecherchePays.php";
if (!empty($_POST)) {
    // affichage des resultats de la recherche
    include "$racine/vue/vueResultRecherche.php";
}
include "$racine/vue/pied.html.php";


?>