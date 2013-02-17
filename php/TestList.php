<?
require_once 'SongList.php';

$songList = new SongList();

$list = $songList->getNewArtistSongs(2, 1);
//$list = $songList->getNewSongs(20);

while($song = $list->current()){
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
				<?php echo $song->isLyrics(); ?>
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
		
		<tr>
			<td>
				Язык:
			</td>
			<td>
				<?php echo $song->getLanguageUrl(); ?>
			</td>
		</tr>
		
		<tr>
			<td>
				Пользователь:
			</td>
			<td>
				<?php echo $song->getUserName(); ?>
			</td>
		</tr>
	<table>
	<hr>
<?php 
	$list->next();
}
?>