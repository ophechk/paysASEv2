<h1>Mon profil</h1>

Mon adresse électronique : <?= $util["email"] ?> <br />
Mon pseudo : <?= $util["pseudo"] ?> <br />

<hr>

Les pays favoris : <br />
<?php for ($i = 0; $i < count($mesPayosFavoris); $i++) { ?>
    <a href="./?action=detail&idP=<?= $mesPaysFavoris[$i]["idP"] ?>"><?= $mesPaysFavoris[$i]["nom"] ?></a><br />
<?php } ?>
<hr>
<a href="./?action=deconnexion">Se deconnecter</a>