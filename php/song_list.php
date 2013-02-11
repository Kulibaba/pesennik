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
		echo $query;
		$result = mysql_query($query,DB::getInstance());
		while($row = mysql_fetch_array ($result))
			$results[] = new Song($row["id"], $row["name"], $row["url"], $row["flags"],$row["artistName"], $row["artistUrl"]);
		return $results;
	}
	function getNewSongs($no, $artistId){
		return getArtistSongList($no, $artistId, "sond.id", "ASC");
	}
	
	function getOldSongs($no, $artistId){
		return getArtistSongList($no, $artistId, "sond.id", "DESC");
	}
	function getFirstSongs($no, $artistId){
		return getArtistSongList($no, $artistId, "sond.name", "ASC");
	}
	
	function getLastSongs($no, $artistId){
		return getArtistSongList($no, $artistId, "sond.name", "DESC");
	}
}
?>