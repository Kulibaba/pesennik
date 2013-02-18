<?
require_once '../Song.php';

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
			Интересная информация :
		</td>
		<td>
			<?php echo $song->getInfo(); ?>
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
			<?php
				echo $song->getLanguageUrl()." - ".$song->getLanguagename()."<br>";
				echo $song->getLyrics()."<br>";
				echo '<a href="'.$song->getUserUrl().'">'.$song->getUserName().'</a>';
	?>
		</td>
	</tr>
	<tr>
		<td>
			Видео:
		</td>
		<?php 
			$list = $song->getVideoList();
			while($video = $list->current()){
		?>
				<td>
					<?php
						echo $video->getData(); 
						echo $video->getVideoTypeName()."<br><b>".$video->getInfo()."</b><br>";
						echo '<a href="'.$video->getUserUrl().'">'.$video->getUserName().'</a>';
					?>
				</td>
		<?php 
			$list->next();
			}
		?>
	</tr>
	<tr>
		<td>
			Перевод:
		</td>
		<?php 
			$list = $song->getTranslateList();
			while($translate = $list->current()){
		?>
				<td>
					<?php
						echo "<b>".$translate->getName()."</b><b>".$translate->getInfo()."</b>"; 
						echo $translate->getLyrics()."<br>";
						echo '<a href="'.$translate->getUserUrl().'">'.$translate->getUserName().'</a>';
					?>
				</td>
		<?php 
			$list->next();
			}
		?>
	</tr>
<table>