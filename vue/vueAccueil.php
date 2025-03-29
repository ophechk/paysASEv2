<?php
require_once __DIR__ . '/../modele/bd.photo.inc.php'; 
?>

<br/>

<div id="accroche">Découvrez les pays d'Asie du Sud-Est</div>
<h1>Quelques pays d'asie du Sud Est...</h1>

<?php
if (!empty($listePays)) {
    for ($i = 0; $i < min(5, count($listePays)); $i++) {
        // Vérification de l'ID de la photo
        $photo_id = isset($listePays[$i]['photo_idPh']) ? $listePays[$i]['photo_idPh'] : null;
        // echo "<p>ID photo reçu : $photo_id</p>"; // Debug

        // Récupération des données de la photo
        $photo = !empty($photo_id) ? getPhotoByIdPh($photo_id) : null;
        // echo "<pre>";
        // var_dump($photo); // Debug : Affiche les données de la photo
        // echo "</pre>";
        ?>
        <div class="container">
            <!-- Cartes ici -->


            <div class="card">
                <div class="photoCard" style="margin-top : 30px; margin-bottom: 20px;">
                    <?php
                    if (!empty($photo) && isset($photo['chemin'])) {
                        $chemin = 'photos/' . htmlspecialchars($photo['chemin']);
                        // echo "<p>Chemin de l'image : $chemin</p>"; // Debug
            
                        if (file_exists($chemin)) { ?>
                            <img src="/paysASEv2/<?= $chemin ?>" alt="Image du pays" />
                        <?php } else { ?>
                            <p>⚠️ Image introuvable : <?= $chemin ?></p>
                        <?php }
                    } else { ?>
                        <p>Image non disponible</p>
                    <?php } ?>
                </div>

                <div class="descrCard" style="text-align : center">
                    <?php if (isset($listePays[$i]['idP'], $listePays[$i]['nom'])) { ?>
                        <br/>
                        <a href="./?action=detail&idP=<?= $listePays[$i]['idP'] ?>">
                            <?= htmlspecialchars($listePays[$i]['nom']) ?>
                        </a>
                        <br />
                        Capitale : <?= isset($listePays[$i]['capital']) ? htmlspecialchars($listePays[$i]['capital']) : "N/A" ?>
                        <br>
                    <?php } else { ?>
                        <p>Informations indisponibles.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>Aucun pays trouvé.</p>";
}
?>