<?php

include_once "bd.inc.php";

function getUtilisateurs()
{
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

function getUtilisateurByEmail($email)
{
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

function addUtilisateur($email, $mot_de_passe, $pseudo)
{
    try {
        $cnx = connexionPDO();

        $mdpUCrypt = crypt($mot_de_passe, "sel");
        $req = $cnx->prepare("insert into utilisateur (email, mot_de_passe, pseudo) values(:email,:mot_de_passe,:pseudo)");
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':mot_de_passe', $mdpUCrypt, PDO::PARAM_STR);
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updtMdpUtilisateur($email, $new_password) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE utilisateur SET mot_de_passe = :mot_de_passe WHERE email = :email");
        $req->bindValue(':mot_de_passe', password_hash($new_password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        return $req->execute();
    } catch (PDOException $e) {
        error_log("Erreur PDO dans updtMdpUtilisateur: " . $e->getMessage());
        return false;
    }
}

function updtPseudoUtilisateur($email, $pseudo) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("UPDATE utilisateur SET pseudo = :pseudo WHERE email = :email");
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        return $req->execute();
    } catch (PDOException $e) {
        error_log("Erreur PDO dans updtPseudoUtilisateur: " . $e->getMessage());
        return false;
    }
}


if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getUtilisateurs() : \n";
    print_r(getUtilisateurs());

    echo "getUtilisateurByMailU(\"mathieu.capliez@gmail.com\") : \n";
    print_r(getUtilisateurByEmail("mathieu.capliez@gmail.com"));

    echo "addUtilisateur(\"mathieu.capliez3@gmail.com\") : \n";
    addUtilisateur("mathieu.capliez3@gmail.com", "Passe1?", "mat");
}
?>