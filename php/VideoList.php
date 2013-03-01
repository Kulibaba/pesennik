<?
require_once 'Video.php';
require_once 'conf.php';

class VideoList{
	public $ALL_VIDEOS = 0;
	
	private function getArtistVideoList($no, $artistId, $pattern, $sorting){
	/*
		used for show artist's song list;
		@no - int, number of items in list; 0 - no LIMIT in query
		$artistId, - int, artist's id;
		@pattern - string, order's field name;
		@sorting - string, way of sorting;
	*/		
			$query = "SELECT
			artist.name AS artistName,
				artist.url AS artistUrl,
				song.name AS songName,
				song.url AS songUrl,
				video.url AS videoUrl
			FROM video
			INNER JOIN song on video.songId=song.id
      INNER JOIN artistsong ON	video.songId = artistsong.songId AND ( artistsong.artistId = $artistId)
			LEFT JOIN artist ON			artistsong.artistId = $artistId
			ORDER BY $pattern $sorting";
		
		if ($no != $ALL_VIDEOS) { 
			$query.="LIMIT 0, $no"; 
		}

		$resultList = new SplDoublyLinkedList();		
		$result = mysql_query($query,DB::getInstance());
		if ($result!= NULL){
			while($row = mysql_fetch_array ($result)){
				$video = new Video();
				$video->initListItem($row);
				$resultList->push($video);
			}
			$resultList->rewind();
		}else{
			if ($DEBUG_MODE){echo "<span style='color:red;'>ERROR! Empty var \$result in VideoList::getArtistVideoList </span><br/>";}
			error_log("EMPTY \$result VideoList::getArtistVideoList");
		}
		return $resultList;
	}
	
	private function getVideoList($no, $pattern, $sorting){
	/*
		used for show video list
		@no - int, number of items in list
		@pattern - string, order's field name
		@sorting - string, way of sorting
	*/
		$query = "
			SELECT
				artist.name AS artistName,
				artist.url AS artistUrl,
				artist.photo AS artistPhoto,
				song.name,
				song.url AS songUrl,
				video.url AS videoUrl,
				video.info,
				videosite.data,
				videotype.name AS videoTypeName
			FROM video
			INNER JOIN song ON 			video.songId = song.id	
			INNER JOIN artistsong ON	song.id = artistsong.songId
			LEFT JOIN artist ON			artistsong.artistId = artist.id
			LEFT JOIN videosite ON		video.videoSiteId = videoSite.id
			LEFT JOIN videoType ON 		video.videoTypeId = videoType.id 
			LEFT JOIN user ON 			video.userId = user.id 
			ORDER BY $pattern $sorting
			LIMIT 0, $no
		";

		$resultList = new SplDoublyLinkedList();
		$result = mysql_query($query,DB::getInstance());
		if ($result!= NULL){
			while($row = mysql_fetch_array ($result)){
				$video = new Video();
				$video->initListItem($row);
				$resultList->push($video);
			}
			$resultList->rewind();
		}else{
			if ($DEBUG_MODE){echo "<span style='color:red;'>ERROR! Empty var \$result in VideoList::getVideoList</span><br/>";}
			error_log("EMPTY \$result VideoList::getVideoList");
		}
		return $resultList;
		
	}
	
	function getNewVideos($no){
		return $this->getVideoList($no, "video.id", "ASC");
	}
	function getOldVideos($no){
		return $this->getVideoList($no, "video.id", "DESC");
	}
	function getArtistVideos($no,$artistId){
		return $this->getArtistVideoList($no, $artistId, "video.id", "ASC");
	}
	
}
?>