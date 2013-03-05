<?php
$param = explode('/',$_GET["param"]);

$PAGE_SONG = 1;
$PAGE_CLIP = 2;
$PAGE_TRANS = 3;
require 'php/print.php';
require 'php/OldVersionSupport.php';
require_once 'php/templateBegin.php';

$test_param = $_GET["param"]; $i=1;
print_r ($_GET["param"]);
echo "<a href='".$_ROOT.$test_param."/".$i."' > 1</a>";
/*	BEGIN Setting "new style" URL from "old style"	*/
/*$newStyleUrl = OldVersionSupport($param[0]);
$param[0] = $newStyleUrl[0];
if ($param[1]=="")
	$param[1] = $newStyleUrl[1];
*/
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
				printNewTranslatePage(20,0);
				break;
			}
			case "исполнители":{
				printNewArtistPage(20,0);
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
	
	default:{
		$param[0] = urlencode($param[0]);
		$param[1] = urlencode($param[1]);
		if ($param[1] != ""){
			//song's page
			//echo "in!";
			//echo urldecode($param[1]);
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
require_once 'php/templateEnd.php';
?>