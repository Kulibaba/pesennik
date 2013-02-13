<?
require_once 'song.php';

class SongList{
	private function getArtistSongList($no, $artistId, $pattern, $sorting){
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
			WHERE artist.id = $artistId
			ORDER BY $pattern $sorting
			LIMIT 0, $no
		";
		$resultList = new SplDoublyLinkedList();
		$result = mysql_query($query,DB::getInstance());
		while($row = mysql_fetch_array ($result))
			$resultList->push( new Song($row["id"], $row["name"], $row["url"], $row["flags"],$row["artistName"], $row["artistUrl"]));
		$resultList->rewind();
		return $resultList;
	}
	function getNewSongs($no, $artistId){
		return $this->getArtistSongList($no, $artistId, "song.id", "ASC");
	}
	
	function getOldSongs($no, $artistId){
		return $this->getArtistSongList($no, $artistId, "song.id", "DESC");
	}
	function getFirstSongs($no, $artistId){
		return $this->getArtistSongList($no, $artistId, "song.name", "ASC");
	}
	
	function getLastSongs($no, $artistId){
		return $this->getArtistSongList($no, $artistId, "song.name", "DESC");
	}
}
?>