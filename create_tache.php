<?php
// inclusion du fichier config
include_once "config.php";

// verification de la soumission du formulaire
if(isset($_POST['ajouter'])){
    // recuperation des valeurs soumises
    $nom = $_POST['nom'];
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $dateEcheance = $_POST['dateEcheance'];
    $priorite = $_POST['priorite'];
    $etat = $_POST['etat'];
    $utilisateur_ID = $_POST['utilisateur_ID'];
    

    // verifier si les champs ne sont pas vide
    if($nom !="" && $libelle !="" && $description !="" && $dateEcheance !="" && $priorite !="" && $etat !=""){
        // creation d'un objet pour l'insertion des taches
        $tache->add($nom,$libelle,$description,$dateEcheance,$priorite,$etat,$utilisateur_ID);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css">
    <link rel="stylesheet" href="style_create_tache.css">
    <title>Gestion des tâches</title>
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
    <h1>Ajouter une tâche</h1>
    <form action="" method="post">
    <fieldset>
        <div class="remplir">
            <label for="nom">Nom de la tâche</label>
            <input type="text" name="nom" placeholder="Donnez le nom de la tâche">
        </div>
        <div class="remplir">
            <label for="libelle">Libellé de la tâche</label>
            <input type="text" name="libelle" placeholder="Donnez le libellé de la tâche">
        </div>
        <div class="remplir">
            <label for="description">Description de la tâche</label>
            <textarea name="description" id="description" cols="55" rows="5" placeholder="Donnez la description de la tâche"></textarea>
        </div>
        <div class="remplir">
            <label for="dateEcheance">Date d'échéance de la tâche</label>
            <input type="date" name="dateEcheance">
        </div>
        <div class="remplir">
            <label for="priorite">Priorité de la tâche</label>
            <select name="priorite" id="priorite">
                <option value="faible">Faible</option>
                <option value="moyenne">Moyenne</option>
                <option value="élevée">Élevée</option>
            </select>
        </div>
        <div class="remplir">
            <label for="etat">État de la tâche</label>
            <select name="etat" id="etat">
                <option value="à faire">À terminer</option>
                <option value="terminée">Terminée</option>
                <option value="en cours">En cours</option>
            </select>
        </div>
        <input type="submit" value="Ajouter" name="ajouter" id="bouton">
    </fieldset>
</form>

</fieldset>
<footer>
        <p>&copy; 2024 Votre entreprise - Tous droits réservés</p>
    </footer>
</body>
</html>