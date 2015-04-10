<?php

class ftp_Model extends Model {

    function __construct() {
        $this->xml = new _XML();
    }
    
    function PostFormData() {
        
    }
    
    function getServerList() {
        
        $data = array();
        foreach($this->xml->readByRoot('server') as $node) {
            foreach($node->childNodes as $child) {
                if ($child->localName == 'name') {
                    $data[]['name'] = $child->nodeValue;
                }
            }
        }
        
        echo json_encode($data);
    }
    
    function getDataByName() {
        $name = $_POST['name'];
        
        echo json_encode($this->xml->readNodeByName('server', $name));
        
    }

}