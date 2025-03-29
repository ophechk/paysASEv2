<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

// creation du menu burger
$menuNav = array();

$inscrit = false;
$msg = "";


// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["email"]) && isset($_POST["mot_de_passe"]) && isset($_POST["pseudo"])) {

    if ($_POST["email"] != "" && $_POST["mot_de_passe"] != "" && $_POST["pseudo"] != "") {
        $email = $_POST["email"];
        $mot_de_passe = $_POST["mot_de_passe"];
        $pseudo = $_POST["pseudo"];

        // enregistrement des donnees
        $ret = addUtilisateur($email, $mot_de_passe, $pseudo);
        if ($ret) {
            $inscrit = true;
        } else {
            $msg = "l'utilisateur n'a pas été enregistré.";
        }
    } else {
        $msg = "Renseigner tous les champs...";
    }
}

if ($inscrit) {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription confirmée";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueConfirmationInscription.php";
    include "$racine/vue/pied.html.php";
} else {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueInscription.php";
    include "$racine/vue/pied.html.php";
}
?>