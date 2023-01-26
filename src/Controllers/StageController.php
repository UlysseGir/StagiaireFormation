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
        $stagiaires = $this->manager->getAllNationnalite();
        require VIEWS . 'global/insert.php';
    }
}