<?php

require_once './modeles/authentification.php';

class ControlerAuthentification {

    /* Fonction permettant d'ajouter un utilisateur*/
    function ajouter() {
        if(isset($_POST['utilisateur_ajout']) && isset($_POST['mot_de_passe_ajout']) && isset($_POST['courriel_ajout'])) {
            $message = modele_authentification::ajouter($_POST['utilisateur_ajout'], $_POST['mot_de_passe_ajout'], $_POST['courriel_ajout']);
            echo $message;
        } else {
            $erreur = "Impossible d'ajouter un utilisateur. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

    /* Fonction permettant à un utilisateur de se connecter*/
    function connecter() {
        if(isset($_POST['utilisateur_login']) && isset($_POST['mot_de_passe_login'])) {
            $utilisateur = modele_authentification::ObtenirUn($_POST['utilisateur_login']);
            if($utilisateur) {            
                        
                if(password_verify($_POST['mot_de_passe_login'], $utilisateur->mot_de_passe)) {
                  
                    $_SESSION['utilisateur'] = $_POST['utilisateur_login'];
                    header('Location: .'); 
                } else {
                    $erreur = "<b class='erreur'>Le mot de passe est incorrect</b>";
                    require './vues/erreur.php';
                }
            } else {
                $erreur = "L'utilisateur n'existe pas";
                require './vues/erreur.php';
            }
        } else {
            $erreur = "Impossible de se connecter. Des informations sont manquantes";
            require './vues/erreur.php';
        }
    }

    /* Fonction permettant à un utilisateur de se déconencter*/
    function deconnecter() {
        if(isset($_SESSION["utilisateur"])) {
            unset($_SESSION["utilisateur"]);
            header('Location: .');  
    }
}
}