<?php
$param = explode('/',$_GET["param"]);

$PAGE_SONG = 1;
$PAGE_CLIP = 2;
$PAGE_TRANS = 3;
require 'php/web/print.php';
//require 'php/OldVersionSupport.php';

/*	BEGIN Setting "new style" URL from "old style"	*/
/*$newStyleUrl = OldVersionSupport($param[0]);
$param[0] = $newStyleUrl[0];
if ($param[1]=="")
	$param[1] = $newStyleUrl[1];
*/
/*	END Setting "new style" URL from "old style" */ 

// PAGINATION
$delta = getDelta();
if ($param[2]!=""){
	$page = $param[2];
}
else{
	$page = 1;
}
$searchTag = "";
//print_r($param);

switch($param[0]){
	case "новые":{
		switch($param[1]){
			case "песни":{
				printNewSongPage($delta,0);
				break;
			}
			case "тексты":{
				$searchTag ="Новые тексты исполнителей";
				printNewSongPage($delta, $page, $searchTag);
				
				break;
			}
			case "клипы":{
				$searchTag ="Новые клипы исполнителей";
				printNewVideoPage($delta, $page, $searchTag);
				break;
			}
			case "переводы":{
				$searchTag ="Новые переводы исполнителей";
				printNewTranslatePage($delta, $page, $searchTag);
				break;
			}
			case "исполнители":{
				$searchTag ="Новые исполнители";
				printNewArtistPage($delta, $page, $searchTag);
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
				printTopSongPage(20,0);
				break;
			}
			case "клипы":{
				printTopVideoPage(20,0);
				break;
			}
			case "переводы":{
				printTopTranslatePage(20,0);
				break;
			}
			case "исполнители":{
				printTopArtistPage(20,0);
				break;
			}
			default:{
				// reserved for album, etc.
				break;
			}
		}
		break;
	}
	case "исполнители":{
		$searchTag ="Исполнители на букву [".$param[1]."]";
		printCharArtistPage( $delta, $page, $param[1], $searchTag );
		break;
	}
	default:{
		$param[0] = urlencode($param[0]);
		$param[1] = urlencode($param[1]);
		if ($param[1] != ""){
			
			switch(urldecode($param[1]))
			{
				case "песни":{
					printArtistSCT($param[0],$PAGE_SONG);
					break;
				}
				case "клипы":{
					printArtistSCT($param[0],$PAGE_CLIP);
					break;
				}
				case "переводы":{
					printArtistSCT($param[0],$PAGE_TRANS);
					break;
				}
				default:
					printSongPage($param[0], $param[1]);
					break;
			}
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
require_once 'php/web/printEnd.php';

function getDelta(){
	$ret = 10;
	return $ret;
}
?>