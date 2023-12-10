<?php
  

  require_once './modeles/personnel.php';

  class ControlerPersonnel {

  /*Fonction d'obtenir tous les films*/ 
  function afficherTableauFilms(){
    $personnel = modele_personnel::obtenirTous();
    require './vues/personnel/tableau_films.php';

  }

  /* Fonction pour afficher le tableau d'admin */
  function afficherTableauAdmin() {
    $personnel = modele_personnel::obtenirTous();
    require './vues/personnel/tableau_admin.php';
}

/* Fonction pour afficher la carte d'un film */
function afficherFicheFilm() {
  if(isset($_GET["id"])) {
      $personnel = modele_personnel::obtenirUn($_GET["id"]);
      if($personnel) {  // ou if($produit != null)
          require './vues/personnel/afficherfilm.php';
      } else {
          $erreur = "Aucun films trouvé";
          require './vues/erreur_film.php';
      }
  } else {
      $erreur = "L'identifiant (id) du film à afficher est manquant dans l'url";
      require './vues/erreur_film.php';
  }
}


  /* AJOUTER */  
    /*Fonction permettant d'ajouter un film*/
    function ajouter() {
      if(isset($_POST['nom']) && isset($_POST['duree_min']) && isset($_POST['origine']) && isset($_POST['id_categorie'])) {
          $message = modele_personnel::ajouter($_POST['nom'], $_POST['duree_min'], $_POST['origine'],$_POST['id_categorie']);
          echo $message;
      } else {
          $erreur = "Impossible d'ajouter un film. Des informations sont manquantes";
          require './vues/erreur.php';
      }
  }



/* MODIFER */
      /*Fonction permettant de modifier un film*/
      function modifier() {
        if(isset($_GET['id'], $_POST['nom']) && isset($_POST['duree_min']) && isset($_POST['origine']) && isset($_POST['id_categorie'])) {
            $message = modele_personnel::modifier($_GET['id'],$_POST['nom'],$_POST['duree_min'], $_POST['origine'],$_POST['id_categorie']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter un film. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }
  

      /*Fonction permettant de récupérer un film  à partir de l'identifiant (id) 
     inscrit dans l'URL, et l'affiche dans un formulaire pour le modifier */
     function afficherFormulaireModifier(){
        if(isset($_GET["id"])) {
            $personnel = modele_personnel::ObtenirUn($_GET["id"]);
            if($personnel) {  
                require './vues/personnel/form_modifier.php';
            } else {
                $erreur = "Aucun film trouvé";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "L'identifiant (id) d'un film à afficher est manquant dans l'url";
            require './vues/erreur.php';
        }
    }

  /*SUPPRIMER*/ 
      /*Fonction permettant d'ajouter un film*/
      function supprimer() {
        if(isset($_GET['id'])) {
            $message = modele_personnel::supprimer($_GET['id']);
            echo $message;
        } else {
            $erreur = "Impossible de supprimer le film. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }
  
  
   /** Fonction permettant de récupérer un film  à partir de l'identifiant (id) 
     inscrit dans l'URL, et l'affiche dans un formulaire pour le supprimer*/
  function afficherFormulaireSupprimer(){
    if(isset($_GET["id"])) {
        $personnel = modele_personnel::ObtenirUn($_GET["id"]);
        if($personnel) { 
            require './vues/personnel/form_supprimer.php';
        } else {
            $erreur = "Aucun film trouvé";
            require './vues/erreur.php';
        }
    } else {
        $erreur = "L'identifiant (id) d'un film à afficher est manquant dans l'url";
        require './vues/erreur.php';
    }
}



}






?>