<?php include_once('include/header.php'); ?>

<?php 
require_once 'controlers/categories.php';
require_once 'controlers/nouvelles.php';

?> 


  <!-- Page Content -->
  <div class="container">
  
	<h1 class="my-4">
        <?php
              $controlerCategories=new ControlerCategories;
              $controlerCategories->afficherCategorieTitre();
          ?> 
  </h1>


<div>

  
<?php
      $controlerNouvelles=new ControlerNouvelles;
      $controlerNouvelles->afficherNouvelleParCategorie();
   ?> 

</div>

       

<?php include_once('include/footer.php'); ?>

