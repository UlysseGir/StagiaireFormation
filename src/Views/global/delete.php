<?php

use gestion\Models\Stagiaire;

ob_start();
?>
<h2>Delete</h2>
<hr>
<form action="deleteBack.php" method="POST">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Nationalité</th>
      <th scope="col">Type de formation</th>
      <th scope="col">Formateur - Salle - Date debut - Date fin</th>
    </tr>
  </thead>
  <tbody>
    <?php
    //Affichage dynamique des différents stagiaires inscrit dans la base de donnée
        foreach($stagiaires as $stagiaire){
            ?>
            <tr>
                <td><?= $stagiaire->getNom_stagiaire() ?></td>
                <td><?= $stagiaire->getPrenom_stagiaire() ?></td>
                <td><?= $stagiaire->getLibelle_nationnalite() ?></td>
                <td><?= $stagiaire->getLibelle_formation() ?></td>
                <td>
                <?php
                //Affichage des différents formateurs

                // /!\ FINISH HERE /!\
                // foreach($formateurs as $formateur){
                //     echo $formateur->getNom_formateur().' | '.$formateur["NUMERO_SALLE"].' | '.$formateur["DATE_DEBUT"].' | '.$formateur["DATE_FIN"].'<br>';
                //     var_dump($formateurs);
                // }


                echo "</td>";
                //CheckBox pour le delete
                //echo '<td><input type="checkbox" value="'.$stagiaire["id_stagiaire"].'" name="id[]"></td>';
                ?>
            </tr>
    <?php
        }   
    ?>
  </tbody>
</table>
<input type="submit" value="Supprimer">
</form>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';