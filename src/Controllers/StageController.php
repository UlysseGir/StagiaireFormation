<?php

namespace gestion\Controllers;

use gestion\Models\StagiaireManager;

/** Class StageController **/
class StageController {
    private $manager;

    public function __construct() {
        $this->manager = new StagiaireManager();
    }

    public function index() {
        $nationnalites = $this->manager->getAllNationnalite();
        $formations = $this->manager->getAllFormation();
        require VIEWS . 'global/insert.php';
    }
}