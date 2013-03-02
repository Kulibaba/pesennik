<?php
require_once 'DataBase.php';
require_once 'Utils.php';
class Language {
	private $id;
	private $name;
	private $url;
	
	function Language(){}
	
	function initListItem($row){
	/*	@row - array, params for constructor	*/
		//print_r($row);
		$this->name = $row["name"];
		$this->url = $row["url"];
		$this->id = $row["id"];
	}
	
	function getLanguageById($langId){
	/*
		Func returns language by it's id [$langId]
		@$langId - int, language identifier
	*/		
			$query = "	
				SELECT
				*
				FROM language
				WHERE language.id = $langId";
				
		$result = mysql_query($query,DB::getInstance());
		if ($result!= NULL){
			$row = mysql_fetch_array ($result);
			$lang = new Language();
			$lang->initListItem($row);
		}else{
			if ($DEBUG_MODE){echo "<span style='color:red;'>ERROR! Empty var \$result in Language::getLanguageById </span><br/>";}
			error_log("EMPTY \$result Language::getLanguageById");
		}
		return $lang;
	}
	
	function getId() {
		return $this->id;
	}
	function getName() {
		return $this->name;
	}
	function getUrl() {
		return $this->url;
	}
}
?>