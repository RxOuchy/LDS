<?php

class database_Model extends Model {

    function __construct() {
        $this->xml = new _XML();
    }
    
    function PostFormData() {
        
    }
    
    function getServerList() {
        
        $data = array();
        foreach($this->xml->readByRoot('connection') as $node) {
            foreach($node->childNodes as $child) {
                if ($child->localName == 'database') {
                    $data[]['database'] = $child->nodeValue;
                }
            }
        }
        
        echo json_encode($data);
    }
    
    function getDataByName() {
        $name = $_POST['name'];
        echo json_encode($this->xml->readNodeByName('connection', $name));
    }
    
    function getDataByDataBase() {
        $db = $_POST['database'];
        echo json_encode($this->xml->readNodeByName('connection', $db));
    }

}