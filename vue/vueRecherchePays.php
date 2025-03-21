<h1>Recherche d'un pays</h1>
<form action="./?action=recherche&critere=<?= $critere ?>" method="POST">


    <?php
    switch ($critere) {
        case "nom":
            ?>
            Recherche par nom : <br />
            <input type="text" name="nom" placeholder="Nom" value="<?= $nom ?>" /><br />
            <?php
            break;
    }
    ?>
    <br /><br />
    <input type="submit" value="Rechercher" />

</form>