<?php include_once('include/header.php'); ?>

<?php
    require_once 'controlers/nouvelles.php';
?>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Projet final</h1>

 

    <!-- Marketing Icons Section -->
<!--     <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Nouvelle #1</h4>
          <div class="card-body">
			<h6 class="card-title">Date de la nouvelle</h6>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div class="card-footer">
            <a href="nouvelle.php" class="btn btn-primary">Plus d'information</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Nouvelle #2</h4>
          <div class="card-body">
			<h6 class="card-title">Date de la nouvelle</h6>
            <p class="card-text">Nouvelle active la seconde plus récente</p>
          </div>
          <div class="card-footer">
            <a href="nouvelle.php" class="btn btn-primary">Plus d'information</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Nouvelle #3</h4>
          <div class="card-body">
			<h6 class="card-title">Date de la nouvelle</h6>
            <p class="card-text">Nouvelle active la troisième plus récente</p>
          </div>
          <div class="card-footer">
            <a href="nouvelle.php" class="btn btn-primary">Plus d'information</a>
          </div>
        </div>
      </div>
    </div> -->
    <!-- /.row -->

  <?php 
      $controlerNouvelles=new ControlerNouvelles;
      $controlerNouvelles->afficherTop3();
  ?>


<?php echo password_hash('test123', PASSWORD_DEFAULT); ?>

	
  </div>
  <!-- /.container -->
  <?php include_once('include/footer.php'); ?>



