<?php

include_once "bd.inc.php";

function getUtilisateurs() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByEmail($email) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur where email=:email");
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addUtilisateur($email, $password, $pseudo) {
    try {
        $cnx = connexionPDO();

        $passwordCrypt = crypt($password, "sel");
        $req = $cnx->prepare("insert into utilisateur (email, password, pseudo) values(:email,:password,:pseudo)");
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':password', $passwordCrypt, PDO::PARAM_STR);
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updtPasswordUtilisateur($email, $password) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $passwordCrypt = crypt($password, "sel");
        $req = $cnx->prepare("update utilisateur set password=:password where email=:email");
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':password', $passwordCrypt, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updtPseudoUtilisateur($email, $pseudo) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("update utilisateur set pseudo=:pseudo where email=:email");
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

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

    echo "getUtilisateurs() : \n";
    print_r(getUtilisateurs());

    echo "getUtilisateurByEmail(\"mathieu.capliez@gmail.com\") : \n";
    print_r(getUtilisateurByemail("mathieu.capliez@gmail.com"));

    echo "addUtilisateur(\"mathieu.capliez3@gmail.com\") : \n";
    addUtilisateur("mathieu.capliez3@gmail.com", "Passe1?", "mat");
}
?>