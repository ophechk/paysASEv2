<?php

include_once "bd.inc.php";

function getPhotosByIdP($idP)
{
    if (!isset($idP) || empty($idP)) {
        throw new Exception("Le paramètre idP est manquant ou invalide.");
    }

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT chemin FROM photo WHERE idPh = :idPh");
        $req->bindParam(':idPh', $idPh, PDO::PARAM_INT);

        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC) ?: []; // Retourne un tableau vide si aucun résultat
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getPhotoByIdPh($idPh)
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from photo where idPh=:idPh");
        $req->bindValue(':idPh', $idPh, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addPhoto($idPh, $chemin, $idP)
{
    if (!isset($idPh) || !isset($chemin) || !isset($idP)) {
        throw new Exception("Un ou plusieurs paramètres sont manquants.");
    }

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO photo (idPh, chemin, idP) VALUES (:idPh, :chemin, :idP)");
        $req->bindValue(':idPh', $idPh, PDO::PARAM_INT);
        $req->bindValue(':chemin', $chemin, PDO::PARAM_STR);
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);

        return $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "\n addPhoto(0, \"entrepote1.jpg\",1) : \n";
    print_r(addPhoto(0, "entrepote1.jpg", 1));

    echo "\n addPhoto(1, \"entrepote2.jpg\",1) : \n";
    print_r(addPhoto(1, "entrepote2.jpg", 1));

    echo "\n addPhoto(2, \"sapporo1.jpg\",3) : \n";
    print_r(addPhoto(2, "sapporo1.jpg", 3));



    echo "\n getPhotosByIdP(1) : \n";
    print_r(getPhotosByIdP(1));

    echo "\n getPhotosByIdP(3) : \n";
    print_r(getPhotosByIdP(3));

    echo "\n getPhotoByIdPh(1) : \n";
    print_r(getPhotoByIdPh(1));

    echo "\n addPhoto(3, 'image.jpg', 2) : \n";
}
?>