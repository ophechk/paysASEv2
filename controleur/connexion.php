<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";

// creation du menu nav
// $menuNav = array();
// $menuNav[] = Array("url"=>"./?action=recherche&critere=nom","label"=>"Recherche par nom");
// $menuNav[] = Array("url"=>"./?action=recherche&critere=adresse","label"=>"Recherche par adresse");
// $menuNav[] = Array("url"=>"./?action=recherche&critere=type","label"=>"Recherche par type de cuisine");
// $menuNav[] = Array("url"=>"./?action=recherche&critere=multi","label"=>"Recherche multicritère");

// recuperation des donnees GET, POST, et SESSION
if (!isset($_POST["email"]) || !isset($_POST["password"])){
    // on affiche le formulaire de connexion
    $titre = "authentification";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/vueAuthentification.php";
    include "$racine/vue/pied.html.php";
}
else
{
    $email=$_POST["email"];
    $password=$_POST["password"];
    
    login($email,$password);

    if (isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
        include "$racine/controleur/monProfil.php";
    }
    else{
        // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
        $titre = "authentification";
        include "$racine/vue/entete.html.php";
        include "$racine/vue/vueAuthentification.php";
        include "$racine/vue/pied.html.php";
    }
}

?>