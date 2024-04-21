<?php
// inclure le fichier de la configuration
require_once "config.php";

// Vérifier si l'ID du membre à supprimer est présent dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'ID du membre à supprimer depuis l'URL
    $ID= $_GET['id'];
    
    // Appeler la méthode delete() pour supprimer le membre
    $resultat = $tache->delete($ID);

    // Vérifier si la suppression a réussi
    if($resultat) {
        // Rediriger vers la page index si la suppression a réussi
        header("location: read_tache.php");
        exit(); // Arrêt du script après la redirection
    } else {
        echo "La suppression a échoué. Veuillez réessayer.";
    }
} else {
    // Rediriger vers la page create_tache.php si l'ID n'est pas spécifié
    header("location: create_tache.php");
    exit(); // Arrêt du script après la redirection
}

