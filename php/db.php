<?php 
class DB{
	private static $instance;
	private function getDB(){		
		$hostname = ""; //
		$username = "";	// set data
		$passwd = "";	// (ask Kulibaba)
		$dbname = "";	//
		

		$db=mysql_connect($hostname,$username,$passwd) or die("?? ???? ??????? ??????????");
		mysql_select_db($dbname,$db) or die ("?????? ?????????? ? ??");
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