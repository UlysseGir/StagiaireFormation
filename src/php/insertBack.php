<?php

try
{
    $base = new PDO('mysql:host=127.0.0.1;dbname=gestion_eleves', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $uniqid = uniqid();
    $formateurId = $_POST["formateurId"];

    $sql = "INSERT INTO stagiaire (nom_stagiaire,prenom_stagiaire,id_stagiaire,id_formation,id_nationnalite) VALUES (:nom,:prenom,:id,:formation,:nationnalite)";
    $sql2 = "INSERT INTO stagiaire_formateur (DATE_DEBUT,DATE_FIN,ID_STAGIAIRE,ID_FORMATEUR) VALUES (:debut,:fin,:stagiaire,:formateur)";

    //Requête sql preparée
    $resultat = $base->prepare($sql);
    $resultat->execute(array("nom"=>htmlspecialchars($_POST["nom"]),"prenom"=>htmlspecialchars($_POST["prenom"]),"id"=>$uniqid,"nationnalite"=>$_POST["nationalite"],"formation"=>$_POST["formation"]));

    //Boucle sur les differents formateurs séléctionnés
    foreach($formateurId as $cle => $val){
        $resultat2 = $base->prepare($sql2);
        $resultat2->execute(array("debut"=>$_POST["debut_".$val],"fin"=>$_POST["fin_".$val],"stagiaire"=>$uniqid,"formateur"=>$val));
    }

    echo "Nouveau stagiaire ajouté";
    header("Location:delete.php");
    
}
catch(Exception $e)
{
    // message en cas d'erreur
    die('Erreur : '.$e->getMessage());
}