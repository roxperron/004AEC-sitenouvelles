<?php
    require_once 'controlers/personnel.php';

    $controlerPersonnel=new ControlerPersonnel;

    if (isset($_POST['boutonSupprimer'])) {        
      
        $controlerPersonnel->supprimer();
    }
?>


<!doctype html>
<html lang="fr">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">

  <title>Supprimer un film</title>
 </head>
 <body>
     
 <h1 class="text-center pb-3">Supprimer un film</h1>

 <?php
       
        $controlerPersonnel->afficherFormulaireSupprimer();
    ?>


</div>

   

 </body>
</html>