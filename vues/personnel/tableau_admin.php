<table class="table table-striped pb-5">
    <tr>
        <th>ID</th>        
        <th>Nom</th>        
        <th>Durée</th>        
        <th>Origine</th>
        <th>Categories</th>
        <th>Actions</th>

     
    </tr>

    <?php
        foreach ($personnel as $personnel) {
    ?>
        <tr>
            <td><?= $personnel->id?></td>
            <td><?= $personnel->nom?></td>
            <td><?= $personnel->duree_min?></td>
            <td><?= $personnel->origine?></td>
            <td><?= $personnel->nom_categorie?></td>
            <td>
                <a class="px-1" href="fiche_film.php?id=<?= $personnel->id ?>">Afficher</a>
                <a class="px-1" href="modifier_film.php?id=<?= $personnel->id ?>">Modifier</a>
                <a class="px-1" href="supprimer_film.php?id=<?= $personnel->id ?>">Supprimer</a>
            </td>
     
        </tr>
        
    <?php
        }
    ?>


</table>

