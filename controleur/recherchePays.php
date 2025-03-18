<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.pays.inc.php";
include_once "$racine/modele/bd.photo.inc.php";

$menuNav = array();
$menuNav[] = Array("url"=>"./?action=recherche&critere=nom","label"=>"Recherche par nom");

// critere de recherche par defaut
$critere = "nom";
if (isset($_GET["critere"])) {
    $critere = $_GET["critere"];
}

// recuperation des donnees GET, POST, et SESSION
if (isset($_GET["critere"])){
    $critere = $_GET["critere"];
}
$nom="";
if (isset($_POST["nom"])){
    $nomR = $_POST["nom"];
}
// $capitale="";
// if (isset($_POST["capitale"])){
//     $voieAdrR = $_POST["capitale"];
// }

// $tabIdTC = array();
// if(isset($_POST["tabIdTC"])){
//     $tabIdTC = $_POST["tabIdTC"];
// }


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


switch($critere){
    case 'nom':
        // recherche par nom
        $listePays = getPaysByNom($nom);
        break;
    // case 'capitale':
    //     // recherche par adresse
    //     $listePays = getPaysByCapitale($capitale);
    //     break;
    
    
}

// recuperer les types de cuisine si on est en recherche par type de cuisine ou multicritere

if ($critere=="type" || $critere=="multi"){
    $email = getEmailLoggedOn();
}

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Recherche d'un restaurant";
include "$racine/vue/entete.html.php";
include "$racine/vue/vueRecherchePays.php";
if (!empty($_POST)) {
    // affichage des resultats de la recherche
    include "$racine/vue/vueResultRecherche.php";
}
include "$racine/vue/pied.html.php";


?>