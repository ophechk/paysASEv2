<h1>Liste des pays</h1>

<?php
for ($i = 0; $i < count($listePays); $i++) {
    try {
        $lesPhotos = getPhotosByIdP($listePays[$i]['idP']) ?: [];
    } catch (Exception $e) {
        $lesPhotos = [];
        error_log("Erreur lors de la récupération des photos pour idP " . $listePays[$i]['idP'] . ": " . $e->getMessage());
    }
    ?>
    <div class="card">
        <div class="photoCard">
            <?php if (count($lesPhotos) > 0 && isset($lesPhotos[0]['chemin'])) { ?>
                <img src="photos/<?= htmlspecialchars($lesPhotos[0]['chemin']) ?>"/>
            <?php } else { ?>
                <img src="photos/cambodge.jpg" width="400px" />
            <?php } ?>
        </div>
    </div>
<?php
}
?>
