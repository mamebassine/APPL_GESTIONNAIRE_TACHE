<?php
// inclusion du fichier config
require_once "config.php";

// vérification de la soumission du formulaire
if(isset($_POST['ajouter'])){
    // récupération des valeurs soumises
    $ID = $_POST['ID'];
    $nom = $_POST['nom'];
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $dateEcheance = $_POST['dateEcheance'];
    $priorite = $_POST['priorite'];
    $etat = $_POST['etat'];
    $utilisateur_ID = $_POST['utilisateur_ID']; // Correction de la variable

    // appel de la méthode update
    $tache->update($ID,$nom,$libelle,$description,$dateEcheance,$priorite,$etat,$utilisateur_ID); // Correction de la variable

    // Rediriger vers la page index
    header("location: read_tache.php");
    exit(); // Terminer le script après la redirection
}

// Récupérer les données de la tâche à modifier
$ID = $_GET['id'];
if(isset($ID)){
    try{
        // requete sql pour selectionner la tâche
        $sql = "SELECT * FROM tache WHERE ID = :ID";
        $stmt=$connexion->prepare($sql);
        $stmt->bindparam(':ID', $ID, PDO::PARAM_INT);
        if($stmt->execute()){
            // récupération des tâches
            $tache = $stmt->fetch(PDO::FETCH_ASSOC);
            $ID = $tache['ID']; 
            $nom = $tache['nom'];
            $libelle = $tache['libelle'];
            $description = $tache['description'];
            $dateEcheance = $tache['dateEcheance']; // Correction du nom de la variable
            $priorite = $tache['priorite'];
            $etat = $tache['etat'];
            $utilisateur_ID = $tache['utilisateur_ID']; // Correction de la variable
        }else {
            echo "Erreur lors de la récupération des données.";
        }

    }catch(PDOException $e){
        die("Erreur : " . $e->getMessage());

    }
}else {
    echo "ID non spécifié.";
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
        <!-- Navigation -->
        <nav>
            <a href="index.php">Accueil</a>
           <a href="read_tache.php">Liste des tâches</a> 
           <a href="connection.php">Deconnecter</a>
        </nav>
    </header> 
    <h1>MODIFIER UNE TACHE</h1>
    <form action="" method="post">
        <fieldset>
            <div class="remplir">
                <label for="ID">Modifier l'identifiant</label>
                <input type="text" name="ID" value="<?php echo $ID ?>">
            </div>
            <div class="remplir">
                <label for="nom">Modifier le nom de la tâche</label>
                <input type="text" name="nom" value="<?php echo $nom ?>">
            </div>
            <div class="remplir">
                <label for="libelle">Modifier le libellé de la tâche</label>
                <input type="text" name="libelle" value="<?php echo $libelle ?>">
            </div>
            <div class="remplir">
                <label for="description">Modifier la description de la tâche</label>
                <input type="text" name="description" value="<?php echo $description ?>">
            </div>
            <div class="remplir">
                <label for="dateEcheance">Modifier la date d'échéance de la tâche</label>
                <input type="date" name="dateEcheance" value="<?php echo $dateEcheance ?>">
            </div>
            <div class="remplir">
                <label for="priorite">Modifier la priorité de la tâche</label>
                <select name="priorite" id="priorite">
                    <option value="faible" <?php if($priorite == 'faible') echo 'selected'; ?>>faible</option> 
                    <option value="moyenne" <?php if($priorite == 'moyenne') echo 'selected'; ?>>moyenne</option>
                    <option value="élevée'" <?php if($priorite == 'élevée') echo 'selected'; ?>>élevée</option>
                </select>
            </div>
            <div class="remplir">
                <label for="etat">Modifier l'état de la tâche</label>
                <select name="etat" id="etat">
                    <option value="à faire" <?php if($etat == 'à faire') echo 'selected'; ?>>à faire</option> 
                    <option value="en cours" <?php if($etat == 'en cours') echo 'selected'; ?>>en cours</option>
                    <option value="terminée" <?php if($etat == 'terminée') echo 'selected'; ?>>terminée</option> 
                </select>
            </div>
            <input type="submit" value="Modifier" name="ajouter" id="bouton">
        </fieldset> 
    </form>
    <footer>
        <p>&copy; 2024 Votre entreprise - Tous droits réservés</p>
    </footer>
</body>
</html>
