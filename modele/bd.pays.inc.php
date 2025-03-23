<?php

include_once "bd.inc.php";

function getPaysByIdP($idP)
{

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from pays where idP=:idP");
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getPays()
{
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


function getPaysByMotsCles($tabMots)
{
    $resultat = array();

    $filtre = "";
    for ($i = 0; $i < count($tabMots); $i++) {
        $filtre .= " or  nom like '%:mot$i%' ";
        $filtre .= " or  capital like '%:mot$i%' ";
    }

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from pays " . $filtre);
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


function getPaysByNom($nom)
{
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

function getPaysByCapital($capital)
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from pays where capital like :capital");
        $req->bindValue(':capital', "%" . $capital . "%", PDO::PARAM_STR);
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

    echo "getPaysByIdP(idP) : \n";
    print_r(getPaysByIdP(1));

    echo "getRestosByNomR(nomR) : \n";
    print_r(getPaysByNom("Cambodge"));

    echo "getPaysByCapital(capital) : \n";
    print_r(getPaysByCapital("Phnom Penh"));
}
?>