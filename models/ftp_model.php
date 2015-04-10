<?php

class ftp_Model extends Model {

    function __construct() {
        $this->xml = new _XML();
    }
    
    function PostFormData() {        
        $this->path = "/config/ftp/server";
        $this->xPath = new DOMXPath($this->xml->xml);
        
        $this->node = $this->xPath->query($this->path)->item(0);
        foreach( $this->node->childNodes as $child ) {
            $child->firstChild->nodeValue = $_POST[$child->nodeName];
        }
        
        $this->xml->xml->save($this->xml->_configPath);
        echo json_encode("success");
        
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
        
        echo json_encode($this->xml->readNodeByElement('server', $name));
        
    }

}