<?php
// Inclusion du fichier de configuration
include_once "config.php";

// Vérification si la requête est de type POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $adresse = $_POST["adresse"];
    $sexe = $_POST["sexe"];
    $fonction = $_POST["fonction"];
    $mot_passe = $_POST["mot_passe"];

    // Création d'un nouvel objet utilisateur avec les données récupérées
    $utilisateur = new utilisateur($connexion, null, $nom, $prenom, $email, $telephone, $adresse, $sexe, $fonction, $mot_passe);
    // Appel de la méthode pour ajouter l'utilisateur à la base de données
    $result = $utilisateur->ajouterUtilisateur();

    // Vérification si l'ajout de l'utilisateur a réussi
    if ($result) {
        // Redirection vers la page de création de tâche après l'ajout de l'utilisateur
        header("Location: create_tache.php");
        exit();
    } else {
        // Message d'erreur en cas d'échec d'ajout de l'utilisateur
        $erreur_message = "Erreur lors de l'ajout de l'utilisateur.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
    <link rel="stylesheet" href="style_index.css">
    <link rel="stylesheet" href="style_utilisateur.css">
   
</head>
<body>
    <header>
        <div class="logo">
            <img src="image/logo.png" alt="Logo de l'application">
        </div>
        <nav>
            <a href="index.php">Accueil</a>
           <a href="read_tache.php">Liste des tâches</a> 
           <a href="connection.php">Deconnecter</a>
        </nav>
    </header> 
    <h1>Ajouter un utilisateur</h1>
    <!-- Formulaire pour ajouter un utilisateur -->
<form action="" method="POST">
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom"><br>
    
    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="prenom"><br>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br>
    
    <label for="telephone">Téléphone:</label>
    <input type="text" id="telephone" name="telephone"><br>
    
    <label for="adresse">Adresse:</label>
    <input type="text" id="adresse" name="adresse"><br>
    
    <label for="sexe">Sexe:</label>
    <select id="sexe" name="sexe">
        <option value="M">Masculin</option>
        <option value="F">Féminin</option>
    </select><br>
    
    <label for="fonction">Fonction:</label>
    <input type="text" id="fonction" name="fonction"><br>
    
    <label for="mot_passe">Mot de passe:</label>
    <input type="password" id="mot_passe" name="mot_passe"><br>
    
    <input type="submit" value="Ajouter">
</form>
<footer>
        <p>&copy; 2024 Votre entreprise - Tous droits réservés</p>
    </footer>
</body>
</html>
