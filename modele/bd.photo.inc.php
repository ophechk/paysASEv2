<?php

include_once "bd.inc.php";

// Retourne plusieurs photos sous forme d'un tableau
function getPhotosByIdPh($photo_idPh)
{
    $resultat = array();
    try {
        $cnx = connexionPDO(); // S'assurer qu'on a bien une connexion active
        $req = $cnx->prepare("SELECT * FROM photo WHERE idPh = :photo_idPh");
        $req->bindValue(':photo_idPh', $photo_idPh, PDO::PARAM_INT);

        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC); // Renvoie un seul résultat
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

// Retourne UNE SEULE photo
function getPhotoByIdPh($idPh)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM photo WHERE idPh = :idPh");
        $req->bindValue(':idPh', $idPh, PDO::PARAM_INT);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC); // Renvoie un seul résultat
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "\n getPhotosByIdR(1) : \n";
    print_r(getPhotosByIdPh(1));

    echo "\n getPhotosByIdR(3) : \n";
    print_r(getPhotosByIdPh(3));

    echo "\n getPhotoByIdP(1) : \n";
    print_r(getPhotoByIdPh(1));
}
?>