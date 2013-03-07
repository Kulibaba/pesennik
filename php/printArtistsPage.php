<?php
	require_once 'ArtistList.php';
?>

<?php
function printNewArtistPage($no,$begin){
	/*
		@begin - var for pagination. Song number form wich start showing page
	*/
	$aList = new ArtistList();
	$newAList = $aList->getNewArtists($no);
		
	$TITLE = "Новые исполнители 2013";
	require_once 'php/printBegin.php';
	
?>
	<div class="main-container" style="margin:20px;">
<?php 	
		//echo count($newAList); DEBUG
		if ($newAList != NULL)
		{
			//$newAList->rewind();
			while($artist = $newAList->current()){ 
			?>
				<divclass="item">
					<div class="photo-small">
						<img src="../img/photo/small/<?php echo $artist->isPhoto()?$artist->getId():0;?>.jpg" alt="artist" />
					</div>
					<divclass="text-middle">
						<span class="artist-name">
							<a href="../<?php echo $artist->getUrl(); ?>"> 
								<?php echo $artist->getName();?>
							</a>
							<img class="artist-flag" src="../img/flags/<?php echo $artist->getCountryUrl(); ?>.png"alt="<?php echo $artist->getCountryName(); ?>"/>
							
					 </span>
					</div>
				</div>
				<p class="separator"></p>
		<?php 
			$newAList->next();
			}
		}else
		{
			?>
				<p style='color:red;'>ERROR! Empty var \$newTList at print.php::printNewArtistPage()</p>
			<?
		}
		?>
		<!--PAGE END-->
		</div><!--/span-->
<?php 
	};
?>
<?php
function printCharArtistPage($no, $char){
 
	$aList = new ArtistList();
	$newAList = $aList->getLastArtistCharacterList($no, $char);
		
	$TITLE = "Список исполнителей на букву ".$char;
	require_once 'php/printBegin.php';
		
?>
	<div class="main-container" style="margin:20px;">
<?php
		//echo count($newAList); DEBUG
		if ($newAList != NULL)
		{
			//$newAList->rewind();
			while($artist = $newAList->current()){ 
			?>
				<divclass="item">
					<div class="photo-small">
						<img src="../img/photo/small/<?php echo $artist->isPhoto()?$artist->getId():0;?>.jpg" alt="artist" />
					</div>
					<divclass="text-middle">
						<span class="artist-name">
							<a href="../<?php echo $artist->getUrl(); ?>"> 
								<?php echo $artist->getName();?>
							</a>
							<img class="artist-flag" src="../img/flags/<?php echo $artist->getCountryUrl(); ?>.png"alt="<?php echo $artist->getCountryName(); ?>"/>
							
					 </span>
					</div>
				</div>
				<p class="separator"></p>
		<?php 
			$newAList->next();
			}
		}else
		{
			?>
				<p style='color:red;'>ERROR! Empty var \$newTList at print.php::printNewArtistPage()</p>
			<?
		}
		?>
		<!--PAGE END-->
		</div><!--/span-->
<?php 
};
?>



<?php
	function printTopArtistPage($no,$begin){};
?>