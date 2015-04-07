<?php

/**
 *     Listrak Flat File Setup Wizard 
 *     
 *     @category   Listrak
 *     @package    Listrak Development Services Flat File Wizard
 *     @author     Listrak Development Services <lds@listrak.com>
 *     @version    1.0.0
 */

    function initDB() {
        global $conn;
        if (file_exists(__DIR__ . '/../config/config.xml')){
            $config = __DIR__ . '/../config/config.xml';
            
            $configXML = simplexml_load_file($config);
            $host   = (string)$configXML->database->connection->host;
            $user   = (string)$configXML->database->connection->username;
            $pass   = (string)$configXML->database->connection->password;
            $db     = (string)$configXML->database->connection->database;
            $port   = (int)$configXML->database->connection->port;
            
            $conn = new dbConnection($host, $user, $pass, $db, $port);
        }
        
        return $conn;
    }

?>