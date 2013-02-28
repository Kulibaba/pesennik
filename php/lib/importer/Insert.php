<?php
require_once '../../Artist.php';
require_once '../../Utils.php';
require_once 'newDataBase.php';
require_once 'oldDataBase.php';

class Insert{
	function artist($row){
		$name = $row["name"];
		$url = $row["url"];
		$searchName = $row["searchName"];
		$fullNname = $row["fullName"];
		$photo = $row["photo"];
		$band = $row["band"];
		$bio = $row["bio"];
		$birthDate = $row["birthDate"];
		$deathDate = $row["deathDate"];
		$countryId = $row["countryId"];
		$birthplace = $row["birthplace"];
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
	}

}

?>