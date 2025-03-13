<?php

include_once "bd.inc.php";

function getFavorisByEmail($email) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from favoris where email=:email");
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getFavorisById($idPays) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from favoris where idPays=:idPays");
        $req->bindValue(':idpays', $idPays, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function addFavoris($email, $idPays) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("insert into Favoris (email, idR) values(:email,$idPays)");
        $req->bindValue('$idPays', $idPays, PDO::PARAM_INT);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function delFavoris($email, $idPays) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("delete from Favoris where idR=$idPays and email=:email");
        $req->bindValue('$idPays', $idPays, PDO::PARAM_INT);
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

    echo "\n getFavorisByEmail(\"mathieu.capliez@gmail.com\") : \n";
    print_r(getFavorisByEmail("mathieu.capliez@gmail.com"));

    echo "\n getFavorisById(1) : \n";
    print_r(getFavorisById(1));
    
    echo "\n delFavoris(\"mathieu.capliez@gmail.com\",2) : \n";
    print_r(delFavoris("mathieu.capliez@gmail.com", 2));

    
}
?>