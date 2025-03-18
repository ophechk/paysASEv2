<?php

include_once "bd.inc.php";

function getFavorisById($id) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from favoris where idU=:idU");
        $req->bindValue(':idU', $id, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addFavoris($email, $idP) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("insert into Favoris (email, idP) values(:email,$idP)");
        $req->bindValue('$idP', $idP, PDO::PARAM_INT);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function delFavoris($email, $idP) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("delete from Favoris where idP=$idP and email=:email");
        $req->bindValue('$idP', $idP, PDO::PARAM_INT);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        
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

    echo "\n addFavoris(\"mathieu.capliez@gmail.com\",1) : \n";
    print_r(addFavoris("mathieu.capliez@gmail.com", 1));

    echo "\n addFavoris(\"mathieu.capliez@gmail.com\",2) : \n";
    print_r(addFavoris("mathieu.capliez@gmail.com", 2));

    echo "\n getFavorisById(1) : \n";
    print_r(getFavorisById(1));
    
    echo "\n delFavoris(\"mathieu.capliez@gmail.com\",2) : \n";
    print_r(delFavoris("mathieu.capliez@gmail.com", 2));

    
}
?>