<?php
include_once "class_tache.php";
include_once "class_utilisateur.php";
// création des constantes pour les informations de la base de données
define("DB_SERVER", "localhost");
define("USER_NAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "application_gestion_tachepdo");

// connexion avec la base de données
try {
    $connexion = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, USER_NAME, DB_PASSWORD);
    // Configuration de PDO pour afficher les erreurs SQL
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tache=new tache($connexion,"nom", "libelle","description","dateEcheance","priorite","etat", "utilisateur_ID");
    $utilisateur=new utilisateur($connexion, "nom", "prenom", "fonction", "sexe", "adresse", "email", "mot_passe", "telephone", "mot_passe");

    
} 
// affichage d'un message en cas d'erreur
catch (PDOException $e) {
    die("Erreur :: Impossible de se connecter à la base de données : " . $e->getMessage());
}

