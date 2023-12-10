<?php include_once('include/header.php'); ?>

<?php
    require_once 'controlers/personnel.php';
?>
  <!-- Page Content -->
  <div class="container">
  
	<h1 class="my-4">Module personnel</h1>	
	<p>J'affiche mes films favoris selon leur catégorie à partir de ma base de données PHP</p>
	
	<!-- Affichez les enregistrement de la table que vous avez ajoutée à la base de données. -->
  <?php
        $controlerPersonnel=new ControlerPersonnel;
        $controlerPersonnel->afficherTableauFilms();
    ?>
	
  </div>

<?php include_once('include/footer.php'); ?>
