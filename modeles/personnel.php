<?php

require_once "./include/config.php";

class modele_personnel {
    public $id; 
    public $nom; 
    public $duree_min;
    public $origine;
    public $id_categorie;
 

    /***
     * Fonction permettant de construire un objet de type modele_films
     */
    public function __construct($id, $nom, $duree_min, $origine, $nom_categorie) {
        $this->id = $id;
        $this->nom = $nom;
        $this->duree_min = $duree_min;
        $this->origine = $origine;
        $this->nom_categorie = $nom_categorie;

    }

    /***
     * Fonction permettant de se connecter à la base de données
     */
    static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

       
        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;   
            exit();
        } 

        return $mysqli;
    }

    /** Fonction pour avoir tous les films */
    public static function obtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT films.id as id, nom, duree_min, origine, nom_categorie FROM films INNER JOIN categories_films on categories_films.id = films.id_categorie  ORDER BY nom");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_personnel($enregistrement['id'], $enregistrement['nom'], $enregistrement['duree_min'], $enregistrement['origine'], $enregistrement['nom_categorie']);
        }

        return $liste;
    }


    /*Fonction d'avoir un film par son identifiant */
    public static function obtenirUn($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM films WHERE id=?")) {  
            $requete->bind_param("i", $id); 

            $requete->execute(); 

            $result = $requete->get_result(); 
            
            if($enregistrement = $result->fetch_assoc()) { 
                $personnel = new modele_personnel($enregistrement['id'], $enregistrement['nom'], $enregistrement['duree_min'], $enregistrement['origine'], $enregistrement['id_categorie']);
            } else {
               
                return null;
            }   
            
            $requete->close(); 
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";   
            echo $mysqli->error;
            return null;
        }

        return $personnel;
    }



    public static function ajouter($nom, $duree_min, $origine, $id_categorie) {
        $message = '';

        $mysqli = self::connecter();
        
    
        if ($requete = $mysqli->prepare("INSERT INTO films (nom, duree_min, origine, id_categorie) VALUES (?, ?, ?, ?)")) {      

      

        $requete->bind_param("sisi",$nom, $duree_min, $origine, $id_categorie);

        if($requete->execute()) { 
            $message = "Film ajouté";  
        } else {
            $message =  "Une erreur est survenue lors de l'ajout: " . $requete->error; 
        }

        $requete->close(); 

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";   
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }




    public static function modifier($id,$nom, $duree_min, $origine, $id_categorie) {
        $message = '';

        $mysqli = self::connecter();
        
    
        if ($requete = $mysqli->prepare("UPDATE films SET nom=?, duree_min=?, origine=?, id_categorie=? WHERE id=?")) {      

      

        $requete->bind_param("sisii",$nom, $duree_min, $origine, $id_categorie, $id);

        if($requete->execute()) { 
            $message = "Film modifié";  
        } else {
            $message =  "Une erreur est survenue lors de la modification: " . $requete->error; 
        }

        $requete->close(); 

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";   
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

    public static function supprimer($id) {
        $message = '';

        $mysqli = self::connecter();
     
        if ($requete = $mysqli->prepare("DELETE FROM films WHERE id=?")) {      



        $requete->bind_param("i", $id);

        if($requete->execute()) { 
            $message = "Film supprimé";  
        } else {
            $message =  "Une erreur est survenue lors de la suppression: " . $requete->error;  
        }

        $requete->close(); 

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }
}