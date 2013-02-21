<?php
$param = explode('/',$_GET["param"]);

require 'php/print.php';
require 'php/OldVersionSupport.php';

echo "OldVersionSupport: START!<br><b>";
echo OldVersionSupport($param[0]);
echo "</b><br>OldVersionSupport: FINISH!<br>";

switch($param[0]){
	case "новые":{
		switch($param[1]){
			case "песни":{
				printNewSongPage(20);
				break;
			}
			case "клипы":{
				printNewVideoPage(20);
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
			case "песни":{
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
		else{
			//artist's page
			printArtistPage($param[0]);
		}
		break;
	}
}
?>