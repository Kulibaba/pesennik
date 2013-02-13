<?php 
class DB{
	private static $instance;
	private function getDB(){		
		$hostname = "localhost"; 
		$username = "root";	
		$passwd = "";		
		$dbname = "pesennik_psn";
		

		$db=mysql_connect($hostname,$username,$passwd) or die("Unable to connect to MySQL");
		mysql_select_db($dbname,$db) or die ("Error: Cant select database");
		mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
			
		return $db;
	}
	public static function getInstance(){
		if (!isset(self::$instance)){
			$temp = new DB();
			self::$instance = $temp->getDB();
		}
		return self::$instance;
	}
}
?>