<?php
function printArtistHeader($artist, $contentName, $count){
?>
	<div class="photo-small">
		<img src="../img/photo/small/<?php echo $artist->isPhoto()?$artist->getId():0;?>.jpg" alt="artist" />
	</div>
	<div class="text-middle">
		<a href="../<?php echo $artist->getUrl(); ?>"><span class="artist-name"><?php echo $artist->getName(); ?></span></a>,
			список всех <?php echo $contentName; ?> (<?php echo $count; ?> шт.):
	</div>
<?php
}
?><?php
function printArtistSCT($artistUrl,$sct){
	/* Func generates page depending on var $sct ( song/clip/translate ) for specific artist in $artistUrl
			$sct = 1 -song's; 2 -clip's; 3 -translates page
			$artistUrl = artist string identifier (ex. ani_lorak)
	*/
	$artist = new artist();
	$artist->initAll($artistUrl);
	
	switch($sct){
		case 1:{
			$contentName = "песен";
			break;
		}
		case 2:{
			$contentName = "клипов";
			break;
		}
		case 3:{
			$contentName = "переводов";
			break;
		}
	}
	$TITLE = $artist->getName()." (".$artist->getCountryName()."). Список всех ".$contentName;
	require_once 'php/printBegin.php';
?>
	<div class="main-container" style="margin:20px;">
	
		
		<?php 
		$item_count=0;

		
		//$newTList = $tList->getNewTranslates($no);
		switch($sct){
			case 1:{
				$sList = new SongList();
				$newSList = $sList->getFirstArtistSongs($sList->ALL_SONGS,$artist->getId());
				
				printArtistHeader($artist, $contentName, $newSList->count());
				
				if ($newSList != NULL)
				{
					while($song = $newSList->current()){ 
					?>
						<div class="item-short">
							
								<span class="artist-name">
								<?php echo ++$item_count.". ";?>
									<a href="../<?php echo $song->getArtistUrl()."/".$song->getUrl(); ?>"> 
										<?php echo $song->getName();?>
									</a>
							 </span>
							
						</div>
						<p class="separator"></p>
				<?php 
					$newSList->next();
					}
				}else {	?> <p style='color:red;'>ERROR! Empty var \$newSList at print.php::printArtistSCT()</p><? }
				break;
			}//case 1
			
			case 2:{
				$vList = new VideoList();
				$newVList = $vList->getArtistVideos($vList->ALL_VIDEOS,$artist->getId());
				
				printArtistHeader($artist, $contentName, $newVList->count());
				
				if ($newVList != NULL)
				{
					while($video = $newVList->current()){ 
					?>
						<div class="item-short">
								<span class="artist-name">
								<?php echo ++$item_count.".";?>
									<a href="../<?php echo $video->getArtistUrl()."/".$video->getSongUrl(); ?>"> 
										<?php echo $video->getSongName();?> 
									</a>
									
							 </span>
						</div>
						<p class="separator"></p>
				<?php 
					$newVList->next();
					}
				}else {	?> <p style='color:red;'>ERROR! Empty var \$newVList at print.php::printArtistSCT()</p><? }
				break;
			}//case 2
			
			case 3:{
				$tList = new TranslateList();
				$newTList = $tList->getArtistTranslates($tList->ALL_TRANSLATES, $artist->getId());
				
				printArtistHeader($artist, $contentName, $newTList->count());
				if ($newTList != NULL)
				{
					while($translate = $newTList->current()){ 
					?>
						<div class="item-short">
								<span class="artist-name">
								<?php echo ++$item_count;?>)
									<a href="../<?php echo $translate->getArtistUrl()."/".$translate->getSongUrl(); ?>"> 
										<?php echo $translate->getSongName()." (".$translate->getName().")";?>
									<img class="artist-flag" src="../img/flags/<?php echo $translate->getSongLanguageUrl(); ?>.png" alt="<?php echo $translate->getSongLanguageName(); ?>"/>
								&#x21d2;
									<img class="artist-flag" src="../img/flags/<?php echo $translate->getLanguageUrl(); ?>.png" alt="<?php echo $translate->getLanguageName(); ?>"/>
							
									</a>
									
							 </span>
						</div>
						<p class="separator"></p>
				<?php 
					$newTList->next();
					}
				}else {	?> <p style='color:red;'>ERROR! Empty var \$newTList at print.php::printArtistSCT()</p><? }
				break;
			}//case 3
			
		
		}//switch
		?>
		<!--PAGE END-->
		</div><!--/span-->
		<?php 	
	}
	?>