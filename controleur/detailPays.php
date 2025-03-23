<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/bd.pays.inc.php";
include_once "$racine/modele/bd.photo.inc.php";
include_once "$racine/modele/bd.favoris.inc.php";
include_once "$racine/modele/authentification.inc.php";

// Récupération sécurisée des variables GET
$idP = isset($_GET["idP"]) ? intval($_GET["idP"]) : 0;
$idPh = isset($_GET["idPh"]) ? intval($_GET["idPh"]) : null;

// Vérification que l'ID est valide
if ($idP <= 0) {
    die("Erreur : ID du pays non valide.");
}

// Récupération des données
$unPays = getPaysByIdP($idP);
if (!$unPays) {
    die("Erreur : Aucun pays trouvé avec cet identifiant.");
}

// Récupération des photos
$lesPhotos = getPhotosByIdPh($idPh);
if (!is_array($lesPhotos)) {
    $lesPhotos = []; // Si la requête échoue, on met un tableau vide
}

$email = getEmailLoggedOn();

// Affichage des vues
$titre = "Détail d'un pays";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueDetailPays.php";
include "$racine/vue/pied.html.php";

?>
