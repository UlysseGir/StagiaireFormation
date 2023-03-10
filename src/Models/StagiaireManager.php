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

    public function getAllStagiaire(){
        $stmt = $this->bdd->prepare('SELECT *,nationnalite.LIBELLE_NATIONNALITE as libelle_nationnalite, type_de_formation.LIBELLE_FORMATION as libelle_formation FROM stagiaire JOIN nationnalite ON stagiaire.id_nationnalite = nationnalite.id_nationnalite JOIN type_de_formation ON stagiaire.id_formation = type_de_formation.id_formation');
        $stmt->execute(array());

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"gestion\Models\Stagiaire");
    }

    public function insert($formateurId){
        $uniqid = uniqid();

        $stmt = $this->bdd->prepare('INSERT INTO stagiaire (nom_stagiaire,prenom_stagiaire,id_stagiaire,id_formation,id_nationnalite) VALUES (:nom,:prenom,:id,:formation,:nationnalite)');
        $stmt->execute(array(
            "nom"=>htmlspecialchars($_POST["nom"]),
            "prenom"=>htmlspecialchars($_POST["prenom"]),
            "id"=>$uniqid,
            "nationnalite"=>$_POST["nationalite"],
            "formation"=>$_POST["formation"],
        ));


        foreach($formateurId as $cle => $val){
            $stmt = $this->bdd->prepare('INSERT INTO stagiaire_formateur (DATE_DEBUT,DATE_FIN,ID_STAGIAIRE,ID_FORMATEUR) VALUES (:debut,:fin,:stagiaire,:formateur)');
            $stmt->execute(array(
                "debut"=>$_POST["debut_".$val],
                "fin"=>$_POST["fin_".$val],
                "stagiaire"=>$uniqid,
                "formateur"=>$val,
            ));
        }
    }

}