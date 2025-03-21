
<div id="accroche">Venez découvrir les Pays d'Asie du Sud Est</div>

<br/>
<br/>

<h1>Quelques pays d'asie du Sud Est...</h1>



<?php

$listePays = getPays();

for ($i = 0; $i < min(5, count($listePays)); $i++) {
    ?>


    <?php
    $lesPhotos = getPhotoByIdPh($listePays[$i]['idP']);
    ?>

    <div class="card">
        <div class="photoCartes">
            <?php if (count($lesPhotos) > 0) { ?>
                <img src="photos/<?= $lesPhotos[0]["chemin"] ?>"/>
            <?php } ?>

        </div>
        <div class="carteDes"><?php echo "<a href='./?action=detail&idP=" . $listePays[$i]['idP'] . "'>" . $listePays[$i]['nom'] . "</a>"; ?>
            <br />
            Capitale :
            <?= $listePays[$i]["capital"] ?>
            <br/>
            Population :
            <?= $listePays[$i]["population"] ?>
            <br />
            Superficie :
            <?= $listePays[$i]["superficie"] ?>km²
            <br />
        </div>

    </div>
    <?php
}
?>



