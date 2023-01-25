<?php

try
{
    $base = new PDO('mysql:host=127.0.0.1;dbname=gestion_eleves', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    for($i = 0; $i < sizeof($_POST["id"]); $i++){

    $sql = "DELETE FROM stagiaire_formateur WHERE id_stagiaire = :id";

    $resultat = $base->prepare($sql);
    $resultat->execute(array("id"=>$_POST["id"][$i]));

    $sql = "DELETE FROM stagiaire WHERE id_stagiaire = :id";

    $resultat = $base->prepare($sql);
    $resultat->execute(array("id"=>$_POST["id"][$i]));

    header("Location:delete.php");
    }
}
catch(Exception $e)
{
    // message en cas d'erreur
    die('Erreur : '.$e->getMessage());
}