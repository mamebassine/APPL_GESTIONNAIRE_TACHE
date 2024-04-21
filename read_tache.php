<?php
// inclure le fichier de configuration
require_once "config.php";
// Récupérer les données des taches depuis la base de données
$resultat = $tache->read();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css">
    <link rel="stylesheet" href="style_read_tache.css">
    <title>Gestion des tâches</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="image/logo.png" alt="Logo de l'application">
        </div>
        <nav>
            <!-- Liens de navigation -->
            <a href="index.php">Accueil</a>
           <a href="read_tache.php">Liste des tâches</a> 
           <a href="connection.php">Deconnecter</a>
        </nav>
    </header> 
<h1>LISTE DES TACHES</h1>
<table>
<thead>
        <!-- Entête du tableau -->
        <tr>
            <th scope="col">ID</th>
            <th scope="col">LIBELLE</th>
            <th scope="col">DESCRIPTION</th>
            <th scope="col">DATE D'ECEANCE</th>
            <th scope="col">PRIORITE</th>
            <th scope="col">ETAT</th>
            <th scope="col">UTILISATEUR_ID</th>
            <th scope="col">NOM</th>
            <th scope="col">MODIFIER</th>
            <th scope="col">SUPPRIMER</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($resultat as $tache) { ?>
            <!-- Affichage des données dans les lignes du tableau -->
            <tr class="trow">
                <!-- Affichage des valeurs de chaque colonne -->
                <td><?php echo $tache['ID']; ?></td>
                <td><?php echo $tache['libelle']; ?></td>
                <td><?php echo $tache['description']; ?></td>
                <td><?php echo $tache['dateEcheance']; ?></td>
                <td><?php echo $tache['priorite']; ?></td>
                <td><?php echo $tache['etat']; ?></td>
                <td><?php echo $tache['utilisateur_ID']; ?></td>
                <td><?php echo $tache['nom']; ?></td>
                <!-- Bouton pour éditer les données avec un lien vers update_tache.php -->
                <td><a href="update_tache.php?id=<?php echo $tache['ID']; ?>">Modifier</a></td>
                <!-- Bouton pour supprimer les données avec un lien vers delete_tache.php -->
                <td><a href="delete_tache.php?id=<?php echo $tache['ID']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<footer>
        <p>&copy; 2024 Votre entreprise - Tous droits réservés</p>
    </footer>
</body>
</html>