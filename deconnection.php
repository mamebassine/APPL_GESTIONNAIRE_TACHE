<?php
// Démarrer la session PHP
session_start();

// Détruire toutes les données de la session
session_destroy();

// Rediriger vers la page de connexion
header('Location: connection.php');

// Arrêter l'exécution du script
exit();

