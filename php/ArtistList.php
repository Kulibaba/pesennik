<?
require_once 'Artist.php';
require_once 'conf.php';

class ArtistList{
	public $ALL_ARTISTS  = 0;
	
	private function getArtistList($no, $begin, $pattern, $sorting){
	/*
		used for show artist list
		@no - int, number of items in list
		@pattern - string, order's field name
		@sorting - string, way of sorting
	*/
		$query = "
			SELECT
				artist.id,
				artist.name,
				artist.url,
				artist.photo,
				country.name AS countryName,
				country.url AS countryUrl
			FROM artist
			LEFT JOIN country ON artist.countryId = country.id
			ORDER BY $pattern $sorting
		";
		
		if ($no != $ALL_ARTISTS) { 
			$query.="LIMIT $begin, $no"; 
		}
		
		$resultList = new SplDoublyLinkedList();
		$result = mysql_query($query,DB::getInstance());
		if ($result!= NULL){
			while($row = mysql_fetch_array ($result)){
				$artist = new Artist();
				$artist->initListItem($row);
				$resultList->push($artist);
			}
			$resultList->rewind();
		}else{
			if ($DEBUG_MODE){echo "<span style='color:red;'>ERROR! Empty var \$result in artistList.php at line 26 </span><br/>";}
			error_log("EMPTY \$result artistList.php at line 26");
		}
		return $resultList;
	}
	
	private function getArtistCharacterList($no, $begin, $character, $sorting){
	/*
		used for show artist list by first letter
		@no - int, number of items in list
		@character - string, first user's name character 
		@sorting - string, way of sorting
	*/	
		$query = "
			SELECT
				artist.id,
				artist.name,
				artist.photo,		
				artist.url,
				country.name AS countryName,
				country.url AS countryUrl
			FROM artist
			LEFT JOIN country ON artist.countryId = country.id
			WHERE artist.searchName LIKE '$character%'
			ORDER BY artist.name $sorting
		";
		
		if ($no != $ALL_ARTISTS) { 
			$query.="LIMIT $begin, $no"; 
		}

		$resultList = new SplDoublyLinkedList();
		$result = mysql_query($query,DB::getInstance());
		if ($result!= NULL){
			while($row = mysql_fetch_array ($result)){
				$artist = new Artist();
				$artist->initListItem($row);
				$resultList->push($artist);
			}
			$resultList->rewind();
		}else{
			if ($DEBUG_MODE){echo "<span style='color:red;'>ERROR! Empty var \$result in artistList.php at line 65 </span><br/>";}
			error_log("EMPTY \$result artistList.php at line 65");
		}
		return $resultList;
	}
	
	function getNewArtists($no,$page){
		return $this->getArtistList($no, $page * $no, "artist.id", "DESC");
	}
	
	function getOldArtists($no){
		return $this->getArtistList($no, $page * $no, "artist.id", "ASC");
	}
	
	function getFirstArtistCharacterList($no, $page, $character){
		return $this->getArtistCharacterList($no, $page * $no, $character, "DESC");
	}
	
	function getLastArtistCharacterList($no, $page, $character){
		return $this->getArtistCharacterList($no, $page * $no, $character, "ASC");
	}
}
?>