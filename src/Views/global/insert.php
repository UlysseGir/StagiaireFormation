<?php
ob_start();
?>
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
        
        foreach($nationnalites as $nationnalite){
            ?>
            <option value="<?= $nationnalite["LIBELLE_NATIONNALITE"] ?>"><?= $nationnalite["LIBELLE_NATIONNALITE"] ?></option>
            <?php
        }?>
        </select>
        <br>
        <!-- formation -->
        <label for="formation">type de la formation</label>
        <select name="formation" id="formation">
        <?php
        //Boucle sur les formation pour le select
        foreach($formations as $formation){
            ?>
            <option value="<?= $formation["LIBELLE_FORMATION"] ?>"><?= $formation["LIBELLE_FORMATION"] ?></option>
            <?php
        }?>
        </select>
        <br>
        <p>Formateur par date:</p>
        <div id="formateursListe">            
            <?php
            //Boucle sur tout les formateurs pour les afficher
            foreach($formateurs as $formateur){
                ?>
                <div>
                    <input type="checkbox">
                    <?= $formateur["NOM_FORMATEUR"] ?> dans la salle <?= $formateur["NUMERO_SALLE"] ?>, début:
                    <input type="date">, fin: <input type="date">
                </div>
                <?php
            }?>
            

            <?php
                // while ($ligne = mysqli_fetch_assoc($Formateur)){
                //     echo '
                //     <input type="checkbox" name="formateurId[]" id="'.$ligne["ID_FORMATION"].'" value="'.$ligne["ID_FORMATEUR"].'" class="formateur">
                //     <label for="'.$ligne["ID_FORMATEUR"].'">'.$ligne["NOM_FORMATEUR"].' '.$ligne["PRENOM_FORMATEUR"].' dans la salle '.$ligne["NUMERO_SALLE"].',</label> <label for="debut">début:</label><input type="date" name="debut_'.$ligne["ID_FORMATEUR"].'" id="debut"><label for="fin">fin:</label><input type="date" name="fin_'.$ligne["ID_FORMATEUR"].'" id="fin">
                //     <br>
                //     ';
                // }
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
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';