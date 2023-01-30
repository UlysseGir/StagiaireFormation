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
        $stmt = $this->bdd->prepare('SELECT * FROM formateurs JOIN salle ON formateurs.ID_SALLE = salle.ID_SALLE');
        $stmt->execute(array());

        return $stmt->fetchAll();
    }

}