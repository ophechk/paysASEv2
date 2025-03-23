<h1><?= $unPays['nom']; ?>

    <?php if ($favoris != false) { ?>
        <a href="./?action=favoris&idP=<?= $unPays['idP']; ?>"><img class="aimer" src="images/aime.png"></a>
    <?php } else { ?>
        <a href="./?action=favoris&idP=<?= $unPays['idP']; ?>"><img class="aimer" src="images/aimepas.png"></a>
    <?php } ?>

</h1>

<p id="principal">
    <?php if (count($lesPhotos) > 0) { ?>
        <img src="photos/<?= $lesPhotos[0]["cheminP"] ?>" />
    <?php } ?>
    <br />
</p>
<h2 id="capital">
    Capitale :
</h2>
<p>
    <?= $unPays['capital']; ?>
</p>

<h2 id="photos">
    Photos :
</h2>
<ul id="galerie">
    <?php for ($i = 0; $i < count($lesPhotos); $i++) { ?>
        <li> <img class="galerie" src="photos/<?= $lesPhotos[$i]["chemin"] ?>" /></li>
    <?php } ?>

</ul>

<h2 id="population">
    Population :
</h2>
<?= $unPays['population']; ?>

<h2 id="superficie">
    Superficie :
</h2>
<?= $unPays['superficie']; ?>