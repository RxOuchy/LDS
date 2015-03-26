<?php

    function initDB() {
        global $conn;
    
        if (file_exists('config/config.xml')){
            
            $config = 'config/config.xml';
            
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