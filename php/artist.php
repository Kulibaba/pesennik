<?
require_once 'db.php';
class Song {

	var $id;
	var $name;
	var $nameCharacter;
	var $url;
	var $band;
	var $bio;
	var $birthDate;
	
	var $deathDate;
	var $country;		 	 	 	 	 	 		
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
	function initAll($id){
		/*
			Used for song's pages
		*/
		
		$query = "	SELECT *
					FROM artist
					WHERE id = '$id'
				";
		
		$result = mysql_query($query,DB::getInstance());
		$row = mysql_fetch_array ($result);

		$this->id = $row["id"];
		$this->name = $row["name"];
		$this->url = $row["url"];
		$this->bio = $row["bio"];
		$this->birthDate = $row["birth_date"];
		$this->deathDate = $row["death_date"];
		$this->band = $row["band"];
		$this->country = $row["country"];
		$this->birthPlace = $row["birth_place"];
		// TODO: add all  properties
	}
}
?>