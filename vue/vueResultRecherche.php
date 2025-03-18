<h1>Liste des pays</h1>

<?php
for ($i = 0; $i < count($listePays); $i++) {
    // Initialisation correcte de $idPh
    $idPh = $listePays[$i]['idP']; // Assurez-vous que cette colonne existe bien dans $listePays

    // Appel à la fonction pour récupérer les photos associées
    $lesPhotos = getPhotoByIdPh($idPh);

    // Par défaut, si aucune photo n'est trouvée, on initialise un tableau vide
    if (!$lesPhotos) {
        $lesPhotos = [];
    }
    ?>
    <div class="card">
        <div class="photoCard">
            <?php if (count($lesPhotos) > 0) { ?>
                <img src="photos/<?= htmlspecialchars($lesPhotos[0]["cheminP"]) ?>" />
            <?php } else { ?>
                <p>Aucune photo disponible</p>
            <?php } ?>
        </div>
        <div class="descrCard">
            <?php echo "<a href='./?action=detail&idP=" . htmlspecialchars($listePays[$i]['idP']) . "'>" . htmlspecialchars($listePays[$i]['nom']) . "</a>"; ?>
            <br />
        </div>
    </div>
<?php
}
?>
