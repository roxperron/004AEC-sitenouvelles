<div class="d-flex justify-content-center ">

<form method="POST">
 <div class="mb-3">
   <label for="nom" class="form-label">Nom:</label>
   <input type="text" class="form-control" id="nom" name="nom" required maxlenght="150" value="<?= $personnel->nom ?>">
 </div>

 <div class="mb-3">
   <label for="duree_min" class="form-label">Durée (minutes):</label>
   <input type="text" class="form-control" id="duree_min" name="duree_min" required value="<?= $personnel->duree_min ?>">
 </div>

 <div class="mb-3">
   <label for="origine" class="form-label">Origine:</label>
   <input type="text" class="form-control" id="origine" name="origine" required maxlenght="75" value="<?= $personnel->origine ?>">
 </div>

 <div class="mb-3">
   <label for="id_categorie" class="form-label">Catégorie:</label>
   <select id="id_categorie" name="id_categorie" class="form-select" aria-label="Default select example" required>
               <option selected>Sélectionner une catégorie</option>
               <option value="1">Fantastique</option>
               <option value="2">Action</option>
               <option value="3">Comédie</option>
               <option value="4">Drame</option>
               <option value="5">Science-ficton</option>
</select>
 </div>

 <button type="submit" name = "boutonModifier" class="btn btn-primary">Modifier le film</button>
 <a class="btn btn-primary" href="administration_module_personnel.php">Retour au panndeau d'administration</a>
</form>

</div>