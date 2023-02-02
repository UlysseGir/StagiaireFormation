<?php
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
        while ($ligne = mysqli_fetch_assoc($stagiaire)){
            echo '
            <tr>
                <td>'.$ligne["nom_stagiaire"].'</td>
                <td>'.$ligne["prenom_stagiaire"].'</td>
                <td>'.$ligne["LIBELLE_NATIONNALITE"].'</td>
                <td>'.$ligne["LIBELLE_FORMATION"].'</td>';
                $formateur = mysqli_query($base, "SELECT * FROM FORMATEURS JOIN stagiaire_formateur ON formateurs.id_formateur = stagiaire_formateur.id_formateur JOIN salle ON formateurs.id_salle = salle.id_salle WHERE stagiaire_formateur.id_stagiaire = '".$ligne["id_stagiaire"]."'");
                echo "<td>";
                //Affichage des différents formateurs
                while($ligne2 = mysqli_fetch_assoc($formateur)){
                    echo $ligne2["NOM_FORMATEUR"].' | '.$ligne2["NUMERO_SALLE"].' | '.$ligne2["DATE_DEBUT"].' | '.$ligne2["DATE_FIN"].'<br>';
                }
                echo "</td>";
                //CheckBox pour le delete
                echo '<td><input type="checkbox" value="'.$ligne["id_stagiaire"].'" name="id[]"></td>';
    echo '</tr>';
        }   
    ?>
  </tbody>
</table>
<input type="submit" value="Supprimer">
</form>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';