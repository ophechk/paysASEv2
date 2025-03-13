
<h1>Modifier mon profil</h1>

Mon adresse électronique : <?= $util["email"] ?> <br />
Mettre à jour mon pseudo : 
<form action="./?action=updProfil" method="POST">
    <input type="text" name="pseudo" placeholder="Nouveau pseudo" /><br />
    <input type="submit" value="Enregistrer" />
    <hr>
    Mettre à jour mon mot de passe : <br />
    <?= $messageMdp ?>
    <input type="password" name="password" placeholder="Nouveau mot de passe" /><br />
    <input type="password" name="password2" placeholder="Confirmer la saisie" /><br />
    <input type="submit" value="Enregistrer" />
    
    <hr>

    Gerer les pays favoris : <br />
    <?php for ($i = 0; $i < count($mespaysFavoris); $i++) { ?>
        <input type="checkbox" name="lstidP[]" id="pays<?= $i ?>" value="<?= $mespaysFavoris[$i]['id'] ?>" >
        <label for="pays<?= $i ?>"><?= $mespaysFavoris[$i]['nom'] ?></label><br />
    <?php } ?>
    <input type="submit" value="Supprimer" />
    
    <hr>
    
</form>


