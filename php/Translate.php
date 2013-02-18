<?
require_once 'DataBase.php';
require_once 'Utils.php';
class Translate {
	private $lyrics;
	private $languageUrl;
	private $languageName;
	private $name;
	private $userName;
	private $userUrl;
	private $info;
	
	function Translate($row){
	/*
		@row - array, params for constructor
	*/
		$this->lyrics = $row["lyrics"];
		$this->languageUrl = $row["languageUrl"];
		$this->languageName = $row["languageName"];
		$this->name = $row["name"];
		$this->userName = $row["userName"];
		$this->userUrl = $row["userUrl"];
		$this->info = $row["info"];
	}
	function getLyrics() {
		return $this->lyrics;
	}
	function getLanguageName() {
		return $this->languageName;
	}
	function getLanguageUrl() {
		return $this->languageUrl;
	}
	function getName() {
		return $this->name;
	}
	function getUserName() {
		return $this->userName;
	}
	function getUserUrl() {
		return $this->userUrl;
	}
	function getInfo() {
		return $this->info;
	}
}
?>