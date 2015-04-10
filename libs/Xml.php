<?php

class _XML {

    public $_configPath = 'config/config.xml';
    
    function __construct() {
        
        if (file_exists($this->_configPath)) {
            $this->xml = new DomDocument();
            $this->xml->preserveWhiteSpace = false;
            $this->xml->formatOutput = true;
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
     * $element - This is part of a child node, once we find the matching name, we will gather all siblings
     * return array of siblings;
     */
    function readNodeByElement($rootNode, $element) {
        
        $data = array();
        foreach ($this->xml->getElementsByTagName($rootNode) as $node) {
            if(count($data) > 0) break;
            foreach($node->childNodes as $child) {
                if ($child->nodeValue == $element) {
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
    
    function createElement($element, $data = null) {
        $node = /*($this->xml->getElementsByTagName($element)->length == 0) ? $this->xml->createElement($element) : */$this->xml->getElementsByTagName($element);
        
        if (is_array($data)) {
            
            $connection = $this->xml->createElement('connection');
            foreach($data as $key => $value) {
                $newElement = $this->xml->createElement($key, $value);
                $connection->appendChild($newElement);
            }
            $node->appendChild($connection);
            $this->xml->save($this->_configPath);
            
        } else {
            return false;
        }
    }

}