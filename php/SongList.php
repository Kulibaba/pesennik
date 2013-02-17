<?
require_once 'Song.php';

class SongList{
	private function getArtistSongList($no, $artistId, $pattern, $sorting){
		$query = "
			SELECT
				artist.name AS artistName,
				artist.url AS artistUrl,
				song.id,
				song.name,
				song.searchName,
				song.url,
				song.flags,
				language.url AS languageUrl,
				language.name AS languageName,
				user.name AS userName,
				user.url AS userUrl
			FROM artist
			INNER JOIN artistsong ON artistsong.artistId = artist.id
			INNER JOIN song ON artistsong.songId = song.id
			LEFT JOIN language ON language.id = song.languageId
			LEFT JOIN user ON user.id = song.userId
			WHERE artist.id = $artistId
			ORDER BY $pattern $sorting
			LIMIT 0, $no
		";
		$resultList = new SplDoublyLinkedList();
		$result = mysql_query($query,DB::getInstance());
		while($row = mysql_fetch_array ($result)){
			$song = new Song();
			$song->initListItem($row);
			$resultList->push($song);
		}
		$resultList->rewind();
		
		return $resultList;
	}
	
	private function getSongList($no, $sorting){
		$query = "
			SELECT
				artist.name AS artistName,
				artist.url AS artistUrl,
				song.id,
				song.name,
				song.searchName,
				song.url,
				song.flags
			FROM artist
			INNER JOIN artistsong ON artistsong.artistId = artist.id
			INNER JOIN song ON artistsong.songId = song.id
			ORDER BY song.id $sorting
			LIMIT 0, $no
		";

		$resultList = new SplDoublyLinkedList();
		$result = mysql_query($query,DB::getInstance());
		while($row = mysql_fetch_array ($result)){
			$song = new Song();
			$song->initListItem($row);
			$resultList->push($song);
		}
		$resultList->rewind();
		return $resultList;
	}
	function getNewSongs($no){
		return $this->getSongList($no, "ASC");
	}
	function getOldSongs($no){
		return $this->getSongList($no, "DESC");
	}
	
	function getNewArtistSongs($no, $artistId){
		return $this->getArtistSongList($no, $artistId, "song.id", "ASC");
	}
	function getOldArtistSongs($no, $artistId){
		return $this->getArtistSongList($no, $artistId, "song.id", "DESC");
	}
	function getFirstArtistSongs($no, $artistId){
		return $this->getArtistSongList($no, $artistId, "song.name", "ASC");
	}
	function getLastArtistSongs($no, $artistId){
		return $this->getArtistSongList($no, $artistId, "song.name", "DESC");
	}
}
?>