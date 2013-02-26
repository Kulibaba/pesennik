<?php
require_once 'Song.php';
require_once 'Artist.php';
require_once 'Video.php';
require_once 'Translate.php';
require_once 'Utils.php';

function getSongUrl($songId){		
	$query = "
		SELECT 
			artist.url AS artistUrl,
			song.url
		FROM song 
		INNER JOIN artistsong ON 	song.id = artistsong.songId
		LEFT JOIN artist ON 		artistsong.artistId = artist.id
		WHERE song.id=$songId
	";

	$result = mysql_query($query,DB::getInstance());
	$row = mysql_fetch_array ($result);
	return $row["artistUrl"]."/".$row["url"];
}
function getVideoUrl($videoId){		
	$query = "
		SELECT
			artist.url AS artistUrl,
			song.url
		FROM video
		INNER JOIN song ON 			video.songId = song.id		
		INNER JOIN artistsong ON 	song.id = artistsong.songId
		LEFT JOIN artist ON 		artistsong.artistId = artist.id
		WHERE video.id ='$videoId'
	";
	
	$result = mysql_query($query,DB::getInstance());
	$row = mysql_fetch_array ($result);
	return $row["artistUrl"]."/".$row["url"];
}
function getTranslateUrl($translateId){		
	$query = "
		SELECT
			artist.url AS artistUrl,
			song.url
		FROM translate
		INNER JOIN song ON 			translate.songId = song.id		
		INNER JOIN artistsong ON 	song.id = artistsong.songId
		LEFT JOIN artist ON 		artistsong.artistId = artist.id
		WHERE translate.id ='$translateId'
	";

	$result = mysql_query($query,DB::getInstance());
	$row = mysql_fetch_array ($result);
	return $row["artistUrl"]."/".$row["url"];
}
function oldVersionSupport($param){

	$param_arr = explode("_", $param);
	$lenght = count($param_arr);
	switch($param_arr[0]){
		case "текст":{
			$result = getSongUrl($param_arr[$lenght - 1]);
			break;
		}
		case "клип":{ 
			$result = getVideoUrl($param_arr[$lenght - 1]);
			break;
		}
		case "перевод":{ 
			$result = getTranslateUrl($param_arr[$lenght - 1]);
			break;
		}
		case "новые":
		case "популярные":
		case "исполнители":{ 
			$result = $param_arr[0]."/".toLowerCase($param_arr[1]);
			break;
		}
		default:{
			break;
		}
	}
	
	
	return explode("/", $result);
}
?>