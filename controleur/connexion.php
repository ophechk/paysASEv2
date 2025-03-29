<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/authentification.inc.php";

// creation du menu burger
$menuNav = array();
$menuNav[] = array("url" => ".?action=inscription", "label" => "Inscription");

// recuperation des donnees GET, POST, et SESSION
if (!isset($_POST["email"]) || !isset($_POST["mot_de_passe"])) {
    // on affiche le formulaire de connexion
    $titre = "authentification";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueAuthentification.php";
    include "$racine/vue/pied.html.php";
} else {
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];

    login($email, $mot_de_passe);

    if (isLoggedOn()) { // si l'utilisateur est connecté on redirige vers le controleur monProfil
        include "$racine/controleur/monProfil.php";
    } else {
        // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
        $titre = "authentification";
        include "$racine/vue/entete.html.php";
        include "$racine/vue/vueAuthentification.php";
        include "$racine/vue/pied.html.php";
    }
}

?>