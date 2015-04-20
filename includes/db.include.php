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

	function __construct($host, $user, $pass, $db = null, $port = 3306) {
        
        $this->host = $host;
        $this->user = $user;
        $this->password = $pass;
        $this->db = $db;
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
        
        function jsonBuild( $sql, $key = null, $filter = null ) {
            $qrh = $this->query($sql) or die( $this->error . "<br>" . $sql );
            
            while ($row = $qrh->fetch_array()) {
                foreach( $row as $k=>$v ) {
                    if (isset($filter))
                        if(strpos(strtolower($v), strtolower($filter)) > 0 ) continue;
                    if (isset($key)) {
                        if( !is_numeric( $k ) ) {
                            $toret[][ $key ] = str_replace(array("\n", "\r", "\r\n"), '', $v);
                        }
                    } else {
                        $toret[ $v ] = str_replace(array("\n", "\r", "\r\n"), '', $v);
                    }
                }			
            }

            if( isset( $toret ) ) {
                    return $toret;
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
    
    function select_db($dbname) {
        parent::select_db($dbname);
    }
    
    public function type2txt($type_id) {
        static $types;

        if (!isset($types))
        {
            $types = array();
            $constants = get_defined_constants(true);
            foreach ($constants['mysqli'] as $c => $n) if (preg_match('/^MYSQLI_TYPE_(.*)/', $c, $m)) $types[$n] = $m[1];
        }
        
        return array_key_exists($type_id, $types)? $types[$type_id] : $type_id;
    }
}

?>