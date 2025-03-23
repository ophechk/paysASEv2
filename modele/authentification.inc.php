<?php

include_once "bd.utilisateur.inc.php";

function login($email, $mot_de_passe)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByEmail($email);
    $mdpBD = $util["mot_de_passe"];

    if (trim($mdpBD) == trim(string: crypt($mot_de_passe, $mdpBD))) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["email"] = $email;
        $_SESSION["mot_de_passe"] = $mdpBD;
    }
}

function logout()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["email"]);
    unset($_SESSION["mot_de_passe"]);
}

function getEmailLoggedOn()
{
    if (isLoggedOn()) {
        $ret = $_SESSION["email"];
    } else {
        $ret = "";
    }
    return $ret;

}

function isLoggedOn()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["email"])) {
        $util = getUtilisateurByEmail($_SESSION["email"]);
        if (
            $util["email"] == $_SESSION["email"] && $util["mot_de_passe"] == $_SESSION["mot_de_passe"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');


    // test de connexion
    login("mathieu.capliez@gmail.com", "Passe1?");
    if (isLoggedOn()) {
        echo "logged";
    } else {
        echo "not logged";
    }

    // deconnexion
    logout();
}
?>