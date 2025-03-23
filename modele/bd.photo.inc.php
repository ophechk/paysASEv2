<?php

include_once "bd.inc.php";

// Retourne plusieurs photos sous forme d'un tableau
function getPhotosByIdPh($photo_idPh) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM photo WHERE idPh = :photo_idPh");
    $stmt->execute(['photo_idPh' => $photo_idPh]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Renvoie plusieurs résultats
}

// Retourne UNE SEULE photo
function getPhotoByIdPh($idPh) {
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