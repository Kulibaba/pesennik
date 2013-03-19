<?php
	require_once 'php/classes/SongList.php';
	require_once 'php/paginator/template.php';
	$ALL = 0;
function printNewSongPage($delta, $page, $searchTag, $activeMenuItem){
	/*
		@page - var for pagination. Song number form wich start showing page
	*/
	
	$sList = new SongList();
	$all_list = $sList->getNewSongs( $ALL,$ALL );
	$itemsQuantity = $all_list->count();
	$newSList = $sList->getNewSongs($delta, $page - 1);		
	/*if ($itemsQuantity > $delta){
		$newSList = $sList->getNewSongs($delta, $page - $delta);
	}else{
		$newSList = $sList->getNewSongs($delta, 0);
	}*/
	
	$TITLE = "Список всех новых песен 2013";
	require_once 'php/web/printBegin.php';
?>

	<div class="main-container" >
	<?php 
		if ($newSList != NULL)
		{
			$count_items = 0; // for correct working with paginator
			Paginate($delta, $page, $itemsQuantity, $searchTag);
			while($song = $newSList->current()){ 
			$count_items++;
			?>
				<div class="item">
					<div class="photo-small">
						<img src="<?php echo $ROOT; ?>/img/photo/small/<?php echo $song->isArtistPhoto() ? $song->getArtistId():0; ?>.jpg" alt="artist" />
					</div>
					<div class="text-middle">
						<span class="artist-name">
							<a href="<?php echo $ROOT; ?>/<?php echo $song->getArtistUrl()."/".$song->getUrl(); ?>"> 
								<?php echo $song->getArtistName().' - '.$song->getName();?>
							</a>
							
							<?php if ($song->isLyrics()){?>
							<a href="<?php echo $ROOT; ?>/<?php echo $song->getArtistUrl()."/".$song->getUrl(); ?>"><img class="icon" alt="текст" src="<?php echo $ROOT; ?>/img/icons/text.png" /></a> 
							<?php }
							
							if ($song->isVideo()){?>
							<a href="<?php echo $ROOT; ?>/<?php echo $song->getArtistUrl()."/".$song->getUrl(); ?>"><img class="icon" alt="перевод" src="<?php echo $ROOT; ?>/img/icons/translate.png" /></a> 
							<?php }
							
							 if ($song->isTranslate()){?>
							<a href="<?php echo $ROOT; ?>/<?php echo $song->getArtistUrl()."/".$song->getUrl(); ?>"><img class="icon" alt="видео" src="<?php echo $ROOT; ?>/img/icons/video.png" /></a> 
							<?php }?>
					 </span>
					</div>
				</div>
				<p class="separator"></p>
			<?php 

				if ($count_items <$delta){
					$newSList->next();
				}else{
					/* Break the while cycle, 
						 because only $delta number 
						 of items should be on page
					*/
					break; 
				}
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
	?><?php
	function printTopSongPage($delta,$page){};
	function printSongList($delta){
		printNewSongPage($delta,0);
	};
?>