<h1>Liste des pays</h1>

<?php
for ($i = 0; $i < count($listePays); $i++) {
    ?>


    <?php
    $lesPhotos = getPhotosByIdPh($listePays[$i]['idP']);
    ?>

    <div class="card">
        <div class="photoCard">
            <?php if (count($lesPhotos) > 0) { ?>
                <img src="photos/<?= $lesPhotos[0]["chemin"] ?>" />
            <?php } ?>

        </div>
        <div class="descrCard">
            <?php echo "<a href='./?action=detail&idP=" . $listePays[$i]['idP'] . "'>" . $listePays[$i]['nom'] . "</a>"; ?>
            <br />
            <?= $listePays[$i]["capital"] ?>
        </div>
    </div>

    <?php
}
?>