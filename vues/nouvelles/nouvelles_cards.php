
 <div class="row">
     <?php foreach ($nouvelles as $nouvelles ){ ?>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header"><?= $nouvelles->titre ?></h4>
          <div class="card-body">
			<h6 class="card-title"><?= $nouvelles->date_nouvelle ?></h6>
            <p class="card-text"><?= $nouvelles->description_courte ?></p>
          </div>
          <div class="card-footer">
            <a  class="btn btn-primary" href="nouvelle.php?id=<?= $nouvelles->id ?>">En savoir plus</a>
          </div>
        </div>
      </div>
    <?php }?>
</div>

