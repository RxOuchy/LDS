<?php

    class ftp extends Controller {
        
        function __construct() {
            parent::__construct();
        }
        
        function index() {
            $this->view->render('ftp');
        }
        
    }
?>