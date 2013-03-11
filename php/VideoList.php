<?
require_once 'Video.php';
require_once 'conf.php';

class VideoList{
	public $ALL_VIDEOS = 0;
	
	private function getVideoList($no, $begin, $pattern, $sorting, $artistId, $condition){
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
				song.name AS songName,
				song.url AS songUrl,
				video.url AS videoUrl,
				video.info,
				videosite.data,
				videotype.name AS videoTypeName
			FROM video
			INNER JOIN song ON 			video.songId = song.id	
			INNER JOIN artistsong ON	song.id = artistsong.songId
			LEFT JOIN artist ON			artistsong.artistId = artist.id
			LEFT JOIN videosite ON		video.videoSiteId = videosite.id
			LEFT JOIN videotype ON 		video.videoTypeId = videotype.id 
			LEFT JOIN user ON 			video.userId = user.id 
			$condition
			ORDER BY $pattern $sorting
		";
		if ($no != $ALL_VIDEOS) { 
			$query.="LIMIT $begin, $no"; 
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
			if ($DEBUG_MODE){echo "<span style='color:red;'>ERROR! Empty var \$result in VideoList::getVideoList</span><br/>";}
			error_log("EMPTY \$result VideoList::getVideoList");
		}
		return $resultList;
		
	}
	
	function getNewVideos($no, $page){
		return $this->getVideoList($no, $page*$no, "video.id", "ASC", 0, "");
	}
	function getOldVideos($no, $page){
		return $this->getVideoList($no, $page*$no, "video.id", "DESC", 0, "");
	}
	function getArtistVideos($no, $artistId, $page){
		return $this->getVideoList($no, $page*$no, "video.id", "ASC", $artistId, "WHERE artistsong.artistId = $artistId");
	}
	
}
?>