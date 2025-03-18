<?php

include_once "bd.inc.php";

function getPhotosByIdP($idP) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from photo where idP=:idP");
        $req->bindValue(':idR', $idP, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getPhotoByIdPh($idPh) {
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

function addPhoto($idPh, $cheminPh, $idP) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("insert into photo (idPh, cheminPh, idP) values(:idPh,:cheminPh,:idP)");
        $req->bindValue(':idPh', $idPh, PDO::PARAM_INT);
        $req->bindValue(':cheminPh', $cheminPh, PDO::PARAM_STR);
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
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
}
?>