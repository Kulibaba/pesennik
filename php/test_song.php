<?
require_once 'song.php';
require_once 'string.php';

$song = new Song(1);
?>
	
	
<table>
	<tr>
		<td>
			Имя:
		</td>
		<td>
			<?php echo $song->getName(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Ссылка:
		</td>
		<td>
			<?php echo $song->getUrl(); ?>
		</td>
	</tr>
<table>