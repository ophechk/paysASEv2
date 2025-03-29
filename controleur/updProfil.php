<?php
// Démarrer la session pour accéder aux variables de session
session_start();

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.pays.inc.php";
include_once "$racine/modele/bd.favoris.inc.php";

// Création du menu burger
$menuNav = array();
$menuNav[] = array("url" => "./?action=profil", "label" => "Consulter mon profil");
$menuNav[] = array("url" => "./?action=updProfil", "label" => "Modifier mon profil");

// Initialisation des messages
$messageMdp = "";
$messagePseudo = "";

// Récupération des données GET, POST et SESSION
if (isLoggedOn()) {
    $email = getEmailLoggedOn();
    $util = getUtilisateurByEmail($email);

    // Traitement des données reçues

    // Mise à jour du pseudo
    if (isset($_POST["pseudo"]) && !empty($_POST["pseudo"])) {
        $pseudo = htmlspecialchars($_POST["pseudo"]);
        if ($pseudo != "") {
            if (updtPseudoUtilisateur($email, $pseudo)) {
                $messagePseudo = "Pseudo mis à jour avec succès!";
            } else {
                $messagePseudo = "Erreur lors de la mise à jour du pseudo.";
            }
        }
    }

    // Mise à jour du mot de passe
    if (isset($_POST["mot_de_passe"]) && isset($_POST["mot_de_passe2"])) {
        if ($_POST["mot_de_passe"] != "") {
            if ($_POST["mot_de_passe"] == $_POST["mot_de_passe2"]) {
                // Mise à jour réussie du mot de passe
                if (updtMdpUtilisateur($email, $_POST["mot_de_passe"])) {
                    $messageMdp = "Mot de passe mis à jour avec succès!";
                    
                    // Mettre à jour les données dans la session
                    $_SESSION['email'] = $email;
                    $_SESSION['pseudo'] = getUtilisateurByEmail($email)["pseudo"];
 
                } else {
                    $messageMdp = "Erreur lors de la mise à jour du mot de passe.";
                }
            } else {
                $messageMdp = "Les mots de passe ne correspondent pas.";
            }
        }
    }

    // Appel des fonctions permettant de récupérer les données utiles à l'affichage
    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueUpdProfil.php";
    include "$racine/vue/pied.html.php";
} else {
    // Si l'utilisateur n'est pas connecté
    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pied.html.php";
}
?>
