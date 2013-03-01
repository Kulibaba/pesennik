<?
require_once 'Translate.php';
require_once 'conf.php';

class TranslateList{
	public $ALL_TRANSLATES = 0;
	
	private function getArtistTranslateList($no, $artistId, $pattern, $sorting){
	/*
		used for show artist's translate list;
		@no - int, number of items in list; 0 - no LIMIT in query
		$artistId, - int, artist's id;
		@pattern - string, order's field name;
		@sorting - string, way of sorting;
	*/		
			$query = "	
			SELECT
				artist.name AS artistName,
				artist.url AS artistUrl,
				song.languageId AS songLanguageId,
				song.name AS songName,
				song.url AS songUrl,
				language.name AS languageName,
				language.url AS languageUrl,
				translate.name,
				translate.languageId
			FROM translate
			INNER JOIN song on translate.songId=song.id
			LEFT JOIN language ON		song.languageId = language.id
      INNER JOIN artistsong ON	translate.songId = artistsong.songId AND ( artistsong.artistId = $artistId)
			LEFT JOIN artist ON		artistsong.artistId = $artistId
			ORDER BY $pattern $sorting";
		
		if ($no != $ALL_TRANSLATES) { 
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

	private function getTranslateList($no, $pattern, $sorting){
	/*
		used for show video list
		@no - int, number of items in list
		@pattern - string, order's field name
		@sorting - string, way of sorting
	*/
	$query = "
			SELECT
				language.name,
				language.url
			FROM translate
			INNER JOIN song ON 			translate.songId = song.id	
			INNER JOIN artistsong ON	song.id = artistsong.songId
			LEFT JOIN artist ON			artistsong.artistId = artist.id
			LEFT JOIN language ON		song.languageId = language.id
			ORDER BY $pattern $sorting
			LIMIT 0, $no
		";
		$result = mysql_query($query,DB::getInstance());
		if ($result!= NULL){
			$i = 0;
			while($row = mysql_fetch_array ($result)){
				$songLanguage[$i]["name"] = $row["name"];
				$songLanguage[$i]["url"] = $row["url"];
				$i++;
			}
		}
		$query = "
			SELECT
				artist.id AS artistId,
				artist.name AS artistName,
				artist.url AS artistUrl,
				artist.photo AS artistPhoto,
				song.name AS songName,
				song.url AS songUrl,
				language.name AS languageName,
				language.url AS languageUrl,
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
			$i = 0;
			while($row = mysql_fetch_array ($result)){
				$row["songLanguageName"] = $songLanguage[$i]["name"];
				$row["songLanguageUrl"] = $songLanguage[$i]["url"];
				$i++;
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
	function getArtistTranslates($no,$artistId){
		return $this->getArtistTranslateList($no, $artistId, "translate.id", "ASC");
	}
}
?>