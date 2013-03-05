<?
require_once 'oldDataBase.php';
require_once '../../Utils.php';
require_once '../../conf.php';



class Read{
	function Read(){}
	function artists(){
		$query = "
			SELECT
				id_artist AS id,
				name_artist AS name,
				bio_artist AS bio,
				short_bio_artist AS info
			FROM artist
			ORDER BY id_artist
		";
		$result = mysql_query($query,oldDB::getInstance());
		while($row = mysql_fetch_array ($result)){
		
		
		$row["name"] = str_replace("'", "\'", $row["name"]);
		$row["bio"] = str_replace("'", "\'", $row["bio"]);
		$row["bio"] = str_replace("<br>", "\n", $row["bio"]);
		$row["info"] = str_replace("'", "\'", $row["info"]);
		$row["info"] = str_replace("<br>", "\n", $row["info"]);
		
		$row["fullName"] = $row["name"];
		$row["searchName"] = toSearchString($row["name"]);
		$row["url"] = toNiceUrl($row["name"]);
		$row["photo"] = '0';
		$row["band"] = '0';
		$res[] = $row;
		}
		return $res;
	}
	function songs(){
		$query = "
			SELECT
				id_artist AS artistId,
				id_song AS id,
				name_song AS name,
				text_song AS lyrics
			FROM song
			ORDER BY id_song
		";

		$result = mysql_query($query,oldDB::getInstance());
		while($row = mysql_fetch_array ($result)){
		
		if (preg_match_all('/\\(feat.([^()]*)\\)/', $row["name"], $matches))
			$row["info"] = $matches[1][0];
		
		$row["name"] = toNiceName($row["name"]);
		
		if (preg_match_all('/ \(feat.+\)/', $row["name"], $matches))
			$row["name"] = preg_replace("/ \(.+\)/","",$row["name"]);	
		
		$row["name"] = toNiceName($row["name"]);
		$row["info"] = toNiceLyrics($row["info"]);	
		$row["lyrics"] = toNiceLyrics($row["lyrics"]);	
		$row["searchName"] = toSearchString($row["name"]);
		$row["url"] = toNiceUrl($row["name"]);
		$row["flags"] = '1';
		$row["languageId"] = '0';
		$row["userId"] = '0';
		$row["artistsongId"] = '0';
		$row["no"] = '0';
		$row["songId"] = $row["id"];
		$res[] = $row;
		}
		return $res;
	}
	function videos(){
		$query = "
			SELECT
				id_song AS songId,
				id_video AS id,
				link_video AS url
			FROM video
			ORDER BY id_video
		";

		$result = mysql_query($query,oldDB::getInstance());
		while($row = mysql_fetch_array ($result)){
			$row["userId"] = 0;
			$row["videoTypeId"] = 0;
			$row["videoSiteId"] = 1;
			$res[] = $row;
		}
		return $res;
	}
	function translates(){
		$query = "
			SELECT
				id_translate AS id,
				id_song AS songId,
				name_translate AS name,
				text_translate AS lyrics
			FROM translate
			ORDER BY id_translate
		";

		$result = mysql_query($query,oldDB::getInstance());
		while($row = mysql_fetch_array ($result)){
			$row["userId"] = 0;
			$row["name"] = str_replace("'", "\'", $row["name"]);
			$row["lyrics"] = str_replace("'", "\'", $row["lyrics"]);
			$row["lyrics"] = str_replace("<br>", "\n", $row["lyrics"]);
		
			$res[] = $row;
		}
		return $res;
	}
}
?>