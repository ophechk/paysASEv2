<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title><?php echo $titre ?></title>
</head>
<style type="text/css">
    @import url("css/base.css");
    @import url("css/form.css");
    @import url("css/page.css");
</style>

<body>
    <nav>

        <ul id="menuGeneral">
            <li><a href="./?action=accueil">Accueil</a></li>
            <?php if (isLoggedOn()) { ?>
                <li><a href="./?action=profil">Mon Profil</a></li>
            <?php } else { ?>
                <li><a href="./?action=connexion">Connexion</a></li>
            <?php } ?>
            <?php if (isset($menuNav) && is_array($menuNav)) { ?>
                    <?php foreach ($menuNav as $menuItem) { ?>
                    <li>
                        <a href="<?= htmlspecialchars($menuItem['url']) ?>">
                            <?= htmlspecialchars($menuItem['label']) ?>
                        </a>
                    </li>
                <?php } ?>
            <?php } else { ?>
                <li>Aucun menu disponible</li>
            <?php } ?>
        </ul>

    </nav>

    <div id="page">