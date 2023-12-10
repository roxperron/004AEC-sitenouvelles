<?php 
require_once "./include/config.php";


class modele_categories {
    public $id; 
    public $categorie; 





   /*Fonctionpour construire l'objet de type modele_nouvelles_acceuil*/
    public function __construct($id, $categorie) {
        $this->id = $id;
        $this->categorie = $categorie;

    }

   /*Fonction pour se connecter à la base de données*/
      static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;   
            exit();
        } 

        return $mysqli;
    }

    /*Fonction pour récupérer toutes les catgories*/ 
    public static function obtenirToutesCategories() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM categories");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_categories($enregistrement['id'], $enregistrement['categorie']);
        }

        return $liste;
    }

   /* Fonction permettant de récuperer le nom de la catégorie */ 
   public static function obtenirUneCategorie($id) {
    $mysqli = self::connecter();


    if ($requete = $mysqli->prepare("SELECT * FROM categories WHERE id=?")) { 
        $requete->bind_param("i", $id); 

        $requete->execute(); 

        $result = $requete->get_result(); 
        
        if($enregistrement = $result->fetch_assoc()) { 
            $categorie = new modele_categories($enregistrement['id'], $enregistrement['categorie']);
        } else {
           
            return null;
        }   
        
        $requete->close(); 
    } else {
        echo "Une erreur a été détectée dans la requête utilisée : ";   
        echo $mysqli->error;
        return null;
    }

    return $categorie;
}




}


?>