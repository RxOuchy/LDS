<?php
/**
 *     Listrak Flat File Instalation Wizard 
 *     
 *     @category   Listrak
 *     @package    Listrak Development Services Flat File Wizard
 *     @author     Listrak Development Services <lds@listrak.com>
 *     @version    1.0.0
 */
 
 global $conn;
 
 require_once('includes/include.index.php');
 initDB();
 // $settings = new readConfig('config/settings.xml');
 // $settings->loadSettings();
 
 echo "<pre>";
 
    $settings = simplexml_load_file('config/settings.xml');
    
    $sql = 'SELECT ' . $settings->table->select . ' FROM ' . $settings->table['id'];
    
    $str = $settings->table->select;
    $arr = 
    
    $toret = $settings->table->select . "\n\r";
    
    $result = $conn->query($sql);
    while( $row = $result->fetch_array()) {
        for($i = 0; $i < $result->numFields(); $i++) {
            $toret .= $row[$i];
        }
    }
    
 
 ?>