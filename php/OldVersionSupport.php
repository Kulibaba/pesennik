<?php
require_once 'Song.php';
require_once 'Artist.php';
require_once 'Video.php';
require_once 'Translate.php';
function oldVersionSupport($param){

	$param_arr = explode(" ", $param);
	
	switch($param_arr[0]){
		case "�����":{
			break;
		}
		case "����":{
			break;
		}
		case "�������":{
			break;
		}
		default:{
			break;
		}
	}
	//str_replace("�", "�", $string);
	
	
}
?>