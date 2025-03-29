<?php
// Récupérez l'utilisateur actuel après la mise à jour
$util = getUtilisateurByEmail($email);

// Affichez les informations de l'utilisateur
echo "Mon adresse électronique : " . htmlspecialchars($util['email']) . "<br />";
echo "Mon pseudo : " . htmlspecialchars($util['pseudo']) . "<br />";

?>

<h1>Modifier mon profil</h1>

<!-- Affichage du message pour le pseudo -->
<?php if (!empty($messagePseudo)) { echo "<p>$messagePseudo</p>"; } ?>

<form action="./?action=updProfil" method="POST">
    <label for="pseudo">Mettre à jour mon pseudo :</label><br />
    <input type="text" name="pseudo" placeholder="Nouveau pseudo" value="<?= htmlspecialchars($util["pseudo"]) ?>" /><br />
    <input type="submit" value="Enregistrer" />
</form>

<hr>

<!-- Affichage du message pour le mot de passe -->
<?php if (!empty($messageMdp)) { echo "<p>$messageMdp</p>"; } ?>

<form action="./?action=updProfil" method="POST">
    <label for="mot_de_passe">Mettre à jour mon mot de passe :</label><br />
    <input type="password" name="mot_de_passe" placeholder="Nouveau mot de passe" /><br />
    <input type="password" name="mot_de_passe2" placeholder="Confirmer la saisie" /><br />
    <input type="submit" value="Enregistrer" />
</form>
