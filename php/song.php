<?
class Song {

	var $artistId;
	var $artistName;
	var $artistUrl;
	
	var $duetId;
	var $duetName;
	
	var $hasText;		//
	var	$hasTranslate;	// boolean
	var	$hasVideo;		//
	
	var $id;
	
	var $name;
	
	var $languageId;
	var $languageName;
	
	var $text;
	
	var $starName;	// (artistId == 0) ? duetName : artistName
	var $starUrl;	// (artistId == 0) ? duetUrl : artistUrl
	
	var $translateName;	// array of translation names
	var $transtateText;	// array of translation texts
	
	var $videoTypeName;
	var $videoData;		// included full video frame
	
	var $url;
	
	var $userId;
	var $userName;
	
	var $userIdTranslate;
	var $userNameTranslate;
	
	var $userIdVideo;
	var $userNameVideo;
	
	function initListItem(){
		/*
			Used only for lists
		*/
		$this->id = "";
		$this->name = "";
		$this->url = "";
		$this->starName = "";
		$this->starUrl = "";
		$this->hasText = "";
		$this->hasTranslate = "";
		$this->hasVideo = "";
	}
	function initAll(){
		/*
			Used for song's pages
		*/
	}
	function getArtistId() {
		return $this->artistId;
	}
	function getArtistName() {
		return $this->artistName;
	}
	function getArtistUrl() {
		return $this->artistUrl;
	}
	function getDuetId() {
		return $this->duetId;
	}
	function getDuetName() {
		return $this->duetName;
	}
	function getId() {
		return $this->Id;
	}
	function getName() {
		return $this->name;
	}
	function getLanguageId() {
		return $this->languageId;
	}
	function getLanguageName() {
		return $this->languageName;
	}
	function getText() {
		return $this->text;
	}
	function getStarName() {
		return $this->starName;
	}
	function getStarUrl() {
		return $this->starUrl;
	}
	function getUrl() {
		return $this->url;
	}
	function getUserId() {
		return $this->userId;
	}
	function getUserName() {
		return $this->userName;
	}
}
?>