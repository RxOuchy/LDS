<?php

class _XML {

    private $_configPath = 'config/config.xml';
    
    function __construct() {
        
        if (file_exists($this->_configPath)) {
            $this->xml = new DomDocument();
            $this->xml->load($this->_configPath);
        }
        
    }
    
    /*
     * function readByRoot( $rootNode )
     * $rootNode - pass in the root node you which to grab data from
     * return DOMNodeList object of containing data;
     */
    function readByRoot($rootNode) {
        
        return $this->xml->getElementsByTagName($rootNode);
        
    }
    
    /*
     * function readNodeByName( $rootName, $name )
     * $rootNode - pass in the root node you which to grab data from
     * $name - This is part of a child node, once we find the matching name, we will gather all siblings
     * return array of siblings;
     */
    function readNodeByName($rootNode, $name) {
        
        $data = array();
        foreach ($this->xml->getElementsByTagName($rootNode) as $node) {
            if(count($data) > 0) break;
            foreach($node->childNodes as $child) {
                if ($child->nodeValue == $name) {
                    if(count($data) <= 0) {
                        $data = $node;
                        break;
                    }
                }
            }
        }
        
        foreach ($data->childNodes as $elems) {
            if(isset($elems->localName)) {
                $ret[$elems->localName] = $elems->nodeValue;
            }
        }
        
        return $ret;
        
    }

}

?>