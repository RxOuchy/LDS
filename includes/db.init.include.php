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
        if (file_exists(__DIR__ . '/../config/settings.xml')){
            $config = __DIR__ . '/../config/settings.xml';
            
            $configXML = simplexml_load_file($config);
            $host   = (string)$configXML->config->database->connection->host;
            $user   = (string)$configXML->config->database->connection->username;
            $pass   = (string)$configXML->config->database->connection->password;
            $db     = (string)$configXML->config->database->connection->database;
            $port   = (int)$configXML->config->database->connection->port;
            
            $conn = new dbConnection($host, $user, $pass, $db, $port);
        }
        
        return $conn;
    }

?>