<?

set_time_limit(0);
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
function moveSongs(){
/*
	oldDB -> newDB (song)
*/	
	$read = new Read();
	$songs = $read->songs();
	$insert = new Insert();
	for($i = 0; $i <= count($songs); $i++){
		$insert->song($songs[$i]);
		$insert->artistsong($songs[$i]);
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
//-------------------------------------------------------------
function moveTranslates(){
/*
	oldDB -> newDB (translate)
*/	
	$read = new Read();
	$translates = $read->translates();
	$insert = new Insert();
	for($i = 0; $i <= count($translates); $i++){
		$insert->translate($translates[$i]);
	}
}
moveSongs();


?>
