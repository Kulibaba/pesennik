<?php
	// MAIN PAGE BEGIN
	include 'conf.php'; 

	require_once 'Language.php';
	// MAIN PAGE END
	
	$DELTA = 10; // for pagination
	
	require_once 'printArtistPage.php';
	require_once 'printArtistsPage.php';
	require_once 'printArtistSCT.php';
	require_once 'printMainPage.php';
	require_once 'printSongPage.php';
	require_once 'printSongsPage.php';
	require_once 'printTranslatesPage.php';
	require_once 'printVideosPage.php';
?>