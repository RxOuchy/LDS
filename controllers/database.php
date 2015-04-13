<?php

    class Database extends Controller {
        
        function __construct() {
            parent::__construct();
            
            $this->view->js = array('database/js/custom.js');
        }
        
        function index() {
            $this->view->render('database');
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
        
        function getDataByDatabase() {
            $this->model->getDataByDatabase();
        }
        
        function deleteElement() {
            $this->model->deleteElement();
        }
        
    }

?>