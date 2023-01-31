<?php

namespace gestion\Controllers;

use gestion\Models\FormateurManager;

/** FormateurController **/
class FormateurController {
    public $formManager;

    public function __construct() {
        $this->formManager = new FormateurManager();
    }

}