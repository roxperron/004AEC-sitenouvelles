<?php
    require_once 'controlers/personnel.php';

    if (isset($_POST['boutonAjouter'])) {        
        $controlerPersonnel=new ControlerPersonnel;
        $controlerPersonnel->ajouter();
    }
?>
<!doctype html>
<html lang="fr">
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">

  <title>Ajouter un film</title>
 </head>
 <body>
     
 <h1 class="text-center pb-3">Ajouter un film</h1>


 <div class="d-flex justify-content-center ">

 <form method="POST">
  <div class="mb-3">
    <label for="nom" class="form-label">Nom:</label>
    <input type="text" class="form-control" name="nom" id="nom" required maxlenght="150">
  </div>

  <div class="mb-3">
    <label for="duree_min" class="form-label">Durée (minutes):</label>
    <input type="text" class="form-control" id="duree_min" name="duree_min" required>
  </div>

  <div class="mb-3">
    <label for="origine" class="form-label">Origine:</label>
    <input type="text" class="form-control" id="origine" name="origine" required maxlenght="75">
  </div>

  <div class="mb-3">
    <label for="id_categorie" class="form-label">Catégorie:</label>
    <select id="id_categorie" name="id_categorie" class="form-select" aria-label="Default select example" required>
                <option selected>Sélectionner un id d'une catégorie</option>
                <option value="1">Fantastique</option>
                <option value="2">Action</option>
                <option value="3">Comédie</option>
                <option value="4">Drame</option>
                <option value="5">Science-ficton</option>
</select>
  </div>

  <button type="submit" name = "boutonAjouter" class="btn btn-primary">Ajouter le film</button>
  <a class="btn btn-primary" href="administration_module_personnel.php">Retour au panndeau d'administration</a>
</form>

</div>

   

 </body>
</html>