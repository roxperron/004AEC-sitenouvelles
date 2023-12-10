<?php 
require_once "./include/config.php";


class modele_nouvelles{
    public $id; 
    public $titre; 
    public $description_courte;
    public $description_longue;
    public $date_nouelle;
    public $actif;
    public $fk_categorie;





   /*Fonctionpour construire l'objet de type modele_nouvelles*/
    public  function __construct($id, $titre, $description_courte, $description_longue, $date_nouvelle, $actif, $fk_categorie) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description_courte = $description_courte;
        $this->description_longue = $description_longue;
        $this->date_nouvelle = $date_nouvelle;
        $this->actif = $actif;
        $this->fk_categorie = $fk_categorie;
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

    /*Fonction pour récupérer toutes les nouvelles actives*/ 
    public static function obtenirToutesActives() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, titre, description_courte, description_longue, date_nouvelle, actif, fk_categorie FROM nouvelles WHERE actif=1 ORDER BY date_nouvelle");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_nouvelles($enregistrement['id'], $enregistrement['titre'], $enregistrement['description_courte'], $enregistrement['description_longue'], $enregistrement['date_nouvelle'], $enregistrement['actif'], $enregistrement['fk_categorie']);
        }

        return $liste;
    }

   /*Fonction pour obtenir les 3 nouvelles actives plus récentes */ 

   public static function obtenirTop3Actives() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT * FROM nouvelles WHERE actif=1 ORDER BY date_nouvelle LIMIT 3");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new modele_nouvelles($enregistrement['id'], $enregistrement['titre'], $enregistrement['description_courte'], $enregistrement['description_longue'], $enregistrement['date_nouvelle'], $enregistrement['actif'], $enregistrement['fk_categorie']);
        }

        return $liste;
    }


      /* Fonction permettant de récupérer une nouvelle par son id*/
    public static function obtenirUneNouvelle($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM nouvelles WHERE id=?")) { 
            $requete->bind_param("s", $id); 

            $requete->execute(); 

            $result = $requete->get_result(); 
            
            if($enregistrement = $result->fetch_assoc()) { 
                $nouvelles = new modele_nouvelles($enregistrement['id'], $enregistrement['titre'], $enregistrement['description_courte'], $enregistrement['description_longue'], $enregistrement['date_nouvelle'], $enregistrement['actif'], $enregistrement['fk_categorie']);
            } else {
               
                return null;
            }   
            
            $requete->close(); 
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";   
            echo $mysqli->error;
            return null;
        }

        return $nouvelles;
    }

    /* Fonction pour obtenir toutes les nouvelles actives par categories */
public static function obtenirNouvelleParCategorie($id) {
    $liste = [];
    $mysqli = self::connecter();
  

    if($requete = $mysqli->prepare("SELECT * FROM nouvelles WHERE actif=1 AND fk_categorie=? ORDER BY date_nouvelle DESC ")) {
    
         $requete->bind_param("i", $id); 

        $requete->execute(); 

        $result = $requete->get_result(); 
    
       
        foreach ($result as $enregistrement) {
          
            $liste[] = new modele_nouvelles($enregistrement['id'], $enregistrement['titre'], $enregistrement['description_courte'], $enregistrement['description_longue'], $enregistrement['date_nouvelle'], $enregistrement['actif'], $enregistrement['fk_categorie']);
        }

    } else {
        echo "Une erreur a été détectée dans la requête utilisée : ";   
        echo $mysqli->error;
        return null;
    }
    return $liste;
}
 



}




?>