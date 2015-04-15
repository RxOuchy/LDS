<?php

class files extends Controller {

    function __construct() {
        parent::__construct();
        
        $this->view->js = array('files/js/custom.js');
    }
    
    function index() {
        $this->view->render('files');
    }
    
    function PostFormData() {
        $this->model->PostFormData();
    }

    function getFileList() {
        $this->model->getFileList();
    }

    function getDataByName() {
        $this->model->getDataByName();
    }
    
    function getServerList() { 
        $this->model->getServerList();
    }
    
    function getDatabaseList() {
        $this->model->getDatabaseList();
    }
    
    function getTableList() {
        $this->model->getTableList();
    }
    
    function getFieldList() {
        $this->model->getFieldList();
    }

}