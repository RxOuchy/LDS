<?php

class dbConnection extends mysqli {

    private $host ="localhost";
    private $user = "root"; 
    private $password = "";
    private $db="forums";
    private $port = 3306;

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
					$toret[$row[$key]][ $k ] = $v;
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
		
		if( is_resource( $qrh ) ) {
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