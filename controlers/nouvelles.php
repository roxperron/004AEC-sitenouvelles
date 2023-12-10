<?php
  

  require_once './modeles/nouvelles.php';

  class ControlerNouvelles {

  /*Fonction permettant de récupérer l'ensemble des nouvelles et de les afficher par ordre de date dans la page d'acceuil*/ 
  function afficherNouvellesActives(){
    $nouvelles = modele_nouvelles::obtenirToutesActives();
    require './vues/nouvelles/toutes_nouvelles.php';
  }

  /*Fonction permettant de récupérer les 3 nouvelles plus récentes*/ 
  function afficherTop3(){
    $nouvelles = modele_nouvelles::obtenirTop3Actives();
    require './vues/nouvelles/nouvelles_cards.php';
  }

 /*Fonction permettant de récupérer une nouvelle par son ID dans l'URL et d'affiche les détails dans nouvelle.php */
  function afficherNouvelle() {
    if(isset($_GET["id"])) {
        $nouvelles = modele_nouvelles::obtenirUneNouvelle($_GET["id"]);
        if($nouvelles) {  
            require './vues/nouvelles/fiche.php';
        } else {
            $erreur = "Aucune nouvelle trouvé";
            require './vues/erreur.php';
        }
    } else {
        $erreur = "L'identifiant (id) d'une nouvelle à afficher est manquante dans l'url";
        require './vues/erreur.php';
    }
}


function afficherNouvelleParCategorie() {
  if(isset($_GET["id"])) {
      $nouvelles = modele_nouvelles::obtenirNouvelleParCategorie($_GET["id"]);
      if($nouvelles) {  // ou if($produit != null)
          require './vues/nouvelles/nouvellesparcategorie.php';
      } else {
          $erreur = "Aucun nouvelle trouvé";
          require './vues/erreur.php';
      }
  } else {
      $erreur = "L'identifiant (id) de la catégorie à afficher est manquant dans l'url";
      require './vues/erreur.php';
  }
}






}

?>