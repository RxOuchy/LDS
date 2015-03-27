<?php

/**
 *     Listrak Flat File Instalation Wizard 
 *     
 *     @category   Listrak
 *     @package    Listrak Development Services Flat File Wizard
 *     @author     Listrak Development Services <lds@listrak.com>
 *     @version    1.0.0
 */
 
class exportProcess {
    
    private $conf;
    private $settings;
    private $file;
    private $fileName;
    private $fh;
    
    function __construct($config) {
        $this->conf = simplexml_load_file($config);
        $this->settings = $this->conf->xpath('//database/table');
    }
    
    function loadSettings($arguments) {
        $settings = array();
        
        if (is_array($arguments) && count($arguments) > 1) {
            for($i = 1; $i < count($arguments); $i++) {
                $settings[$arguments[$i]] = $this->getSettingsByType($arguments[$i]);
            }
        } else {
            $settings = $this->settings;
        }
        return $settings;
    }
    
    function getSettingsByType($fileType) {    
        $settings = $this->settings;
        foreach ($settings as $k => $v) {
            $table[(string)$v->file] = $v;
        }
        
        return $table[$fileType];
        
    }
    
    function getFileData($fileType, $obj) {
        global $conn;
        $sql = 'SELECT ' . (string)$obj->select . ' FROM ' . (string)$obj['id'];
        $k = (string)$obj->key;
        $result = $conn->build($sql, $k);
        return $result;
    }
    
    function generateOutput($fileType, $array) {
        
        $this->file     = dirname(__DIR__) . DIRECTORY_SEPARATOR .'export' . DIRECTORY_SEPARATOR . $fileType . ".txt";
        $this->fileName = "LDS_Export_" . $fileType . ".txt";
        
        if (count($array) > 0) {
            $this->fh = fopen($this->file, 'w');
            $csvdata[] = array_keys($array[1]);
            foreach($array as $data) {
                $csvdata[] = $data;
            }
            
            foreach( $csvdata as $csv ) {
                $this->fputcsv_eol($this->fh, $csv, '|', '"');
            }
            
            fclose($this->fh);
        }
        
        if (count($csvdata) > 0)
            return $this->_sendFiles($csvdata);
        
    }
    
    function fputcsv_eol($handle, $array, $delimiter = '|', $enclosure = '"', $eol = "\r\n") {
		$return = fputcsv($handle, $array, $delimiter, $enclosure);
		if($return !== FALSE && "\n" != $eol && 0 === fseek($handle, -1, SEEK_CUR)) {
			fwrite($handle, $eol);
		}
		return $return;
	}
    
    function _sendFiles() {
        $ftpUser    = $this->conf->ftp->username;
        $ftpPass    = $this->conf->ftp->password;
        $host       = $this->conf->ftp->host;
        $conn_id = ftp_connect($host) or die("<h2>FTP connection failed for: $host!</h2>");
        $login_result = ftp_login($conn_id, $ftpUser, $ftpPass) or die("<h2>FTP Login failed!</h2>");
    
        // Check FTP Connection
        if ((!$conn_id) || (!$login_result)) {
            echo 'No Connection';
            die();
        }
        
        if ($login_result) {
            if(ftp_put($conn_id, $this->fileName, $this->file, FTP_BINARY)) {
                return true;
            } 
        }
        return false; 
        
    }
    
}

?>