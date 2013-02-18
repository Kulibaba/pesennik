<?
require_once 'ArtistList.php';

$artistList = new ArtistList();

$list = $artistList->getFirstArtistCharacterList(10, "П");

while($artist = $list->current()){
	?>
	<table>
		<tr>
			<td>
				Имя исполнителя:
			</td>
			<td>
				<?php echo $artist->getName(); ?>
			</td>
		</tr>
		<tr>
			<td>
				Ссылка исполнителя:
			</td>
			<td>
				<?php echo $artist->getUrl(); ?>
			</td>
		</tr>
		<tr>
			<td>
				Есть фото:
			</td>
			<td>
				<?php echo $artist->isPhoto(); ?>
			</td>
		</tr>
		<tr>
			<td>
				Страна:
			</td>
			<td>
				<?php echo $artist->getCountryName()." - ".$artist->getCountryUrl(); ?>
			</td>
		</tr>
	<table>
	<hr>
<?php 
	$list->next();
}
?>