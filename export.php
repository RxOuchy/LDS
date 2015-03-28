<?php
    /**
     *     Listrak Flat File Instalation Wizard 
     *     
     *     @category   Listrak
     *     @package    Listrak Development Services Flat File Wizard
     *     @author     Listrak Development Services <lds@listrak.com>
     *     @version    1.0.0
     */
    
    ini_set('display_errors', '1');
    error_reporting(-1);
    global $conn;
    
    try {
        require_once(__DIR__ . '/includes/include.index.php');
        initDB();
        
        $export = new exportProcess(__DIR__ . '/config/settings.xml');
        isset($argv) ? $argv : $argv = '';
        $table = $export->loadSettings($argv);

        foreach ($table as $key => $value) {
            $data = $export->getFileData($key, $value);
            $run = $export->generateOutput($key, $data);
        }
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }

 ?>