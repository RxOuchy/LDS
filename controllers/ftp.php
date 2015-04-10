<?php

    class ftp extends Controller {
        
        function __construct() {
            parent::__construct();
            
            $this->view->js = array('ftp/js/custom.js');
        }
        
        function index() {
            $this->view->render('ftp');
        }
        
        function PostFormData() {
            $this->model->PostFormData();
        }
        
        function getServerList() {
            $this->model->getServerList();
        }
        
        function getDataByName() {
            $this->model->getDataByName();
        }
        
    }
?>