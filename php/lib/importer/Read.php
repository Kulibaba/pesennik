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
}
?>