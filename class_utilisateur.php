<?php

class Utilisateur {
    // Propriétés privées représentant les attributs de l'utilisateur
    private $connexion; // Connexion à la base de données
    private $id; // Identifiant de l'utilisateur
    private $nom; // Nom de l'utilisateur
    private $prenom; // Prénom de l'utilisateur
    private $email; // Adresse e-mail de l'utilisateur
    private $telephone; // Numéro de téléphone de l'utilisateur
    private $adresse; // Adresse de l'utilisateur
    private $sexe; // Sexe de l'utilisateur (ENUM('M', 'F'))
    private $fonction; // Fonction de l'utilisateur
    private $mot_passe; // Mot de passe de l'utilisateur

    // Constructeur de la classe pour initialiser les propriétés de l'objet
    public function __construct($connexion, $id, $nom, $prenom, $email, $telephone, $adresse, $sexe, $fonction, $mot_passe) {
        $this->connexion = $connexion;
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->adresse = $adresse;
        $this->sexe = $sexe;
        $this->fonction = $fonction;
        $this->mot_passe = $mot_passe;
    }

    // Méthodes getters pour accéder aux propriétés de l'utilisateur
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getSexe() {
        return $this->sexe;
    }

    public function getFonction() {
        return $this->fonction;
    }

    public function getMotPasse() {
        return $this->mot_passe;
    }

    // Méthodes setters pour modifier les propriétés de l'utilisateur
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setSexe($sexe) {
        $this->sexe = $sexe;
    }

    public function setFonction($fonction) {
        $this->fonction = $fonction;
    }

    public function setMotPasse($mot_passe) {
        $this->mot_passe = $mot_passe;
    }

    // Autres méthodes pour interagir avec la base de données (ajout, lecture, mise à jour, suppression) peuvent être ajoutées ici
// Méthode pour ajouter un utilisateur à la base de données
public function ajouterUtilisateur() {
    try {
        // Requête SQL pour insérer un nouvel utilisateur
        $sql = "INSERT INTO utilisateur (nom, prenom, email, telephone, adresse, sexe, fonction, mot_passe) VALUES (:nom, :prenom, :email, :telephone, :adresse, :sexe, :fonction, :mot_passe)";
        // Préparation de la requête
        $stmt = $this->connexion->prepare($sql);
        // Liaison des valeurs aux paramètres de la requête
        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':prenom', $this->prenom);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telephone', $this->telephone);
        $stmt->bindParam(':adresse', $this->adresse);
        $stmt->bindParam(':sexe', $this->sexe);
        $stmt->bindParam(':fonction', $this->fonction);
        $stmt->bindParam(':mot_passe', $this->mot_passe);
        // Exécution de la requête
        $stmt->execute();
        return true; // Retourne true si l'ajout est réussi
    } catch (PDOException $e) {
        // En cas d'erreur, afficher un message d'erreur et retourner false
        echo "Erreur: " . $e->getMessage();
        return false;
    }
}

// Méthode pour récupérer tous les utilisateur de la base de données
public static function recupererUtilisateur($connexion) {
    try {
        // Requête SQL pour récupérer tous les utilisateur
        $sql = "SELECT * FROM utilisateur";
        // Préparation de la requête
        $stmt = $connexion->prepare($sql);
        // Exécution de la requête
        $stmt->execute();
        // Récupération des résultats sous forme de tableau associatif
        $utilisateur = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $utilisateur; // Retourne les utilisateur
    } catch (PDOException $e) {
        // En cas d'erreur, afficher un message d'erreur et retourner un tableau vide
        echo "Erreur: " . $e->getMessage();
        return [];
    }
}

// Méthode pour mettre à jour les informations d'un utilisateur dans la base de données
public function mettreAJourUtilisateur() {
    try {
        // Requête SQL pour mettre à jour un utilisateur
        $sql = "UPDATE utilisateur SET nom=:nom, prenom=:prenom, email=:email, telephone=:telephone, adresse=:adresse, sexe=:sexe, fonction=:fonction, mot_passe=:mot_passe WHERE id=:id";
        // Préparation de la requête
        $stmt = $this->connexion->prepare($sql);
        // Liaison des valeurs aux paramètres de la requête
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nom', $this->nom);
        $stmt->bindParam(':prenom', $this->prenom);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telephone', $this->telephone);
        $stmt->bindParam(':adresse', $this->adresse);
        $stmt->bindParam(':sexe', $this->sexe);
        $stmt->bindParam(':fonction', $this->fonction);
        $stmt->bindParam(':mot_passe', $this->mot_passe);
        // Exécution de la requête
        $stmt->execute();
        return true; // Retourne true si la mise à jour est réussie
    } catch (PDOException $e) {
        // En cas d'erreur, afficher un message d'erreur et retourner false
        echo "Erreur: " . $e->getMessage();
        return false;
    }
}

// Méthode pour supprimer un utilisateur de la base de données
public function supprimerUtilisateur() {
    try {
        // Requête SQL pour supprimer un utilisateur
        $sql = "DELETE FROM utilisateur WHERE id=:id";
        // Préparation de la requête
        $stmt = $this->connexion->prepare($sql);
        // Liaison de la valeur de l'identifiant à supprimer au paramètre de la requête
        $stmt->bindParam(':id', $this->id);
        // Exécution de la requête
        $stmt->execute();
        return true; // Retourne true si la suppression est réussie
    } catch (PDOException $e) {
        // En cas d'erreur, afficher un message d'erreur et retourner false
        echo "Erreur: " . $e->getMessage();
        return false;
    }
}
}





