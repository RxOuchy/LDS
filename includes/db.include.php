<?php

class dbConnection {

    public $host ="localhost";
    public $user = "root"; 
    public $password = "";
    public $db="ee11410";
    public $dbc;

	function __construct( ) {
		
		$conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        
        if(mysqli_errno($conn)){
            echo"sum error";
            
        }
        else{
           $this->dbc = $conn; // assign $con to $dbc
           echo"connected ";
        }
		
	}

	function build( $sql, $key = "number") {
	   
		$qrh = mysqli_query($sql, $this->dbc ) or die( mysqli_error() . "<br>" . $sql );
		while ($row = mysqli_fetch_array($qrh)) {
			
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


	function fetch( $sql, $refFunction = "") {
		
		$qrh = mysql_query($sql, $conn ) or die( mysql_error() . "<br>" . $sql );
		
		if( is_resource( $qrh ) ) {
			$row = mysql_fetch_array($qrh);
			return $row;
		} else {
			return null;
		}

	}

	function nor( $sql) {
		
		$qrh = mysql_query($sql, $conn ) or die(  mysql_error() . "<br>" . $sql  );
		$nor = mysql_num_rows($qrh);
		return $nor;	
	
	}

	function kimp( $theArray ) {

		if( is_array( $theArray ) ) {
			foreach( $theArray as $key=>$value ) {
				$tmpArr[] = $key;
			}
		
			return implode("','", $tmpArr);
		} else {
			return null;
		}
	
	}
}

?>