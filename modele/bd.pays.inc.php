<?php

include_once "bd.inc.php";

function getPaysById($idPays) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from pays where id=:id");
        $req->bindValue(':idPays', $idPays, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getPays() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from pays");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getPaysByNom($nom) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from pays where nom like :nom");
        $req->bindValue(':nom', "%" . $nom . "%", PDO::PARAM_STR);

        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getPaysFavoriesByEmail($email) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select pays.* from pays,favoris where pays.id = favoris.id and email = :email");
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getPays() : \n";
    print_r(getPays());

    echo "getpaysByidPays(idPays) : \n";
    print_r(getPaysById(1));

    echo "getPaysByNom(nom) : \n";
    print_r(getPaysByNom("charcut"));

}
?>