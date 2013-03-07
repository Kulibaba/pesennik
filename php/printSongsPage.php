<?php
	require_once 'SongList.php';
?>

<?php	
	function printNewSongPage($no,$begin){
	/*
		@begin - var for pagination. Song number form wich start showing page
	*/
	$sList = new SongList();
	$newSList = $sList->getNewSongs($no);
		
	$TITLE = "Список всех новых песен 2013";
	require_once 'php/printBegin.php';
?>
	<div class="main-container" style="margin:20px;">
	<?php 
		if ($newSList != NULL)
		{
			while($song = $newSList->current()){ 
			?>
				<divclass="item">
					<div class="photo-small">
						<img src="../img/photo/small/<?php echo $song->isArtistPhoto()?$song->getArtistId():0; ?>.jpg" alt="artist" />
					</div>
					<divclass="text-middle">
						<span class="artist-name">
							<a href="../<?php echo $song->getArtistUrl()."/".$song->getUrl(); ?>"> 
								<?php echo $song->getArtistName().' - '.$song->getName();?>
							</a>
							
							<?php if ($song->isLyrics()){?>
							<a href="../<?php echo $song->getArtistUrl()."/".$song->getUrl(); ?>"><img class="icon" alt="текст" src="../img/icons/text.png" /></a> 
							<?php }
							
							if ($song->isVideo()){?>
							<a href="../<?php echo $song->getArtistUrl()."/".$song->getUrl(); ?>"><img class="icon" alt="перевод" src="../img/icons/translate.png" /></a> 
							<?php }
							
							 if ($song->isTranslate()){?>
							<a href="../<?php echo $song->getArtistUrl()."/".$song->getUrl(); ?>"><img class="icon" alt="видео" src="../img/icons/video.png" /></a> 
							<?php }?>
					 </span>
					</div>
				</div>
				<p class="separator"></p>
		<?php 
			$newSList->next();
			}
		}else
		{
			?>
				<p style='color:red;'>ERROR! Empty var \$newSList at print.php::printNewSongPage()</p>
			<?
		}
		?>
		<!--PAGE END-->
		</div><!--/span-->
		<?php 
	};
	?>
	
<?php
	function printTopSongPage($no,$begin){};
?>
	
<?php
	function printSongList($no){
		printNewSongPage($no,0);
	};
?>