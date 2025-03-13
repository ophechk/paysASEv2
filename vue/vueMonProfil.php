
<h1>Mon profil</h1>

Mon adresse électronique : <?= $util["email"] ?> <br />
Mon pseudo : <?= $util["pseudo"] ?> <br />

<hr>

les pays favoris : <br />
<?php for($i=0;$i<count($mesPaysFavoris);$i++){ ?>
    <a href="./?action=detail&id=<?= $mesPaysFavoris[$i]["id"] ?>"><?= $mesPaysFavoris[$i]["nom"] ?></a><br />
<?php } ?>
<hr>
<a href="./?action=deconnexion">Se deconnecter</a>


