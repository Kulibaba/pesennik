<?
require_once 'DataBase.php';
require_once 'Utils.php';
require_once 'conf.php';

class Artist {

	private $id;
	private $name;
	private $nameCharacter;
	private $url;	//result urlencode($name)
	private $band;	// true - band, false - single 
	private $bio;
	private $photo; // true has photo
	private $birthDate;
	
	private $deathDate;
	private $countryName;	 	 	 	 	 		
	private $countryUrl;		 	 	 	 	 	 		

	private $birthplace;
	
	private $songNo;
	private $translateNo;
	private $videoNo;
	
	function Artist(){}
	
	function initListItem($row){
		/*
			Used only for lists
			$row - array, params for constructor
		*/
		$this->name = $row["name"];
		$this->searchName = $row["searchName"];
		$this->url = $row["url"];
		$this->photo = $row["photo"];
		$this->countryName = $row["countryName"];
		$this->countryUrl = $row["countryUrl"];
	}
	
	function initAll($url){
		/*
			Used for artist's pages
			$url - string, unique artist's url 
		*/
		
		$query = "
			SELECT
				artist.id,
				artist.name,
				artist.url,
				artist.bio,
				artist.photo,
				artist.birthDate,
				artist.deathDate,
				artist.birthplace,
				artist.band,
				artist.info,
				country.name AS countryName,
				country.url AS countryUrl,
				count(song.id) AS songNo,
				count(translate.id) AS translateNo,
				count(video.id) AS videoNo
			FROM artist
			LEFT JOIN country ON 	artist.countryId = country.id
			LEFT JOIN artistsong ON artistsong.artistId = artist.id
			LEFT JOIN song ON 		artistsong.songId = song.id
			LEFT JOIN video ON 		(artist.id = artistsong.artistId) AND song.id = video.songId
			LEFT JOIN translate ON 	(artist.id = artistsong.artistId) AND song.id = translate.songId
			WHERE artist.url ='$url'
		";
		
		$result = mysql_query($query,DB::getInstance());
		if ($result!= null){
			$row = mysql_fetch_array ($result);

			$this->id = $row["id"];
			$this->name = $row["name"];
			$this->nameCharacter = toLowerCase(substr($row["name"], 0, 2));
			$this->url = $row["url"];
			$this->bio = $row["bio"];
			$this->photo = $row["photo"];
			$this->birthDate = getFullDate($row["birthDate"]);
			$this->deathDate = getFullDate($row["deathDate"]);
			$this->band = ($row["band"] != 0) ? true : false;
			$this->countryName = $row["countryName"];
			$this->countryUrl = $row["countryUrl"];
			$this->birthplace = $row["birthplace"];		
			$this->songNo = $row["songNo"];
			$this->translateNo = $row["translateNo"];
			$this->videoNo = $row["videoNo"];
			$this->info = $row["info"];
		}else{
			if ($DEBUG_MODE){	echo "<span style='color:red;'>ERROR! Empty var \$result in artist.php at line 73 </span><br/>";}
			error_log("EMPTY $result  artist.php at line 73");
		}

	}
	function getId() {
		return $this->id;
	}
	function getSongNo() {
		return $this->songNo;
	}
	function getTextNo() {
		return $this->textNo;
	}
	function getVideoNo() {
		return $this->videoNo;
	}
	function getTranslateNo() {
		return $this->translateNo;
	}
	function getCountryName() {
		return $this->countryName;
	}
	function getCountryUrl() {
		return $this->countryUrl;
	}
	function getName() {
		return $this->name;
	}
	function getNameCharacter() {
		return $this->nameCharacter;
	}
	function getUrl() {
		return $this->url;
	}
	function getBio() {
		return $this->bio;
	}
	function isPhoto() {
		return $this->photo;
	}
	function getBirthDate() {
		return $this->birthDate;
	}
	function getDeathDate() {
		return $this->deathDate;
	}
	function isBand() {
		return $this->band;
	}
	function getBirthplace() {
		return $this->birthplace;
	}
	function getInfo() {
		return $this->info;
	}
	function getSearchName() {
		return $this->getSearchName;
	}
	
	function getSongListURL(){
	/* Function returns URL to page with 
	 * list of artist songs.  (ex. pesennik.org/Ani_Lorak/Songs )
	 */
	}
	function getAlbumListURL(){
	/* Function returns URL to page with 
	 * list of artist albums. (ex. pesennik.org/Ani_Lorak/Albums )
	 */
	}
}
?>