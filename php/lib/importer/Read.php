<?
require_once 'oldDataBase.php';
require_once 'newDataBase.php';
require_once '../../Utils.php';
require_once '../../conf.php';



class Read{
	function Read(){}
	function artist($id){
		$query = "
			SELECT
				id_artist AS id,
				name_artist AS name,
				bio_artist AS bio,
				short_bio_artist AS info
			FROM artist
			WHERE id_artist ='$id'
		";

		$result = mysql_query($query,oldDB::getInstance());
		$row = mysql_fetch_array ($result);
		$row["fullName"] = $row["name"];
		$row["searchName"] = toLowerCase($row["name"]);
		$row["url"] = toLowerCase($row["name"]);
		return $row;
	}
	
}
?>