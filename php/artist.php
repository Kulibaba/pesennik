<?
require_once 'db.php';
require_once 'string.php';

class Artist {

	var $id;
	var $name;
	var $nameCharacter;
	var $url;
	var $band;
	var $bio;
	var $birthDate;
	
	var $deathDate;
	var $countryName;		 	 	 	 	 	 		
	var $countryUrl;		 	 	 	 	 	 		

	var $birthplace;
	
	var $songNo;
	var $translateNo;
	var $videoNo;
	
	function initListItem(){
		/*
			Used only for lists
		*/
		$this->id = "";
		$this->name = "";
		$this->url = "";
	}
	function Artist($id){
		/*
			Used for song's pages
		*/
		
		$query = "
			SELECT
				artist.*,
				country.name AS countryName,
				country.url AS countryUrl,
				count(song.id) AS songNo,
				count(translate.id) AS translateNo,
				count(video.id) AS videoNo
			FROM artist
			LEFT JOIN country ON artist.birthCountryId = country.id
			LEFT JOIN song ON artist.id = song.artistId
			LEFT JOIN video ON (artist.id = song.artistId) AND song.id = video.songId
			LEFT JOIN translate ON (artist.id = song.artistId) AND song.id = translate.songId
			WHERE artist.id ='$id'
		";
		
		$result = mysql_query($query,DB::getInstance());
		$row = mysql_fetch_array ($result);

		$this->id = $row["id"];
		$this->name = $row["name"];
		$this->nameCharacter = toLowerCase(substr($row["name"], 0, 2));
		$this->url = $row["url"];
		$this->bio = $row["bio"];
		$this->birthDate = getFullDate($row["birthDate"]);
		$this->deathDate = getFullDate($row["deathDate"]);
		$this->band = ($row["band"] != 0) ? true : false;
		$this->countryName = $row["countryName"];
		$this->countryUrl = $row["countryUrl"];
		$this->birthplace = $row["birthplace"];		
		$this->songNo = $row["songNo"];
		$this->translateNo = $row["translateNo"];
		$this->videoNo = $row["videoNo"];
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
	function getBirthDate() {
		return $this->birthDate;
	}
	function getDeathDate() {
		return $this->deathDate;
	}
	function isBand() {
		return $this->band;
	}
	function getBithCountry() {
		return $this->BirthCountry;
	}
	function getBirthplace() {
		return $this->birthplace;
	}
	
}
?>