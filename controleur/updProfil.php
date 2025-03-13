<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.pays.inc.php";
include_once "$racine/modele/bd.favoris.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url" => "./?action=profil", "label" => "Consulter mon profil");
$menuBurger[] = Array("url" => "./?action=updProfil", "label" => "Modifier mon profil");

// init messages 
$messageMdp = "";

// recuperation des donnees GET, POST, et SESSION
if (isLoggedOn()) {
    $email = getEmailLoggedOn();
    $util = getUtilisateurByEmail($email);

        // traitement si necessaire des donnees recuperees

    if (isset($_POST["pseudo"])){
        $pseudo = $_POST["pseudo"];
        if ($pseudo!=""){
            updtPseudoUtilisateur($email, $pseudo);
        }
    }
    
    if (isset($_POST["password"]) && isset($_POST["password2"])) {
        if ($_POST["password"] != "") {
            if (($_POST["password"] == $_POST["password2"])) {
                updtPasswordUtilisateur($email, $_POST["password"]);
            } else {
                $messageMdp = "erreur de saisie du mot de passe";
            }
        }
    }



    
    // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
    $mespaysFavoris = getPaysFavorisByEmail($email);
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueUpdProfil.php";
    include "$racine/vue/pied.html.php";
}
else{
    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pied.html.php";
}
?>