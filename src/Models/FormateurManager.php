<?php
namespace gestion\Models;

use gestion\Models\Formateur;
/** Class FormateurManager **/
class FormateurManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getAllFormateur(){
        $stmt = $this->bdd->prepare('SELECT * FROM formateurs JOIN salle ON formateurs.ID_SALLE = salle.ID_SALLE JOIN type_formation_formateur ON formateurs.ID_FORMATEUR = type_formation_formateur.ID_FORMATEUR JOIN type_de_formation ON type_de_formation.ID_FORMATION = type_formation_formateur.ID_FORMATION');
        $stmt->execute(array());

        return $stmt->fetchAll();
    }

    public function formation(){
        $stmt = $this->bdd->prepare('SELECT * FROM type_formation_formateur JOIN formation ON formation.ID_FORMATION = salle.ID_SALLE');
        $stmt->execute(array());

        return $stmt->fetchAll();
    }

    public function getFormateurStagiaire($idStagiaire){
        $stmt = $this->bdd->prepare("SELECT * FROM FORMATEURS JOIN stagiaire_formateur ON formateurs.id_formateur = stagiaire_formateur.id_formateur JOIN salle ON formateurs.id_salle = salle.id_salle WHERE stagiaire_formateur.id_stagiaire = ?");
        $stmt->execute(array($idStagiaire));

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"gestion\Models\\formateur");
    }

    // public function insert($formateurId){
    //     $uniqid = uniqid();
    //     foreach($formateurId as $cle => $val){
    //         $stmt = $this->bdd->prepare('INSERT INTO stagiaire_formateur (DATE_DEBUT,DATE_FIN,ID_STAGIAIRE,ID_FORMATEUR) VALUES (:debut,:fin,:stagiaire,:formateur)');
    //         $stmt->execute(array(
    //             "debut"=>$_POST["debut_".$val],
    //             "fin"=>$_POST["fin_".$val],
    //             "stagiaire"=>$uniqid,
    //             "formateur"=>$val,
    //         ));
    //     }
    // }

}