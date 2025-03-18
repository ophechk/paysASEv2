<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title><?php echo $titre ?></title>
        <style type="text/css">
            @import url("css/base.css");
            @import url("css/form.css");
            @import url("css/cgu.css");
            @import url("css/corps.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    </head>
    <body>
    <nav>
            
            <ul id="menuGeneral">
                <li><a href="./?action=accueil">Accueil</a></li>
                <?php if(isLoggedOn()){ ?>
                <li><a href="./?action=profil">Mon Profil</a></li>
                <?php } 
                else{ ?>
                <li><a href="./?action=connexion">Connexion</a></li>
                <?php } ?>
                
                
            </ul>
    </nav>

    <div id="bouton">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <ul id="menuContextuel">
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


    <div id="corps">