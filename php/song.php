<?
require_once 'DataBase.php';
require_once 'Utils.php';
require_once 'Video.php';
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
	/*function Song($newId, $newName, $newUrl, $newFlags, $newArtistName, $newArtistUrl){
		$this->id = $newId;
		$this->name = $newName;
		$this->url = $newUrl;
		$this->flags = $newFlags;
		$this->artistName = $newArtistName;
		$this->artistUrl = $newArtistUrl;
	}
	*/
	function initListItem($artistId, $url){
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
			WHERE song.url ='$url' AND artist.id = '$artistId'
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
	function getUrlById($id){
		/*
			Used only for lists
		*/
			
		$query = "
			SELECT
				artist.url AS artistUrl,
				song.url AS songUrl
			FROM song
			LEFT JOIN artist ON song.artistId = artist.id
			WHERE song.id ='$id'
		";
		
		$result = mysql_query($query,DB::getInstance());
		$row = mysql_fetch_array ($result);

		return $row["artistUrl"]."/".$row["songUrl"];
	}
	private function getVideoList($songId){
		$query = "
			SELECT
				video.url AS videoUrl,
				video.data
			FROM video
			LEFT JOIN song ON song.id = video.songId
			WHERE song.id ='$songId'
		";
		//	videoType.name AS videoTypeName
			
		
		echo $query;
		$result = mysql_query($query,DB::getInstance());
		$resultList = new SplDoublyLinkedList();
		while($row = mysql_fetch_array ($result))
			$resultList->push(new Video(str_replace("URL", $row["videoUrl"], $row["data"]), "111");
		$resultList->rewind();
		return $resultList;
}
	function initAll($artistId, $url){
		/*
			Used for song's pages
		*/
		
		$query = "
			SELECT
				artist.name AS artistName,
				artist.url AS artistUrl,
				song.id,
				song.name,
				song.url,
				video.url AS videoUrl,
				videoType.name AS videoTypeName
			FROM song
			LEFT JOIN artist ON song.artistId = artist.id
			LEFT JOIN video ON song.id = video.songId
			LEFT JOIN videoSite ON video.videoSiteId = videoSite.id
			LEFT JOIN videoType ON video.videoTypeId = videoType.id
			WHERE song.url ='$url' AND artist.id = '$artistId'
		";
		
		
		echo $query;
		$result = mysql_query($query,DB::getInstance());
		$row = mysql_fetch_array ($result);

		$this->id = $row["id"];
		$this->name = $row["name"];
		$this->url = $row["url"];
		$this->videoData = str_replace("URL", $row["videoUrl"], $row["videoSiteData"]);
		$this->videoTypeName = $row["videoTypeName"];
		$this->artistName = $row["artistName"];
		$this->artistUrl = $row["artistUrl"];
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
	
	
	function getVideoData() {
		return $this->videoData;
	}
	
	function getVideoTypeName() {
		return $this->videoTypeName;
	}
	function getTranslate() {
		return $this->videoData;
	}
}
?>