<?php

class database_Model extends Model {

    function __construct() {
        $this->xml = new _XML();
    }
    
    function PostFormData() {
        
        if (!isset($_POST['isNew'])) {
            $this->path = "/config/database/connection";
            $this->xPath = new DOMXPath($this->xml->xml);

            $this->node = $this->xPath->query($this->path)->item(0);
            foreach( $this->node->childNodes as $child ) {
                $child->firstChild->nodeValue = $_POST[$child->nodeName];
            }
        } else {
            
            $this->xml->createElement('database', $_POST);
            
        }
        
        $this->xml->xml->save($this->xml->_configPath);
        echo json_encode("success");
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
    
    function getDataByDataBase() {
        $db = $_POST['database'];
        echo json_encode($this->xml->readNodeByElement('connection', $db));
    }

}