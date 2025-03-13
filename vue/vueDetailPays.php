
<h1><?= $unResto['nomR']; ?>

    <?php if ($aimer != false) { ?>
        <a href="./?action=aimer&idR=<?= $unResto['idR']; ?>" ><img class="aimer" src="images/aime.png" alt="j'aime ce restaurant"></a>
    <?php } else { ?>
        <a href="./?action=aimer&idR=<?= $unResto['idR']; ?>" ><img class="aimer" src="images/aimepas.png" alt="je n'aime pas encore ce restaurant"></a>
    <?php } ?>

</h1>

<section>
    Capitale <br />
    <ul id="capitalPays">		
        <?php for ($j = 0; $j < count($capital); $j++) { ?>
            <li class="tag"><span class="tag">#</span><?= $capital[$j]["capital"] ?></li>
        <?php } ?>
    </ul>

</section>

<h2 id="info">
    Information
</h2>
<p>
    <?= $unPays['capital']; ?>
    <?= $unPays['superficie']; ?><br />
    <?= $unResto['population']; ?>
    <?= $unResto['langue_officielle']; ?>

</p>

<h2 id="photos">
    Photos
</h2>
<ul id="galerie">
    <?php for ($i = 0; $i < count($lesPhotos); $i++) { ?>
        <li> <img class="galerie" src="photos/<?= $lesPhotos[$i]["cheminP"] ?>" alt="" /></li>
    <?php } ?>

</ul>


<?php
if ($mailU) {
    ?>
    <form action="./?action=commenter&idR=<?= $unResto['idR']; ?>" method="POST">
        <textarea id="commentaireForm" name="commentaire"><?= $monCommentaire ?></textarea><br />
        <input type="submit" value="Enregistrer le commentaire" />
    </form>

    <?php
}
?>