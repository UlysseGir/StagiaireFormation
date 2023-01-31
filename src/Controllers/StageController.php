<?php

namespace gestion\Controllers;

use gestion\Models\StagiaireManager;
use gestion\Models\FormateurManager;

/** Class StageController **/
class StageController {
    private $StagManager;
    private $formManager;

    public function __construct() {
        $this->StagManager = new StagiaireManager();
        $this->formManager = new FormateurManager();
    }

    public function index() {
        $nationnalites = $this->StagManager->getAllNationnalite();
        $formations = $this->StagManager->getAllFormation();
        $formateurs = $this->formManager->getAllFormateur();
        require VIEWS . 'global/insert.php';
    }

    public function insert(){
        $insert = $this->StagManager->insert();
        header("Location:/");
    }
}