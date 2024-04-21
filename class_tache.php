<?php
class tache{
    private $connexion;// Connexion à la base de données
    private $nom;
    private $libelle;
    private $description;
    private $dateEcheance;
    private $priorite;
    private $etat;
    private $utilisateur_ID;

    public function __construct($connexion,$nom,$libelle,$description,$dateEcheance,$priorite, $etat, $utilisateur_ID){
        // Initialisation des propriétés de la classe avec les valeurs passées en paramètre
        $this->connexion=$connexion;
        $this->nom=$nom;
        $this->libelle=$libelle;
        $this->description=$description;
        $this->dateEcheance=$dateEcheance;
        $this->priorite=$priorite;
        $this->etat=$etat;
        $this->utilisateur_ID;
    }
    public function getnom(){
        return $this->nom; // Récupérer le nom de la tâche
    }
    // methode pour acceder a la valeur de la propriete nom
    public function setnom($new_nom){
        $this->nom=$new_nom; // Modifier le nom de la tâche

    }
    // methode pour obtenir la valeur de la propriete libelle
    public function getlibelle(){
        return $this->libelle;
    }
    // methode pour acceder a la valeur de la propriete libelle
    public function setlibelle($new_libelle){
        $this->libelle=$new_libelle;

    }
    // methode pour obetenir la valeur de la description
    public function getdescription(){
        return $this->description;
    }
    // methode pour acceder a la valeur de la propriete description
    public function setdescription($new_description){
        $this->description=$new_description;
    }
    // methode pour obetenir la valeur de la dateEcheance
    public function getdateEcheance(){
        return $this->dateEcheance;
    }
    // methode pour acceder a la valeur de la propriete dateEcheance
    public function setdateEcheance($new_dateEcheance){
        $this->dateEcheance=$new_dateEcheance;
    }
    // methode pour obetenir la valeur de la priorite
    public function getpriorite(){
        return $this->priorite;
    }
    // methode pour acceder a la valeur de la propriete priorite
    public function setpriorite($new_priorite){
        $this->priorite=$new_priorite;
    }
    // methode pour obetenir la valeur de la etat
    public function getetat(){
        return $this->etat;
    }
    // methode pour acceder a la valeur de la propriete etat
    public function setetat($new_etat){
        $this->etat=$new_etat;
    }
    public function getutilisateur_ID(){
        return $this->utilisateur_ID;
    }
    // methode pour acceder a la valeur de la propriete etat
    public function setutilisateur_ID($new_utilisateur_ID){
        $this->utilisateur_ID=$new_utilisateur_ID;
    }


    // methode pour ajouter des taches
    public function add($nom,$libelle,$description,$dateEcheance,$priorite,$etat,$utilisateur_ID){
        try{
             // Requête SQL pour ajouter une tâche
            $sql="INSERT INTO tache (nom,libelle,description,dateEcheance,priorite,etat,utilisateur_ID) VALUES(:nom, :libelle, :description, :dateEcheance, :priorite, :etat, :utilisateur_ID)";
            // preparation de la requete
            $stmt= $this->connexion->prepare($sql);
            // liaison des variables aux valeurs
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':libelle', $libelle, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':dateEcheance', $dateEcheance, PDO::PARAM_STR);
            $stmt->bindParam(':priorite', $priorite, PDO::PARAM_STR);
            $stmt->bindParam(':etat', $etat, PDO::PARAM_STR);
            $stmt->bindParam(':utilisateur_ID', $utilisateur_ID, PDO::PARAM_STR);
            // execution de la requete
            $resultat = $stmt->execute();
            if($resultat){
                // direction vera la page ajouter des taches
                header("location: read_tache.php");
            }else{
                // Affichage d'une erreur en cas d'échec
                die("Erreur: impossible d'inserer des données.");
            }
        }catch(PDOException $e){
                   // Gestion des exceptions PDO
            die("Erreur : impossible d'inserer des données " .$e->getMessage());
        }
    }
// methode pour la lecture des taches ajoutees
    public function read(){
        try{
     // Requête SQL pour lire toutes les tâches
            $sql="SELECT * FROM tache";
        // preparation de la requete
           $stmt=$this->connexion->prepare($sql);
            // execution de la requete
            $resultat=$stmt->execute();
            // recuperation des elements sous forme de tableau
            $resultat=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        } catch(PDOException $e) {
            die("Erreur: impossible d'afficher les éléments" .$e->getMessage());
        }
    }
    
    // méthode pour la suppression
public function delete($id){
    // requête pour la suppression
    $sql = "DELETE FROM tache WHERE id = :id";
    // préparation de la requête
    $stmt = $this->connexion->prepare($sql);
    // liaison de la variable id avec la valeur id
    $stmt->bindparam(':id', $id, PDO::PARAM_INT);
    // exécution de la requête
    $resultat = $stmt->execute();
    if($resultat){
        // redirection vers la page listant les tâches
        header("location: read_tache.php");
        exit(); // Terminer le script après la redirection
    } else {
        die("Erreur: impossible de supprimer les données.");
    }
}

    
    // methode pour modifier
public function update($id, $nom, $libelle, $description, $dateEcheance, $priorite, $etat, $utilisateur_ID) {
    try {
           // Requête SQL pour mettre à jour une tâche
        $sql = "UPDATE tache SET nom = :nom, libelle = :libelle, description = :description, dateEcheance = :dateEcheance, priorite = :priorite, etat = :etat, utilisateur_ID = :utilisateur_ID WHERE id = :id";
        // preparation de la requete
        $stmt = $this->connexion->prepare($sql);
        // faire la liaison des valeurs aux parametres
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':libelle', $libelle, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':dateEcheance', $dateEcheance, PDO::PARAM_STR);
        $stmt->bindParam(':priorite', $priorite, PDO::PARAM_STR);
        $stmt->bindParam(':etat', $etat, PDO::PARAM_STR);
        $stmt->bindParam(':utilisateur_ID', $utilisateur_ID, PDO::PARAM_STR); // Correction de cette ligne
        // execution de la requete
        $resultat = $stmt->execute();
        if($resultat){
            // redirection dans la liste des taches
            header("location: read_tache.php");
        } else {
            die("Erreur: impossible de modifier les éléments");
        }
    } catch(PDOException $e){
        die("Erreur: impossible de modifier les éléments" . $e->getMessage());
    }
}

// Méthode pour afficher les tache d'une tâche avec l'identifiant de l'utilisateur associé
public function afficherTache($ID)
{
    try {
        // Requête SQL pour sélectionner les détails de la tâche avec l'identifiant de l'utilisateur associé
        $sql = "SELECT * FROM tache JOIN utilisateur ON tache.ID_utilisateur = utilisateur.ID WHERE tache.ID = :ID";
        
        // Préparation de la requête SQL
        $req = $this->connexion->prepare($sql);
        
        // Liaison du paramètre de l'ID avec sa valeur
        $req->bindValue(':ID', $ID);
        
        // Exécution de la requête SQL
        $req->execute();
        
        // Récupération des résultats sous forme de tableau associatif
        $tache = $req->fetch(PDO::FETCH_ASSOC);
        
        // Retour des détails de la tâche
        return $tache;
    } catch (PDOException $erreur) {
        // Gestion des erreurs PDO
        die("Erreur !: " . $erreur->getMessage() . "<br/>");
    }
}
}

