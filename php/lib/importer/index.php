<?
require_once 'Read.php';
require_once 'Insert.php';



$read = new Read();

$artist = $read->artist(1);
echo toNiceUrl("!Jonny & micjael?");



$insert = new Insert();
$insert->artist($artist);
?>

<a href="<?php echo toNiceUrl("Jonn%y  micjael sss dd"); ?>">aaa</a>