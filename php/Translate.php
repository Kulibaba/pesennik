<?
require_once 'DataBase.php';
require_once 'Utils.php';
class Translate {
	private $lyrics;
	private $languageId;
	private $languageUrl; 	// ex .ru
	private $languageName; 	// ex Русский
	private $songLanguageId;
	private $songLanguageUrl; 	// ex .ru
	private $songLanguageName; 	// ex Русский
	private $name;
	private $userName;
	private $userUrl;
	private $info;
	private $id;
	private $url;
	private $artistId;
	private $artistUrl;
	private $artistName;
	private $songUrl;
	private $songName;
	
	function Translate(){}
	
	function initListItem($row){
	/*
		@row - array, params for constructor
	*/
		$this->artistId = $row["artistId"];
		$this->artistName = $row["artistName"];
		$this->artistUrl = $row["artistUrl"];
		
		$this->songName = $row["songName"];
		$this->songUrl = $row["songUrl"];
		
		$this->lyrics = $row["lyrics"];
		$this->songLanguageId = $row["songLanguageId"];
		$this->songLanguageUrl = $row["songLanguageUrl"];
		$this->songLanguageName = $row["songLanguageName"];
		
		$this->languageId = $row["languageId"];
		$this->languageUrl = $row["languageUrl"];
		$this->languageName = $row["languageName"];
		$this->name = $row["name"];
		$this->userName = $row["userName"];
		$this->userUrl = $row["userUrl"];
		$this->info = $row["info"];
		$this->id = $row["id"];
	}
	
	function getArtistId() {
		return $this->artistId;
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
	function getLanguageId() {
		return $this->languageId;
	}
	function getLanguageName() {
		return $this->languageName;
	}
	function getLanguageUrl() {
		return $this->languageUrl;
	}
	function getSongLanguageId() {
		return $this->songLanguageName;
	}
	function getSongLanguageName() {
		return $this->songLanguageName;
	}
	function getSongLanguageUrl() {
		return $this->songLanguageUrl;
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
	function getId() {
		return $this->id;
	}
}
?>