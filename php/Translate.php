<?
require_once 'DataBase.php';
require_once 'Utils.php';
class Translate {
	private $lyrics;
	private $languageUrl; 	// ex .ru
	private $languageName; 	// ex �������
	private $name;
	private $userName;
	private $userUrl;
	private $info;
	
	private $url;
	private $artistUrl;
	private $artistName;
	private $songUrl;
	private $songName;
	
	function Translate(){}
	
	function initListItem($row){
	/*
		@row - array, params for constructor
	*/
		$this->artistName = $row["artistName"];
		$this->artistUrl = $row["artistUrl"];
		
		$this->songName = $row["songName"];
		$this->songUrl = $row["songUrl"];
		
		$this->lyrics = $row["lyrics"];
		$this->languageUrl = $row["languageUrl"];
		$this->languageName = $row["languageName"];
		$this->name = $row["name"];
		$this->userName = $row["userName"];
		$this->userUrl = $row["userUrl"];
		$this->info = $row["info"];
	}
	function getArtistUrl() {
		return $this->artistUrl;
	}
	function getArtistName() {
		return $this->artistName;
	}
	function getSongUrl() {
		return $this->songUrl;
	}
	function getSongName() {
		return $this->songName;
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