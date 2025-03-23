<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title><?php echo $titre ?></title>
    <style type="text/css">
        @import url("css/styles.css");
    </style>
</head>

<body>
    <nav>

        <ul id="menu1">
            <li><a href="./?action=accueil">Accueil</a></li>
            <li><a href="./?action=recherche">Recherche</a></li>
            <?php if (isLoggedOn()) { ?>
                <li><a href="./?action=profil">Mon Profil</a></li>
            <?php } else { ?>
                <li><a href="./?action=connexion">Connexion</a></li>
            <?php } ?>


        </ul>
    </nav>

    <ul id="menu2">
        <?php if (isset($menuNav)) { ?>
            <?php for ($i = 0; $i < count($menuNav); $i++) { ?>
                <li>
                    <a href="<?php echo $menuNav[$i]['url']; ?>">
                        <?php echo $menuNav[$i]['label']; ?>
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>

    <div id="page">