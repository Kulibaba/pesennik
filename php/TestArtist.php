<?
require_once 'Song.php';
require_once 'Artist.php';

$artist = new Artist();
$artist->initAll("ani_lorak");
?>
	
	
<table>
	<tr>
		<td>
			Имя:
		</td>
		<td>
			<?php echo $artist->getName(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Буква:
		</td>
		<td>
			<?php echo $artist->getNameCharacter(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Фото:
		</td>
		<td>
			<?php echo $artist->isPhoto(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Ссылка:
		</td>
		<td>
			<?php echo $artist->getUrl(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Группа:
		</td>
		<td>
			<?php echo $artist->isBand(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Биография:
		</td>
		<td>
			<?php echo $artist->getBio(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Дата рождения:
		</td>
		<td>
			<?php echo $artist->getBirthDate(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Дата распада:
		</td>
		<td>
			<?php echo $artist->getDeathDate(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Страна:
		</td>
		<td>
			<?php echo $artist->getCountryName(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Ссылка для страны:
		</td>
		<td>
			<?php echo $artist->getCountryUrl(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Интересная информация :
		</td>
		<td>
			<?php echo $artist->getInfo(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Место рождения:
		</td>
		<td>
			<?php echo $artist->getBirthplace(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Колво песен:
		</td>
		<td>
			<?php echo $artist->getSongNo(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Кол-во видео:
		</td>
		<td>
			<?php echo $artist->getVideoNo(); ?>
		</td>
	</tr>
	<tr>
		<td>
			Кл-во переводов :
		</td>
		<td>
			<?php echo $artist->getTranslateNo(); ?>
		</td>
	</tr>
	<table>