<?php

class files_Model extends Model {

    private $db;
    
    function __construct() {
        $this->xml = new _XML();
    }
    
    function PostFormData() {        
        $this->path = "/config/exports/table";
        $this->xPath = new DOMXPath($this->xml->xml);
        
        $this->node = $this->xPath->query($this->path)->item(0);
        foreach( $this->node->childNodes as $child ) {
            if ($child->localName != 'host')
                $child->nodeValue = $_POST[$child->nodeName];
        }
        
        $this->xml->xml->save($this->xml->_configPath);
        echo json_encode("success");
        
    }
    
    function getFileList() {
        
        $data = array();
        foreach($this->xml->readByRoot('table') as $node) {
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
        
        echo json_encode($this->xml->readNodeByElement('table', $name));
        
    }
    
    function getServerList() {
        
        $data = array();
        foreach($this->xml->xml->getElementsByTagName('connection') as $node) {
            foreach($node->childNodes as $child) {
                if ($child->localName == 'host') {
                    $data[]['host'] = $child->nodeValue;
                }
            }
        }
        
        echo json_encode($data);
        
    }
    
    function getDatabaseList() {
        $host = $_POST['host'];
        $data = $this->xml->readNodeByElement('connection', $host);
        
        $this->db = new dbConnection($data['host'], $data['username'], $data['password'], null, $data['port']);
        
        if(mysqli_connect_error()) {
            echo json_encode(array('status'=>'error', 'err_msg'=>mysqli_connect_error()));
        } else {
           echo json_encode($this->db->jsonBuild('SHOW DATABASES', 'database', 'schema'));
        }
        
        
    }
    
    function getTableList() {
        $database = $_POST['database'];
        $host = $_POST['host'];
        $data = $this->xml->readNodeByElement('connection', $host);
        
        $this->db = new dbConnection($data['host'], $data['username'], $data['password'], $database, $data['port']);
        
        if(mysqli_connect_error()) {
            echo json_encode(array('status'=>'error', 'err_msg'=>mysqli_connect_error()));
        } else {
           echo json_encode($this->db->jsonBuild('SHOW TABLES', 'table'));
        }
        
    }

}