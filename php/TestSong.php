<?
require_once 'Song.php';

$song = new Song();
$song->initAll(1, "linka" );
?>
	
<style>
*{
	border:1px solid red;
}
</style>	
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
			Текст:
		</td>
		<td>
			<?php echo $song->getText(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Видео:
		</td>
		<td>
			<?php echo $song->getVideoData(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Видео тип:
		</td>
		<td>
			<?php echo $song->getVideoTypeName(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Перевод:
		</td>
		<td>
			<?php echo $song->getTranslate(); ?>
		</td>
	</tr>
<table>