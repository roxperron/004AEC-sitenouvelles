<?php
  

  require_once './modeles/categories.php';

  class ControlerCategories {

  /*Fonction d'obtenir toutes les catégories des nouvelles*/ 
  function afficherMenuNav(){
    $categories = modele_categories::obtenirToutesCategories();
    require './vues/categories/listes_categories.php';
  }



  
 /*Fonction permettant de récupérer une nouvelle par son ID dans l'URL et d'affiche les détails dans nouvelle.php */
 function afficherCategorieTitre() {
  if(isset($_GET["id"])) {
      $categories = modele_categories::obtenirUneCategorie($_GET["id"]);
      if($categories) {  
          echo $categories->categorie;
        } else {
            $erreur = "Aucun propriétaires trouvé";
            require './vues/erreur.php';
        }
    } else {
        $erreur = "L'identifiant (id) de la catégorie à afficher est manquant dans l'url";
        require './vues/erreur.php';
    }
      } 


}




?>