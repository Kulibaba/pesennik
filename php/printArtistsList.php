<?php
	require_once 'ArtistList.php';
	$ALL = 0;
function printNewArtistPage($delta, $page, $searchTag){
	/*
		@begin - var for pagination. Song number form wich start showing page
	*/
	$aList = new ArtistList();
	$newAList = $aList->getNewArtists( $delta, $page -1);
	$all_list = $aList->getNewArtists( $ALL, $ALL );	
	$itemsQuantity = $all_list->count();
	
	$TITLE = "Новые исполнители 2013";
	require_once 'php/printBegin.php';
?>
	<div class="main-container" >
<?php 	
		//echo count($newAList); DEBUG
		if ($newAList != NULL)
		{
			$count_items = 0; // for correct working with paginator
			Paginate($delta, $page, $itemsQuantity, $searchTag);
			while($artist = $newAList->current()){ 
				$count_items++;
				?>
				<div class="item">
					<div class="photo-small">
						<img src="<?php echo $ROOT; ?>/img/photo/small/<?php echo $artist->isPhoto()?$artist->getId():0;?>.jpg" alt="<?php echo $artist->getName(); ?>" />
					</div>
					<div class="text-middle">
						<span class="artist-name">
							<a href="<?php echo $ROOT; ?>/<?php echo $artist->getUrl(); ?>"> 
								<?php echo $artist->getName();?>
							</a>
							<img class="artist-flag" src="<?php echo $ROOT; ?>/img/flags/<?php echo $artist->getCountryUrl(); ?>.png" alt="<?php echo $artist->getCountryName(); ?>"/>	
					 </span>
					</div>
				</div>
				<p class="separator"></p>
				<?php 
				if ($count_items <$delta){
					$newAList->next();
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
			<p style='color:red;'>ERROR! Empty var \$newTList at print.php::printNewArtistPage()</p>
			<?
		}
		?>
		<!--PAGE END-->
		</div><!--/span-->
<?php 
	};
?><?php
function printCharArtistPage($delta,$page, $char,$searchTag){
 
	$aList = new ArtistList();
	$newAList = $aList->getLastArtistCharacterList($delta, $page-1, $char);
	$all_list = $aList->getLastArtistCharacterList( $ALL, $ALL, $char);	
	$itemsQuantity = $all_list->count();
	
	$TITLE = "Список исполнителей на букву ".$char;
	require_once 'php/printBegin.php';
		
?>
	<div class="main-container" >
<?php
		//echo count($newAList); DEBUG
		if ($newAList != NULL)
		{
			$count_items = 0; // for correct working with paginator
			Paginate($delta, $page, $itemsQuantity, $searchTag);
			while($artist = $newAList->current()){ 
				$count_items++;
				?>
				<div class="item">
					<div class="photo-small">
						<img src="<?php echo $ROOT; ?>/img/photo/small/<?php echo $artist->isPhoto()?$artist->getId():0; ?>.jpg" alt="<?php echo $artist->getName(); ?>" />
					</div>
					<div class="text-middle">
						<span class="artist-name">
							<a href="<?php echo $ROOT; ?>/<?php echo $artist->getUrl(); ?>"> 
								<?php echo $artist->getName();?>
							</a>
							<img class="artist-flag" src="<?php echo $ROOT; ?>/img/flags/<?php echo $artist->getCountryUrl(); ?>.png" alt="<?php echo $artist->getCountryName(); ?>"/>
							
					 </span>
					</div>
				</div>
				<p class="separator"></p>
				<?php 
				if ($count_items < $delta){
					$newAList->next();
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
				<p style='color:red;'>ERROR! Empty var \$newTList at print.php::printNewArtistPage()</p>
			<?
		}
		?>
		<!--PAGE END-->
		</div><!--/span-->
<?php 
};
?><?php
	function printTopArtistPage($delta,$begin){};
?>