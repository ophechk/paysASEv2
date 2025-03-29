<?php

include_once "bd.utilisateur.inc.php";

function startSession() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Démarrer la session si elle n'est pas déjà active
    }
}

function login($email, $mot_de_passe)
{
    startSession(); // Démarre la session si elle n'est pas encore active

    // Récupération de l'utilisateur depuis la base de données
    $util = getUtilisateurByEmail($email);
    if ($util) {
        $mdpBD = $util["mot_de_passe"]; // Mot de passe crypté stocké en base de données

        // Vérification du mot de passe
        if (password_verify($mot_de_passe, $mdpBD)) {
            // Le mot de passe est correct, enregistrer l'utilisateur dans la session
            $_SESSION["email"] = $email;
            $_SESSION["utilisateur_idU"] = $util["idU"];  // Vous devez aussi stocker l'ID utilisateur pour d'autres actions
        }
    }
}

function logout()
{
    startSession(); // Démarre la session si elle n'est pas encore active
    unset($_SESSION["email"]);
    unset($_SESSION["utilisateur_idU"]);
    unset($_SESSION["mot_de_passe"]);
}

function getEmailLoggedOn()
{
    startSession(); // Démarre la session si elle n'est pas encore active
    return isLoggedOn() ? $_SESSION["email"] : "";
}

function getidULoggedOn()
{
    startSession(); // Démarre la session si elle n'est pas encore active
    return isLoggedOn() ? $_SESSION["utilisateur_idU"] : "";
}

function isLoggedOn()
{
    startSession(); // Démarre la session si elle n'est pas encore active
    $ret = false;

    if (isset($_SESSION["email"])) {
        $util = getUtilisateurByEmail($_SESSION["email"]);
        // Vérifie si l'utilisateur existe et si les informations sont valides
        if ($util && $util["email"] == $_SESSION["email"] && isset($_SESSION["utilisateur_idU"])) {
            $ret = true;
        }
    }
    return $ret;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // Programme principal de test

    header('Content-Type:text/plain');

    // Test de connexion
    login("mathieu.capliez@gmail.com", "Passe1?");
    if (isLoggedOn()) {
        echo "logged";
    } else {
        echo "not logged";
    }

    // Déconnexion
    logout();
}

?>
