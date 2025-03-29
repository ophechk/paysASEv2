<?php
require_once __DIR__ . '/../modele/bd.photo.inc.php';

// Récupération de l'ID de la photo principale du pays
$photo_id = isset($unPays['photo_idPh']) ? intval($unPays['photo_idPh']) : null;
$photo = (!empty($photo_id)) ? getPhotoByIdPh($photo_id) : null;

?>

<h1><?= $unPays['nom']; ?>

    <?php if ($favoris != false) { ?>
        <a href="./?action=favoris&idP=<?= $unPays['idP']; ?>" ><img class="favoris" src="images/Favoris1.png"></a>
    <?php } else { ?>
        <a href="./?action=favoris&idP=<?= $unPays['idP']; ?>" ><img class="favoris" src="images/PasFavoris.png"></a>
    <?php } ?>

</h1>


<!-- Affichage de la photo principale du pays -->
<div id="photo-pays">
    <?php
    if (!empty($photo) && isset($photo['chemin'])) {
        $chemin = 'photos/' . htmlspecialchars($photo['chemin']);
        if (file_exists(__DIR__ . "/../$chemin")) { ?>
            <img src="/paysASEv2/<?= $chemin ?>" alt="Image de <?= htmlspecialchars($unPays['nom']) ?>" />
        <?php }
    } ?>
</div>

<h2 id="capital">Capitale :</h2>
<p><?= htmlspecialchars($unPays['capital']) ?></p>

<h2 id="population">Population :</h2>
<p><?= htmlspecialchars($unPays['population']) ?> d'habitants</p>

<h2 id="superficie">Superficie :</h2>
<p><?= htmlspecialchars($unPays['superficie']) ?> km²</p>

</ul>
