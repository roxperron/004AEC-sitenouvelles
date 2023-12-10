<table class="table table-striped">
    <tr>
        <th>ID</th>        
        <th>Nom</th>        
        <th>Durée</th>        
        <th>Origine</th>
        <th>Categories</th>
     
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
     
        </tr>
        
    <?php
        }
    ?>
</table>







