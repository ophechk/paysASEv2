<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";  // Définit la racine des fichiers, à adapter selon la structure
}

include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.pays.inc.php";
include_once "$racine/modele/bd.favoris.inc.php";

// Création du menu burger (navigation)
$menuNav = array();
$menuNav[] = array("url" => "./?action=profil", "label" => "Consulter mon profil");
$menuNav[] = array("url" => "./?action=updProfil", "label" => "Modifier mon profil");

// Vérification si l'utilisateur est connecté
if (isLoggedOn()) {
    $email = getEmailLoggedOn();  // Récupère l'email de l'utilisateur connecté
    $util = getUtilisateurByEmail($email);  // Récupère les informations de l'utilisateur par email
    $idU = getidULoggedOn();  // Récupère l'ID utilisateur
    $mesPaysFavoris = getFavorisByIdU($idU);  // Récupère les pays favoris de l'utilisateur

    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueMonProfil.php";  // Ce fichier doit afficher les informations de l'utilisateur
    include "$racine/vue/pied.html.php";
} else {
    // Si l'utilisateur n'est pas connecté, affiche un message ou redirige vers la page de connexion
    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pied.html.php";
}
?>
