<h1>Mon profil</h1>

Mon adresse électronique : <?= $util["email"] ?> <br />
Mon pseudo : <?= $util["pseudo"] ?> <br />

<hr>


<h2>Les pays que j'aime :</h2>
<?php
if (is_array($mesPaysFavoris) && count($mesPaysFavoris) > 0) {
    foreach ($mesPaysFavoris as $pays) { ?>
        <a href="./?action=detail&idP=<?= $pays['idP'] ?>"><?= $pays['nom'] ?></a><br />
    <?php }
} else {
    echo "Aucun pays favori trouvé.";
}
?>
<hr>

<a href="./?action=deconnexion">Se déconnecter</a>