<?
require_once 'Read.php';
require_once 'Insert.php';



function moveArtists(){
/*
	oldDB -> newDB (artist)
*/	
	$read = new Read();
	$artists = $read->artists();
	$insert = new Insert();
	for($i = 0; $i <= count($artists); $i++){
		$insert->artist($artists[$i]);
	}
}
//-------------------------------------------------------------
function moveVideos(){
/*
	oldDB -> newDB (video)
*/	
	$read = new Read();
	$videos = $read->videos();
	$insert = new Insert();
	for($i = 0; $i <= count($videos); $i++){
		$insert->video($videos[$i]);
	}
}

moveVideos();
?>
