<?php
require_once "class_tache.php";
require_once "class_utilisateur.php";
require_once "config.php";

// Vérifier si la méthode de requête est POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $email = $_POST['email'] ?? '';
    $mot_passe = $_POST['mot_passe'] ?? '';

    // Connexion à la base de données
    $connexion = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, USER_NAME, DB_PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour vérifier les informations de connexion
    $query = "SELECT * FROM utilisateur WHERE email = :email AND mot_passe = :mot_passe";

    // Préparer la requête SQL
    $stmt = $connexion->prepare($query);

    // Binder les valeurs aux paramètres de la requête
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mot_passe', $mot_passe);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer l'utilisateur (s'il existe)
    $user = $stmt->fetch();

    // Si l'utilisateur existe
    if ($user) {
        // Redirection vers la page de création de tâche après la connexion réussie
        header('Location: create_tache.php');
        exit(); // Arrêter l'exécution du script
    } else {
        // Sinon, rediriger vers la page de connexion avec un message d'erreur
        header('Location: connection.php?error=1');
        exit(); // Arrêter l'exécution du script
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion et Ajout de Tâche</title>
    <style>
        /* Ajoutez vos styles CSS ici */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        form {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #666666;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="password"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #666666;
            border-radius: 5px;
        }
        button {
            background-color: #1791c8;
            color: #fff;
            cursor: pointer;
        }
        button:hover {
            background-color: #d9d9d9;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Connexion</h2>
        <?php if(isset($_GET['error']) && $_GET['error'] == 1): ?>
            <p style="color: red;">Email ou mot de passe incorrect.</p>
        <?php endif; ?>
        <label for="email">Email:</label>
        <input type="text" name="email" required>
        <label for="mot_passe">Mot de passe:</label>
        <input type="password" name="mot_passe" required>
        <button type="submit">Se Connecter</button>
    </form>
</body>
</html>
