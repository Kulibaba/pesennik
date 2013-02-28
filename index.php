<?php
$param = explode('/',$_GET["param"]);

require 'php/print.php';
require 'php/OldVersionSupport.php';
require_once 'php/templateBegin.php';

/*	BEGIN Setting "new style" URL from "old style"	*/
$newStyleUrl = OldVersionSupport($param[0]);
//$param[0] = $newStyleUrl[0];
//$param[1] = $newStyleUrl[1];
/*	END Setting "new style" URL from "old style" */ 

switch($param[0]){
	case "новые":{
		switch($param[1]){
			case "тексты":{
				printNewSongPage(20,0);
				break;
			}
			case "клипы":{
				printNewVideoPage(20,0);
				break;
			}
			case "переводы":{
				printNewTranslatePage(20);
				break;
			}
			case "исполнители":{
				printNewArtistPage(20);
				break;
			}
			default:{
				// reserved for album, etc.
				break;
			}
		}
		break;
	}
	case "популярные":{
		switch($param[1]){
			case "тексты":{
				printTopSongPage(20);
				break;
			}
			case "клипы":{
				printTopVideoPage(20);
				break;
			}
			case "переводы":{
				printTopTranslatePage(20);
				break;
			}
			case "исполнители":{
				printTopArtistPage(20);
				break;
			}
			default:{
				// reserved for album, etc.
				break;
			}
		}
		break;
	}
	default:{
		if ($param[1] != ""){
			//song's page
			printSongPage($param[0], $param[1]);
		}
		else if($param[0] != ""){
			//artist's page
			printArtistPage($param[0]);
		}else{
			printMainPage();
		}
		break;
	}
}
require_once 'php/templateEnd.php';
?>