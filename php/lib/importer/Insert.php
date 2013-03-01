<?php
require_once '../../Artist.php';
require_once '../../Utils.php';
require_once 'newDataBase.php';

class Insert{
	function artist($row){
		$id = $row["id"];
		$name = $row["name"];
		$url = $row["url"];
		$searchName = $row["searchName"];
		$fullNname = $row["fullName"];
		$photo = $row["photo"];
		$band = $row["band"];
		$bio = $row["bio"];
		//$birthDate = $row["birthDate"];
		//$deathDate = $row["deathDate"];
		$countryId = $row["countryId"];
		//$birthplace = $row["birthplace"];
		$info = $row["info"];
	
		
		$query = "
			INSERT INTO artist 
			(
				`id`, 
				`name`, 
				`url`, 
				`searchName`, 
				`fullName`, 
				`photo`, 
				`band`, 
				`bio`, 
				`birthDate`, 
				`deathDate`, 
				`countryId`, 
				`birthplace`, 
				`info`
			) 
			VALUES 
			(
				'$id', 
				'$name', 
				'$url', 
				'$searchName', 
				'$fullNname', 
				'$photo', 
				'$band', 
				'$bio', 
				'$birthDate', 
				'$deathDate', 
				'$countryId', 
				'$birthplace', 
				'$info'
			);
		";
		$result = mysql_query($query, newDB::getInstance());
	}
	function song($row){
	}
	function translate($row){
	}
	function video($row){
		$id = $row["id"];
		$url = $row["url"];
		$songId = $row["songId"];
		$videoSiteId = $row["videoSiteId"];
		$videoTypeId = $row["videoTypeId"];
		$userId = $row["userId"];
		$info = $row["info"];
	
		$query = "
			INSERT INTO video 
			(
				`id`, 
				`url`, 
				`songId`, 
				`videoSiteId`, 
				`videoTypeId`, 
				`userId`, 
				`info`
			) 
			VALUES 
			(
				'$id', 
				'$url', 
				'$songId', 
				'$videoSiteId', 
				'$videoTypeId', 
				'$userId', 
				'$info'
			);
		";

		$result = mysql_query($query, newDB::getInstance());
	}
function translate($row){
		$id = $row["id"];
		$songId = $row["songId"];
		$name = $row["name"];
		$lyrics = $row["lyrics"];
		$userId = $row["userId"];
		$info = $row["info"];
	
		$query = "
			INSERT INTO video 
			(
				`id`, 
				`songId`, 
				`name`, 
				`lyrics`, 
				`userId`, 
				`info`
			) 
			VALUES 
			(
				'$id', 
				'$songId', 
				'$name', 
				'$lyrics', 
				'$userId', 
				'$info'
			);
		";

		$result = mysql_query($query, newDB::getInstance());
	}
}

?>