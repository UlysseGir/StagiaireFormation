<?php
ob_start();
?>
<h2>INSERT</h2>
    <hr>
    <!-- formulaire -->
    <form action="/insert" method="POST">
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
            <option value="<?= $nationnalite["ID_NATIONNALITE"] ?>"><?= $nationnalite["LIBELLE_NATIONNALITE"] ?></option>
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
            <option value="<?= $formation["ID_FORMATION"] ?>"><?= $formation["LIBELLE_FORMATION"] ?></option>
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
                    <input type="checkbox" name="formateurId[]" id="<?= $formateur["ID_FORMATION"] ?>" value="<?= $formateur["ID_FORMATEUR"] ?>" class="formateur">
                    <label for="<?= $formateur["ID_FORMATEUR"] ?>"><?= $formateur["NOM_FORMATEUR"] ?> <?= $formateur["PRENOM_FORMATEUR"] ?> dans la salle <?= $formateur["NUMERO_SALLE"] ?></label>
                    <label for="debut">début:</label>
                    <input type="date" value="<?= date('Y-m-d') ?>" name="debut_<?= $formateur["ID_FORMATEUR"] ?>" id="debut">
                    <label for="fin">fin:</label>
                    <input value="<?= date('Y-m-d') ?>" type="date" name="fin_<?= $formateur["ID_FORMATEUR"] ?>" id="fin">
                    <br>
                </div>
                <?php
            }?>
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