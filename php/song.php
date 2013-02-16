<?
require_once 'DataBase.php';
require_once 'Utils.php';
require_once 'Video.php';
class Song {

	private $artistName;// array if duet
	private $artistUrl;	//
	
	private $duetId;

	private $flags;	/*	1 - has text
						2 - has video
						4 - has translate
						8 - has accords
						16 - has mp3
						32 - has karaoke
						64 - has phonogram
						128 - reserved
					*/
	private $id;
	
	private $name;
	
	private $languageId;
	private $languageName;
	private $languageUrl;
	
	private $text;
	
	private $translateName;	// array of translation names
	private $transtateText;	// array of translation texts
	
	private $videoTypeName;
	private $videoData;		// included full video frame
	
	private $url;
	
	private $userId;
	private $userName;
	private $userUrl;
	
	private $userIdTranslate;
	private $userNameTranslate;
	
	private $userIdVideo;
	private $userNameVideo;
	function initListItem($row){
		$this->id = $row["id"];
		$this->name = $row["name"];
		$this->url = $row["url"];
		$this->flags = $row["flags"];
		$this->artistName = $row["artistName"];
		$this->artistUrl = $row["artistUrl"];
		$this->languageUrl = $row["languageUrl"];
		$this->languageName = $row["languageName"];
		$this->userName = $row["userName"];
		$this->userUrl = $row["userUrl"];
	}
	//function Song(){}
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
		//while($row = mysql_fetch_array ($result))
			//$resultList->push(new Video(str_replace("URL", $row["videoUrl"], $row["data"]), "111");
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
				song.id, song.name,
				song.url,
				video.url AS videoUrl,
				videoType.name AS videoTypeName FROM song 
			INNER JOIN artistsong ON artistsong.songId = song.id
			LEFT JOIN artist ON artistsong.artistId = artist.id
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
		return ($this->flags & 2)!=0;
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
	function getLanguageUrl() {
		return $this->languageUrl;
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
	function getUserUrl() {
		return $this->userUrl;
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