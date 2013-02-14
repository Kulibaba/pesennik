<?php
require_once 'Song.php';
require_once 'Artist.php';
require_once 'Video.php';
require_once 'Translate.php';
function oldVersionSupport($param){

	$param_arr = explode(" ", $param);
	
	switch($param_arr[0]){
		case "текст":{
			break;
		}
		case "клип":{
			break;
		}
		case "перевод":{
			break;
		}
		default:{
			break;
		}
	}
	//str_replace("А", "а", $string);
	
	
}
?>