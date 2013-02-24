<?
require_once 'DataBase.php';
require_once 'Utils.php';
require_once 'Video.php';
require_once 'Translate.php';

class Song {
	private $artistName;// array if duet
	private $artistUrl;	//
	
	private $flags;	/*	1 - has lyrics
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
	
	private $lyrics;
	
	private $translateList;	// list of translation
	
	private $videoList;		// list of video
	
	private $url;
	
	private $userId;
	private $userName;
	private $userUrl;
	
	function initListItem($row){
		$this->name = $row["name"];
		$this->url = $row["url"];
		$this->flags = $row["flags"];
		$this->artistName = $row["artistName"];
		$this->artistUrl = $row["artistUrl"];
		$this->languageUrl = $row["languageUrl"];
		$this->languageName = $row["languageName"];
		$this->userName = $row["userName"];
		$this->userUrl = $row["userUrl"];
		$this->searchName = $row["searchName"];
	}
	
	private function fillVideoList($songId){
		$query = "
			SELECT
				video.url AS videoUrl,
				video.info,
				videosite.data,
				videotype.name AS videoTypeName,
				user.name AS userName,
				user.url AS userUrl
			FROM video
			INNER JOIN videosite ON video.videoSiteId = videoSite.id
			LEFT JOIN song ON 		video.songId = song.id	
			LEFT JOIN videoType ON 	video.videoTypeId = videoType.id 
			LEFT JOIN user ON 		video.userId = user.id 
			WHERE song.id ='$songId'
		";
		
		$result = mysql_query($query,DB::getInstance());
		$resultList = new SplDoublyLinkedList();
		if ($result!= null){
			while($row = mysql_fetch_array ($result))
				$resultList->push(new Video($row));
			$resultList->rewind();
		}else{
			echo "<span style='color:red;'>ERROR! Empty var \$result in song.php at line 71 </span><br/>";
			error_log("EMPTY $result  song.php at line 71");
		}
		$this->videoList = $resultList;
		
	}
	private function fillTranslateList($songId){
		$query = "
			SELECT
				translate.lyrics,
				translate.name,
				translate.info,
				language.name AS languageName,
				language.url AS languageUrl,
				user.name AS userName,
				user.url AS userUrl
			FROM translate
			INNER JOIN song ON 		translate.songId = song.id
			LEFT JOIN language ON 	translate.languageId = language.id	
			LEFT JOIN user ON 		translate.userId = user.id 
			WHERE song.id ='$songId'
		";
		
		$result = mysql_query($query,DB::getInstance());
		$resultList = new SplDoublyLinkedList();
		if ($result!= null){
			while($row = mysql_fetch_array ($result))
				$resultList->push(new Translate($row));
			$resultList->rewind();
		}else{
			echo "<span style='color:red;'>ERROR! Empty var \$result in song.php at line 100 </span><br/>";
			error_log("EMPTY $result  song.php at line 100");
		}
		$this->translateList = $resultList;
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
				song.lyrics,
				song.url,
				song.info,
				language.name AS languageName,
				language.url AS languageUrl,
				user.name AS userName,
				user.url AS userUrl
			FROM song 
			INNER JOIN artistsong ON 	song.id = artistsong.songId
			LEFT JOIN artist ON 		artistsong.artistId = artist.id
			LEFT JOIN language ON 		song.languageId = language.id
			LEFT JOIN user ON 			song.userId = user.id
			WHERE song.url ='$url' AND artist.id = '$artistId'
		";

		$result = mysql_query($query,DB::getInstance());
		if ($result!= NULL){
		$row = mysql_fetch_array ($result);

		$this->id = $row["id"];
		$this->lyrics = $row["lyrics"];
		$this->name = $row["name"];
		$this->url = $row["url"];
		$this->artistName = $row["artistName"];
		$this->artistUrl = $row["artistUrl"];
		$this->languageName = $row["languageName"]; 
		$this->languageUrl = $row["languageUrl"];
		$this->userName = $row["userName"]; 
		$this->userUrl = $row["userUrl"];
		$this->fillVideoList($this->id);
		$this->fillTranslateList($this->id);
		$this->info = $row["info"];
		}else{
			echo "<span style='color:red;'>ERROR! Empty var \$result in song.php at line 138 </span><br/>";
			error_log("EMPTY $result  song.php at line 138");
		}
		
	}
	function isLyrics() {
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
	function getArtistSongId() {
		return $this->artistSongId;
	}
	function getArtistSongNo() {
		return $this->artistSongNo;
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
	function getLyrics() {
		return $this->lyrics;
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
	function getVideoList() {
	/* return value @SplDoublyLinkedList */
		return $this->videoList;
	}
	function getTranslateList() {
		return $this->translateList;
	}
	function getInfo() {
		return $this->info;
	}
	function getSearchName() {
		return $this->getSearchName;
	}
}
?>