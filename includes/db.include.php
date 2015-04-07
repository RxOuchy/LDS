<?php

/**
 *     Listrak Flat File Setup Wizard 
 *     
 *     @category   Listrak
 *     @package    Listrak Development Services Flat File Wizard
 *     @author     Listrak Development Services <lds@listrak.com>
 *     @version    1.0.0
 */
 
class dbConnection extends mysqli {

    private $host       ="localhost";
    private $user       = "root"; 
    private $password   = "";
    private $db         = "database";
    private $port       = 3306;

	function __construct($host, $user, $pass, $db, $port) {
        
        if (isset($host))
            $this->host = $host;
        if (isset($user))
            $this->user = $user;
        if (isset($pass))
            $this->password = $pass;
        if (isset($db))
            $this->db = $db;
        if (isset($port))
            $this->port = (int)$port;
                    
		parent::__construct($this->host, $this->user, $this->password, $this->db, $this->port);
        
        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
		
	}

	function build( $sql, $key = "id") {
		$qrh = $this->query($sql) or die( $this->error . "<br>" . $sql );
        
		while ($row = $qrh->fetch_array()) {
			foreach( $row as $k=>$v ) {
				if( !is_numeric( $k ) ) {
					$toret[$row[$key]][ $k ] = str_replace(array("\n", "\r", "\r\n"), '', $v);
				}
			}			
		}
		
		if( isset( $toret ) ) {
			return $toret;
		} else {
			return null;
		}

	}

	function fetch($sql) {
		
		$qrh = $this->query($sql) or die( $this->error . "<br>" . $sql );
		
		if( $qrh ) {
			$row = $qrh->fetch_array();
			return $row;
		} else {
			return null;
		}

	}
    
    function getTables() {
        $results = $this->query('SHOW TABLES');
        while ($row = $results->fetch_array()) {
            $toret[] = $row[0];
        }
        return $toret;
    }
}

?>