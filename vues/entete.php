<!doctype html>
<html lang="fr">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/styles.css">
  <title><?= $title ?></title>
 </head>
 <body>
    <nav>

    <?php if(isset($_SESSION["utilisateur"])) { ?>
 <!--        <li>
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administration
          </a>
       <ul>
           
                <li><a href="administration_nouvelles.php">Administration Nouvelles</a></li>
                <li><a href="administration_module_personnel.php">Administration - Module personnel </a></li>
           

        </ul> 
        </li> -->
        <?php } ?>
        <? require 'vues/authentification/formulaireConnexion.php'; ?>

       

    </nav>

