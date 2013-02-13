<?
require_once 'Song.php';

$song = new Song();
$song->initListItem(1, "linka" );
?>
	
	
<table>
	<tr>
		<td>
			Название:
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
	<tr>
		<td>
			Имя исполнителя:
		</td>
		<td>
			<?php echo $song->getArtistName(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Ссылка исполнителя:
		</td>
		<td>
			<?php echo $song->getArtistUrl(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Есть текст:
		</td>
		<td>
			<?php echo $song->isText(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Есть видео:
		</td>
		<td>
			<?php echo $song->isVideo(); ?>
		</td>
	</tr>
	
	<tr>
		<td>
			Есть перевод:
		</td>
		<td>
			<?php echo $song->isTranslate(); ?>
		</td>
	</tr>
<table>