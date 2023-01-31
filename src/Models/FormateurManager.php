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

}