<h1>Modifier mon profil</h1>

Mon adresse électronique : <?= $util["email"] ?> <br />
Mettre à jour mon pseudo :

<form action="./?action=updProfil" method="POST">
    <input type="text" name="pseudo" placeholder="Nouveau pseudo" /><br />
    <input type="submit" value="Enregistrer" />
    <hr>

    Mettre à jour mon mot de passe : <br />
    <?= $messageMdp ?>
    <input type="password" name="mot_de_passe" placeholder="Nouveau mot de passe" /><br />
    <input type="password" name="mot_de_passe2" placeholder="Confirmer la saisie" /><br />
    <input type="submit" value="Enregistrer" />

    <hr>

    Gerer les pays que j'aime : <br />
    <?php for ($i = 0; $i < count($mesPaysFavoris); $i++) { ?>
        <input type="checkbox" name="lstidP[]" id="pays<?= $i ?>" value="<?= $mesPaysFavoris[$i]['idR'] ?>">
        <label for="pays<?= $i ?>"><?= $mesPaysFavoris[$i]['nom'] ?></label><br />
    <?php } ?>
    <input type="submit" value="Supprimer" />

    <hr>
</form>