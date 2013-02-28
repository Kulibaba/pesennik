<?php 
class DB{
	private static $instance;
	public $lastError = 0; // 1 - Unable to connect to MySQL; 2 - Cant select database; 
	private function getDB(){		
		$hostname = "localhost"; 
		$username = "root";	
		$passwd = "root";		
		$dbname = "pesennik_psn";
		
		$curr_result; // current result from DataBase functions

		$db=mysql_connect($hostname,$username,$passwd); //or die("Unable to connect to MySQL");
		if ($db != false)
		{
			$curr_result = mysql_select_db($dbname,$db);//or die ("Error: Cant select database");
			if ($curr_result != false)
			{
				mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
				$lastError =0;
				self::$instance = $db;
				return true; // on SUCCESS return instance of DataBase		
				
			}else{
				$lastError =2; // remember last error
				echo "Cant select database";
				return false; //Cant select database
			}
		}else{
			$lastError =1; // remember last error
			echo "Unable to connect to MySQL";
			return false; //Unable to connect to MySQL
		}
	}
	public static function getInstance(){
		if (!isset(self::$instance)){
			$temp = new DB();
			if ($temp->getDB()){
				return self::$instance;
			}else{
				return NULL;
			}
		}else{
			return self::$instance;
		}
	}
}
?>