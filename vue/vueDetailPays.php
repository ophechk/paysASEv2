
<h1><?= $unPays['nom']; ?></h1>

<section>
    Capitale <br />
    <ul id="capital">		
        <?php for ($j = 0; $j < count($capital); $j++) { ?>
            <li class="tag"><span class="tag">#</span><?= $capital[$j]["capital"] ?></li>
        <?php } ?>
    </ul>

</section>

<h2 id="info">
    Informations
</h2>
<p>
    <?= $unPays['capital']; ?>
    <?= $unPays['superficie']; ?><br />
    <?= $unPays['population']; ?>
    <?= $unPays['langue_officielle']; ?>

</p>

<h2 id="photos">
    Photos
</h2>
<ul id="galerie">
    <?php for ($i = 0; $i < count($lesPhotos); $i++) { ?>
        <li> <img class="galerie" src="photos/<?= $lesPhotos[$i]["chemin"] ?>" alt="" /></li>
    <?php } ?>

</ul>
