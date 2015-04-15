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
                $child->nodeValue = $_POST[$child->nodeName];
            }
        } else {
            
            $this->xml->createElement('host', $_POST);
            
        }
        
        $this->xml->xml->save($this->xml->_configPath);
        echo json_encode("success");
    }
    
    function getServerList() {
        
        $data = array();
        foreach($this->xml->readByRoot('connection') as $node) {
            foreach($node->childNodes as $child) {
                if ($child->localName == 'host') {
                    $data[]['host'] = $child->nodeValue;
                }
            }
        }
        
        echo json_encode($data);
    }
    
    function getDataByDataBase() {
        $db = $_POST['host'];
        echo json_encode($this->xml->readNodeByElement('connection', $db));
    }
    
    function deleteElement() {
        $element = $_POST['host'];
        if ($this->xml->deleteNodeByChildElement('connection', $element))
            return true;
        return false;
    }
    
    function validateConnection() {
        $host = $_POST['host'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $port = $_POST['port'];
                
        $db = new mysqli($host, $user, $pass, null, $port);
        
        if(mysqli_connect_error()) {
            echo json_encode(array('status'=>'error', 'err_msg'=>mysqli_connect_error()));
        } else {
            echo json_encode(array('status'=>'success'));
        }
    }

}