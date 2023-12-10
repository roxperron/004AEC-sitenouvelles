<div class="d-flex justify-content-center">
<div class="card " style="width: 25%;">
  <img src="https://picsum.photos/200"" class="card-img-top" alt="Une image aléatoire">
  <div class="card-body">
    <h2 class="card-title">Nom: <?= $personnel->nom ?></h2>
    <h3>Durée en minutes: <?= $personnel->duree_min?></h3>
    <h4 class="card-text">Origine: <?= $personnel->origine?></h4>
    <h4 class="card-text">ID categorie: <?= $personnel->nom_categorie?></h4>
    <a class="btn btn-primary" href="administration_module_personnel.php">Retour au panndeau d'administration</a>
  </div>
</div>
</div>