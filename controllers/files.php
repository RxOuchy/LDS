<?php

class files extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->render('files');
    }

}