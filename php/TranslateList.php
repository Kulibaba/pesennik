<?
require_once 'Translate.php';
require_once 'conf.php';

class TranslateList{
	private function getTranslateList($no, $pattern, $sorting){
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
				language.name AS languageName,
				translate.name,
				translate.languageId
			FROM translate
			INNER JOIN song ON 			translate.songId = song.id	
			INNER JOIN artistsong ON	song.id = artistsong.songId
			LEFT JOIN artist ON			artistsong.artistId = artist.id
			LEFT JOIN language ON		translate.languageId = language.id
			ORDER BY $pattern $sorting
			LIMIT 0, $no
		";

		$resultList = new SplDoublyLinkedList();
		$result = mysql_query($query,DB::getInstance());
		if ($result!= NULL){
			while($row = mysql_fetch_array ($result)){
				$translate = new Translate();
				$translate->initListItem($row);
				$resultList->push($translate);
			}
			$resultList->rewind();
		}else{
			if ($DEBUG_MODE){echo "<span style='color:red;'>ERROR! Empty var \$result in artistList.php at line 26 </span><br/>";}
			error_log("EMPTY \$result artistList.php at line 26");
		}
		return $resultList;
		
	}
	
	
	function getNewTranslates($no){
		return $this->getTranslateList($no, "translate.id", "ASC");
	}
	function getOldTranslates($no){
		return $this->getTranslateList($no, "translate.id", "DESC");
	}
	
}
?>