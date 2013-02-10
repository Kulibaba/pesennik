<?
require_once 'db.php';
require_once 'string.php';
class Song {

	var $artistName;// array if duet
	var $artistUrl;	//
	
	var $duetId;

	var $flags;	/*	1 - has text
					2 - has video
					4 - has translate
					8 - has accords
					16 - has mp3
					32 - has karaoke
					64 - reserved
					128 - reserved
				*/
	
	var $id;
	
	var $name;
	
	var $languageId;
	var $languageName;
	
	var $text;
	
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
	
	function initListItem($id){
		/*
			Used only for lists
		*/
			
		$query = "
			SELECT
				artist.name AS artistName,
				artist.url AS artistUrl,
				song.id,
				song.name,
				song.url,
				song.flags
			FROM song
			LEFT JOIN artist ON song.artistId = artist.id
			WHERE song.id ='$id'
		";
		
		$result = mysql_query($query,DB::getInstance());
		$row = mysql_fetch_array ($result);

		$this->id = $row["id"];
		$this->name = $row["name"];
		$this->url = $row["url"];
		$this->flags = $row["flags"];
		$this->artistName = $row["artistName"];
		$this->artistUrl = $row["artistUrl"];
	}
	function initAll(){
		/*
			Used for song's pages
		*/
	}
	
	
	
	function isText() {
		return ($this->flags & 1)!=0;
	}
	function isVideo() {
		return ($this->flags && 2)!=0;
	}
	function isTranslate() {
		return ($this->flags & 4)!=0;
	}
	function isAccords() {
		return ($this->flags & 8)!=0;
	}
	function isFile() {
		return ($this->flags & 16)!=0;
	}
	function isKaraoke() {
		return ($this->flags & 32)!=0;
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