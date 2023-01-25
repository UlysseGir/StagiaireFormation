<?php
$base = mysqli_connect("127.0.0.1", "root", "", "gestion_eleves");
mysqli_set_charset($base, "utf8");

$stagiaire = mysqli_query($base, "SELECT * FROM stagiaire JOIN nationnalite ON stagiaire.id_nationnalite = nationnalite.ID_NATIONNALITE JOIN type_de_formation ON  stagiaire.id_formation = type_de_formation.ID_FORMATION");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <h2>DELETE</h2>
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
<a href="insert.php">Inseré un stagiaire</a>
<a href="modif.php">Modification d'un stagiaire</a>
</body>
</html>