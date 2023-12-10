
<div class="accordion" id="accordionExample">
<?php foreach ($nouvelles as $nouvelle ){ ?>
<div class="accordion-item">
  <h2 class="accordion-header" id="headingOne">
    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
    <?= $nouvelle->titre ?>
    </button>
  </h2>
  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
    <div class="accordion-body">
      <strong><?= $nouvelle->date_nouvelle ?></strong><?= $nouvelle->description_longue ?>
      <a class="btn btn-primary" href="nouvelle.php?id=<?= $nouvelle->id ?>"> En savoir plus</a>
    </div>
  </div>
</div>
<?php }?>
</div>


