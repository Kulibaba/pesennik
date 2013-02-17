<?
require_once 'Artist.php';

class ArtistList{
	private function getArtistList($no, $pattern, $sorting){
		$query = "
			SELECT
				artist.name,
				artist.searchName,
				artist.url,
				artist.photo,
				country.name AS countryName,
				country.url AS countryUrl
			FROM artist
			LEFT JOIN country ON artist.countryId = country.id
			ORDER BY $pattern $sorting
			LIMIT 0, $no
		";
		$resultList = new SplDoublyLinkedList();
		$result = mysql_query($query,DB::getInstance());
		while($row = mysql_fetch_array ($result)){
			$artist = new Artist();
			$artist->initListItem($row);
			$resultList->push($artist);
		}
		$resultList->rewind();
		
		return $resultList;
	}
	
	private function getArtistCharacterList($no, $character, $sorting){
		$query = "
			SELECT
				artist.name,
				artist.searchName,
				artist.url,
				artist.photo,
				country.name AS countryName,
				country.url AS countryUrl
			FROM artist
			LEFT JOIN country ON artist.countryId = country.id
			WHERE artist.searchName LIKE '$character%'
			ORDER BY artist.name $sorting
			LIMIT 0, $no
		";

		$resultList = new SplDoublyLinkedList();
		$result = mysql_query($query,DB::getInstance());
		while($row = mysql_fetch_array ($result)){
			$artist = new Artist();
			$artist->initListItem($row);
			$resultList->push($artist);
		}
		$resultList->rewind();
		
		return $resultList;
	}
	function getNewArtists($no){
		return $this->getArtistList($no, "artist.id", "ASC");
	}
	function getOldArtists($no){
		return $this->getArtistList($no, "artist.id", "DESC");
	}
	
	function getFirstArtistCharacterList($no, $character){
		return $this->getArtistCharacterList($no, $character, "ASC");
	}
	function getLastArtistCharacterList($no, $character){
		return $this->getArtistCharacterList($no, $character, "DESC");
	}
}
?>