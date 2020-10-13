<?php
	
global $db_host;
global $db_database;
global $db_user;
global $db_pass;
	
class db_connector {
	var $conn;
	function db_connector($db_host="",$db_database="",$db_user="",$db_pass="") {
		if ($db_database == "") {
			$db_database = "condurre_user_portal";
		}
		if ($db_user == "") {
			$db_user = "root";
		}
		if ($db_pass == "") {
			$db_pass = "";  
		}	
		if ($db_host == "") {
			$db_host = "localhost";  
		}	
		$this->db_host = $db_host;
		$this->db_database = $db_database;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
	}
	
	function connect() {
                $this->conn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_database);
                return $this->conn;
	}


	function close() {
	  if ($this->conn) {
            mysql_close($this->conn);
          } 
	}
}
?>
