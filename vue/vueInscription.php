<h1>Inscription</h1>
<span id="alerte"><?= $msg ?></span>
<form action="./?action=inscription" method="POST">

    <input type="text" name="email" placeholder="Email de connexion"/><br />
    <input type="password" name="mot_de_passe" placeholder="Mot de passe"/><br />
    <input type="text" name="pseudo" placeholder="Pseudo" /><br />

    <input type="submit" value="S'inscrire"/>

</form>
