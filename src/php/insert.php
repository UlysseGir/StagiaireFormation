<?php
$base = mysqli_connect("127.0.0.1", "root", "", "gestion_eleves");
mysqli_set_charset($base, "utf8");

//requetes sql
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
    <title>inserer un stagiraire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <h2>INSERT</h2>
    <hr>
    <!-- formulaire -->
    <form action="insertBack.php" method="POST">
        <!-- nom -->
        <label for="nom">nom</label>
        <input type="text" name="nom" id="nom" required="required">
        <br>
        <!-- prenom -->
        <label for="prenom">prénom</label>
        <input type="text" name="prenom" id="prenom" required="required">
        <br>
        <!-- nationalité -->
        <label for="nationalite">nationalité</label>
        <select name="nationalite" id="nationalite">
        <?php
        //Boucle sur les nationalité pour le select
            while ($ligne = mysqli_fetch_assoc($Nationalite)){
                echo '<option value="'.$ligne["ID_NATIONNALITE"].'">'.$ligne["LIBELLE_NATIONNALITE"].'</option>';
            }
        ?>
        </select>
        <br>
        <!-- formation -->
        <label for="formation">type de la formation</label>
        <select name="formation" id="formation">
        <?php
        //Boucle sur les formation pour le select
            while ($ligne = mysqli_fetch_assoc($formation)){
                echo '<option value="'.$ligne["ID_FORMATION"].'">'.$ligne["LIBELLE_FORMATION"].'</option>';
            }
        ?>
        </select>
        <br>
        <p>Formateur par date:</p>
        <div id="formateursListe">            
            <?php
            //Boucle sur tout les formateurs pour les afficher
                while ($ligne = mysqli_fetch_assoc($Formateur)){
                    echo '
                    <input type="checkbox" name="formateurId[]" id="'.$ligne["ID_FORMATION"].'" value="'.$ligne["ID_FORMATEUR"].'" class="formateur">
                    <label for="'.$ligne["ID_FORMATEUR"].'">'.$ligne["NOM_FORMATEUR"].' '.$ligne["PRENOM_FORMATEUR"].' dans la salle '.$ligne["NUMERO_SALLE"].',</label> <label for="debut">début:</label><input type="date" name="debut_'.$ligne["ID_FORMATEUR"].'" id="debut"><label for="fin">fin:</label><input type="date" name="fin_'.$ligne["ID_FORMATEUR"].'" id="fin">
                    <br>
                    ';
                }
            ?>

        </div>
        <input type="submit">
    </form>
    <a href="delete.php" class="red">Suppression d'un stagiaire</a>
    <a href="modif.php" class="yellow">Modification d'un stagiaire</a>
    <script>
        //Gestion des checkbox disabled
        let formation = document.getElementById("formation");
        let formateurs = document.getElementsByClassName("formateur");
        function disabled(){
            for(let i=0; i < formateurs.length; i++){
                if(formation.value != formateurs[i].id){
                    formateurs[i].disabled = true;
                    formateurs[i].checked = false;
                } else {
                    formateurs[i].disabled = false;
                }
            }
        }
        disabled();
        formation.addEventListener("click", ()=>{
            disabled();
        })


</script>
</body>
</html>