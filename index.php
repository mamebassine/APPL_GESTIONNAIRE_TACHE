<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css">
    <title>Gestion des tâches</title>
    <style>

body { 
    box-shadow: 10 110 90px rgba(0, 0, 0, 0.1); /* Ombre légère autour du formulaire */
    font-family: Arial, sans-serif;
    font-size: 25px; /* Augmente la taille de la police à 20 pixels */
    background-image: url('image/photo1.png');
    background-size: 60%; /* Vous pouvez ajuster cette valeur selon le niveau de zoom souhaité */
    background-position: center;
    color: #0e0b0b;
    
}
    </style>
</head>
<body>
    <!-- En-tête de la page -->
    <header>
        <!-- Logo de l'application -->
        <div class="logo">
            <img src="image/logo.png" alt="Logo de l'application">
        </div>
        <!-- Navigation -->
        <nav>
            <a href="index.php">Accueil</a>
           <a href="read_tache.php">Liste des tâches</a> 
           <a href="connection.php">Deconnecter</a>
        </nav>
        
    </header> 
    <!-- Titre principal -->
    <h1 class="goolee" >Bienvenue sur votre application FERLO GOOLEE</h1>
    <!-- Pied de page -->
    <!-- Boutons -->
    <div class="buttons">
            <!-- Bouton pour se connecter -->
            <button onclick="window.location.href='connection.php'">Se connecter</button>
            <!-- Bouton pour créer un compte -->
            <button onclick="window.location.href='create_utilisateur.php'">Créer un compte</button>
        </div>
    <footer>
        <p>&copy; 2024 Votre entreprise - Tous droits réservés</p>
    </footer>
</body>
</html>
