<h1>Liste des pays</h1>

<?php
for ($i = 0; $i < count($listePays); $i++) {

    if (isset($listePays[$i]['idP'])) {
        $lesPhotos = getPhotosByIdP($listePays[$i]['idP']);
    } else {
        $lesPhotos = [];
    }

    $lesPhotos = getPhotosByIdP($listePays[$i]['idP']);
    ?>
    

    <div class="photoCard">
        <?php if (count($lesPhotos) > 0) { ?>
            <img src="photos/<?= htmlspecialchars($lesPhotos[0]["cheminP"]) ?>"/>
        <?php } else { ?>
            <p>Aucune photo disponible</p>
        <?php } ?>
    </div>

    <?php
}
?>