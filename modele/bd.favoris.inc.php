<?php

include_once "bd.inc.php";

function getFavorisByIdU($idU) {
    try {
        $cnx = connexionPDO();  
        $req = $cnx->prepare("SELECT pays.idP, pays.nom FROM favoris JOIN pays ON favoris.pays_idP = pays.idP WHERE favoris.utilisateur_idU = :idU");  
        $req->bindValue(':idU', $idU, PDO::PARAM_INT);  
        $req->execute(); 
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);  

        if (empty($resultat)) {
            return [];  
        }
    } catch (PDOException $e) {
        error_log("Erreur PDO dans getFavorisByIdU: " . $e->getMessage());  
        return [];  
    }

    return $resultat;
}


function getFavorisByIdP($idP) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        // Correction des noms des colonnes : 'pays_idP' au lieu de 'idP'
        $req = $cnx->prepare("SELECT * FROM favoris WHERE pays_idP = :idP");
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getFavorisById($idU, $idP){
    try {
        $cnx = connexionPDO();
        // Correction des noms des colonnes : 'utilisateur_idU' et 'pays_idP'
        $req = $cnx->prepare("SELECT * FROM favoris WHERE utilisateur_idU = :idU AND pays_idP = :idP");
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);
        $req->bindValue(':idU', $idU, PDO::PARAM_INT); // Correction du type pour un ID utilisateur
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addFavoris($idU, $idP) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();
        // Correction des noms des colonnes : 'utilisateur_idU' et 'pays_idP'
        $req = $cnx->prepare("INSERT INTO favoris (utilisateur_idU, pays_idP) VALUES (:idU, :idP)");
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);
        $req->bindValue(':idU', $idU, PDO::PARAM_INT); // Correction du type pour un ID utilisateur
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function delFavoris($idU, $idP) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        // Correction des noms des colonnes : 'pays_idP' et 'utilisateur_idU'
        $req = $cnx->prepare("DELETE FROM favoris WHERE pays_idP = :idP AND utilisateur_idU = :idU");
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);
        $req->bindValue(':idU', $idU, PDO::PARAM_INT); // Correction du type pour un ID utilisateur
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Programme principal de test
    header('Content-Type:text/plain');

    echo "\n addFavoris(1, 1) : \n";
    print_r(addFavoris(1, 1));

    echo "\n addFavoris(1, 2) : \n";
    print_r(addFavoris(1, 2));

    echo "\n getFavorisByIdU(1) : \n";
    print_r(getFavorisByIdU(1));

    echo "\n getFavorisByIdP(1) : \n";
    print_r(getFavorisByIdP(1));
    
    echo "\n delFavoris(1, 2) : \n";
    print_r(delFavoris(1, 2));
}
?>