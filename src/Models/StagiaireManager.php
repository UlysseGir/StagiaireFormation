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

}