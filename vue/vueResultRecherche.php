<h1>Liste des pays</h1>

<?php
require_once __DIR__ . '/../modele/bd.pays.inc.php';
require_once __DIR__ . '/../modele/bd.photo.inc.php';


// Affichage des pays
if (!empty($listePays)) {
    foreach ($listePays as $pays) {
        // Récupération de la photo du pays
        $photo = isset($pays['photo_idPh']) ? getPhotoByIdPh($pays['photo_idPh']) : null;
        ?>

        <div class="card">
            <div class="photoCard">
                <?php if (!empty($photo) && isset($photo['chemin'])) {
                    $chemin = 'photos/' . htmlspecialchars($photo['chemin']);
                    if (file_exists($chemin)) { ?>
                        <img src="/paysASEv2/<?= $chemin ?>" alt="Image de <?= htmlspecialchars($pays['nom']) ?>" />
                    <?php } else { ?>
                        <p>⚠️ Image introuvable</p>
                    <?php }
                } else { ?>
                    <p>Image non disponible</p>
                <?php } ?>
            </div>

            <div class="descrCard" style="margin-top: 30px; text-align: center;">
                <a href="./?action=detail&idP=<?= $pays['idP'] ?>">
                    <?= htmlspecialchars($pays['nom']) ?>
                </a>
                <br />
                <?= htmlspecialchars($pays["capital"]) ?>
            </div>
        </div>

        <?php
    }
} else {
    echo "<p>Aucun pays trouvé.</p>";
}
?>