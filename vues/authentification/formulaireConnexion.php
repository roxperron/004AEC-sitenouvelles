<?php
    require_once 'controlers/authentification.php';

    if (isset($_POST['boutonConnexion'])) {        
        $controlerAuthentification=new ControlerAuthentification;
        $controlerAuthentification->connecter();
    } else if (isset($_POST['boutonDeconnexion'])) { 
        $controlerAuthentification=new ControlerAuthentification;
        $controlerAuthentification->deconnecter();
    }
?>

<?php if(!isset($_SESSION["utilisateur"])) { ?>
    <form method="POST">
        
        <div>
        <label for="utilisateur_login">Nom d'utilisateur</label><br>
        <input type="text" id="utilisateur_login" name="utilisateur_login" required>
        </div>


        <div class="pb-2">
        <label for="mot_de_passe_login">Mot de passe</label><br>
        <input type="password" id="mot_de_passe_login" name="mot_de_passe_login" required>
        </div>

        <button id ="boutonConnexion" name="boutonConnexion"type="submit" class="btn btn-primary">Connexion</button>
    </form>

<?php } else { ?>
    Vous êtes connecté en tant que <?= $_SESSION["utilisateur"] ?> 
        
    <form method="POST">
    <button id ="boutonDeconnexion" name="boutonDeconnexion" type="submit" class="btn btn-danger">Déconnexion</button>
    </form>
<?php } ?>
