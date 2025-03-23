<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/authentification.inc.php";

// creation du menu burger
$menuNav = array();
$menuNav[] = array("url" => "./?action=inscription", "label" => "Inscription");
$menuNav[] = array("url" => "./?action=recherche&critere=nom", "label" => "Recherche par nom");
$menunav[] = array("url" => "./?action=recherche&critere=capital", "label" => "Recherche par capitale");

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["email"]) && isset($_POST["mot_de_passe"])) {
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];
} else {
    $email = "";
    $mot_de_passe = "";
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


// traitement si necessaire des donnees recuperees
login($email, $mot_de_passe);

if (isLoggedOn()) { // si l'utilisateur est connecté on redirige vers le controleur monProfil
    include "$racine/controleur/monProfil.php";
} else { // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue 
    $titre = "authentification";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueAuthentification.php";
    include "$racine/vue/pied.html.php";
}

?>