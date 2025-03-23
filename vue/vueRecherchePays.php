<h1>Recherche d'un pays</h1>
<form action="./?action=recherche&critere=<?= $critere ?>" method="POST">


    <?php

    switch ($critere) {
        case "nom":
            ?>
            Recherche par nom : <br />
            <input type="text" name="nom" placeholder="nom" value="<?= $nom ?>" /><br />
            <?php
            break;
        case "capital":
            ?>
           Recherche par capitale : <br />
            <input type="text" name="capital" placeholder="capitale" value="<?= $capital ?>" /><br />
            <?php
            break;
    }
    ?>
    <br /><br />
    <input type="submit" value="Rechercher" />

</form>