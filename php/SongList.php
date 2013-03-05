<?
require_once 'Song.php';
require_once 'conf.php';

class SongList{

	public $ALL_SONGS  = 0;
	
	private function getArtistSongList($no, $artistId, $pattern, $sorting){
	/*
		used for show artist's song list;
		@no - int, number of items in list; 0 - no LIMIT in query
		$artistId, - int, artist's id;
		@pattern - string, order's field name;
		@sorting - string, way of sorting;
	*/
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
		";
		if ($no != $ALL_SONGS) { 
			$query.="LIMIT 0, $no"; 
		}

		$resultList = new SplDoublyLinkedList();
		$result = mysql_query($query,DB::getInstance());
		if ($result!=NULL){
			while($row = mysql_fetch_array ($result)){
				$song = new Song();
				$song->initListItem($row);
				$resultList->push($song);
			}
			$resultList->rewind();
		}else{
			if ($DEBUG_MODE){echo "<span style='color:red;'>ERROR! Empty var \$result in songList.php at line 36 </span><br/>";}
			error_log("EMPTY \$result songList.php at line 36");
		}
		return $resultList;
	}
	
	private function getSongList($no, $sorting){
	/*
		Used for show song list;
		@no - int, number of items in list; 
		@sorting - string, way of sorting;
	*/
		$query = "
			SELECT
				artist.name AS artistName,
				artist.url AS artistUrl,
				artist.id AS artistId,
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
		if ($result != NULL){
			while($row = mysql_fetch_array ($result)){
				$song = new Song();
				$song->initListItem($row);
				$resultList->push($song);
			}
			$resultList->rewind();
		}else{
			if ($DEBUG_MODE){echo "<span style='color:red;'>ERROR! Empty var \$result in songList.php at line 74 </span><br/>";}
			error_log("EMPTY \$result songList.php at line 74");
		}
		return $resultList;
	}
	function getNewSongs($no){
		return $this->getSongList($no, "DESC");
	}
	function getOldSongs($no){
		return $this->getSongList($no, "ASC");
	}
	function getNewArtistSongs($no, $artistId){
		return $this->getArtistSongList($no, $artistId, "song.id", "DESC");
	}
	function getOldArtistSongs($no, $artistId){
		return $this->getArtistSongList($no, $artistId, "song.id", "ASC");
	}
	function getFirstArtistSongs($no, $artistId){
		return $this->getArtistSongList($no, $artistId, "song.name", "DESC");
	}
	function getLastArtistSongs($no, $artistId){
		return $this->getArtistSongList($no, $artistId, "song.name", "ASC");
	}
	function getArtistSongs($no,$artistId){
		return $this->getArtistSongList($no, $artistId, "song.name", "DESC");
	}
}
?>