<?php
namespace gestion\Models;

use gestion\Models\Stagiaire;
/** Class stageManager **/
class StagiaireManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getAllNationnalite(){
        $stmt = $this->bdd->prepare('SELECT * FROM nationnalite');
        $stmt->execute(array());

        return $stmt->fetchAll();
    }

    public function getAllFormation(){
        $stmt = $this->bdd->prepare('SELECT * FROM type_de_formation');
        $stmt->execute(array());

        return $stmt->fetchAll();
    }

    public function insert(){
        $uniqid = uniqid();

        $stmt = $this->bdd->prepare('INSERT INTO stagiaire (nom_stagiaire,prenom_stagiaire,id_stagiaire,id_formation,id_nationnalite) VALUES (:nom,:prenom,:id,:formation,:nationnalite)');
        $stmt->execute(array(
            "nom"=>htmlspecialchars($_POST["nom"]),
            "prenom"=>htmlspecialchars($_POST["prenom"]),
            "id"=>$uniqid,
            "nationnalite"=>$_POST["nationalite"],
            "formation"=>$_POST["formation"],
        ));
    }

}