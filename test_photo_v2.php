<?php
// Fichier: test_photo.php
// Inclure le fichier bd.inc.php qui contient la fonction connexionPDO
include_once "./modele/bd.inc.php";
// Inclure le fichier contenant la fonction à tester
include_once "./modele/bd.photo.inc.php";
/**
 * Fonction simple pour tester getPhotoByIdPh
 */
function testGetPhotoByIdPh() {
    echo "=== Test de getPhotoByIdPh ===\n";
   
    // Test avec un ID existant
    echo "Test avec ID=1 : \n";
    $resultat = getPhotoByIdPh(1);
   
    if (is_array($resultat) && isset($resultat['idPh']) && $resultat['idPh'] == 1) {
        echo "✓ SUCCÈS : La photo avec ID=1 a été trouvée.\n";
        echo "Données récupérées : \n";
        print_r($resultat);
    } else {
        echo "✗ ÉCHEC : La photo avec ID=1 n'a pas été trouvée ou est incorrecte.\n";
    }
   
    // Test avec un ID inexistant
    echo "\nTest avec ID inexistant (999) : \n";
    $resultat = getPhotoByIdPh(999);
   
    if ($resultat === false || empty($resultat)) {
        echo "✓ SUCCÈS : Aucune photo trouvée pour ID=999, comme attendu.\n";
    } else {
        echo "✗ ÉCHEC : Une photo a été trouvée pour ID=999, ce qui n'était pas attendu.\n";
        print_r($resultat);
    }
   
    echo "\n=== Fin du test ===\n";
}
// Exécution du test
testGetPhotoByIdPh();
?>