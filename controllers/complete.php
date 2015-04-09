<?php

class complete extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->render('complete');
    }

}