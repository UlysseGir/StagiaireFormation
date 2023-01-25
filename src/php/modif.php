<?php
$base = mysqli_connect("127.0.0.1", "root", "", "gestion_eleves");
mysqli_set_charset($base, "utf8");

$stagiaire = mysqli_query($base, "SELECT * FROM stagiaire JOIN nationnalite ON stagiaire.id_nationnalite = nationnalite.ID_NATIONNALITE JOIN type_de_formation ON  stagiaire.id_formation = type_de_formation.ID_FORMATION");
$Nationalite = mysqli_query($base, "SELECT * FROM nationnalite");
$formation = mysqli_query($base, "SELECT * FROM type_de_formation");
$Formateur = mysqli_query($base,"SELECT * FROM formateurs JOIN salle ON formateurs.ID_SALLE = salle.ID_SALLE JOIN type_formation_formateur ON formateurs.ID_FORMATEUR = type_formation_formateur.ID_FORMATEUR");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <h2>UPDATE</h2>
    <div class="alert alert-warning" role="alert">
    <img src="https://www.freeiconspng.com/thumbs/warning-icon-png/sign-warning-icon-png-7.png" style="width: 30px;" alt=""> Cette page n'est pas terminée ! Le côté techinque n'est pas encore opérationnelle et l'affichage non définitif
    </div>
    <hr>
    <form action="" method="POST">
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
                <td><input type="text" name="nom" id="nom" value="'.$ligne["nom_stagiaire"].'" required="required"></td>
                <td><input type="text" name="prenom" id="prenom" value="'.$ligne["prenom_stagiaire"].'" required="required"></td>';
                
                echo '<td><select>';
                //Boucle sur les nationalité pour le select
                while ($ligneNat = mysqli_fetch_assoc($Nationalite)){
                    echo '<option value="'.$ligneNat["ID_NATIONNALITE"].'">'.$ligneNat["LIBELLE_NATIONNALITE"].'</option>';
                }
                echo "</select></td>";

                echo '<td><select>';
                while ($ligneForm = mysqli_fetch_assoc($formation)){
                    echo '<option value="'.$ligneForm["ID_FORMATION"].'">'.$ligneForm["LIBELLE_FORMATION"].'</option>';
                }
                echo "</select></td>";

                $formateurCheck = mysqli_query($base, "SELECT * FROM FORMATEURS JOIN stagiaire_formateur ON formateurs.id_formateur = stagiaire_formateur.id_formateur JOIN salle ON formateurs.id_salle = salle.id_salle WHERE stagiaire_formateur.id_stagiaire = '".$ligne["id_stagiaire"]."'");

                //formateurs
                echo '<td>';
                while ($ligneForm2 = mysqli_fetch_assoc($Formateur)){
                    echo '
                    <input type="checkbox" name="formateurId[]" id="'.$ligneForm2["ID_FORMATION"].'" value="'.$ligneForm2["ID_FORMATEUR"].'" class="formateur">
                    <label for="'.$ligneForm2["ID_FORMATEUR"].'">'.$ligneForm2["NOM_FORMATEUR"].' '.$ligneForm2["PRENOM_FORMATEUR"].' dans la salle '.$ligneForm2["NUMERO_SALLE"].',</label><br><label for="debut">début:</label><input type="date" name="debut_'.$ligneForm2["ID_FORMATEUR"].'" id="debut"><label for="fin">fin:</label><input type="date" name="fin_'.$ligneForm2["ID_FORMATEUR"].'" id="fin">
                    <br>
                    ';
                }
                echo "</td>";
                //CheckBox pour le delete
                echo '<td><input type="checkbox" value="'.$ligne["id_stagiaire"].'" name="id[]"></td>';
    echo '</tr>';
        }   
    ?>
  </tbody>
</table>
<input type="submit" value="Modifier">
</form>
<a href="insert.php">Inseré un stagiaire</a>
<a href="delete.php" class="red">Suppression d'un stagiaire</a>
</body>
<script>

</script>
</html>