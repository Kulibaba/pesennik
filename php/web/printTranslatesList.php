<?php
	require_once 'php/classes/TranslateList.php';
	$ALL = 0;
function printNewTranslatePage($delta, $page, $searchTag, $activeMenuItem){
	/*
		@begin - var for pagination. Song number form wich start showing page
	*/
		
	$tList = new TranslateList();
	
	$all_list = $tList->getNewTranslates($ALL,$ALL);		
	$itemsQuantity = $all_list->count();
	
	$newTList = $tList->getNewTranslates($delta, $page - 1);		
	
	$TITLE = "Список всех новых переводов песен 2013";
	require_once 'php/web/printBegin.php';
	?>
		<div class="main-container" style="margin:20px;">
	<?php 
		if ($newTList != NULL)
		{
			$count_items = 0; // for correct working with paginator
			Paginate($delta, $page, $itemsQuantity, $searchTag);
			while($translate = $newTList->current()){ 
			$count_items++;
			?>
				<div class="item">
					<div class="photo-small">
						<img src="<?php echo $ROOT; ?>/img/photo/small/<?php echo $translate->isArtistPhoto()?$translate->getArtistId():0; ?>.jpg" alt="artist" />
					</div>
					<div class="text-middle">
						<span class="artist-name">
							<a href="<?php echo $ROOT; ?>/<?php echo $translate->getArtistUrl()."/".$translate->getSongUrl(); ?>"> 
								<?php echo $translate->getArtistName().' - '.$translate->getSongName()." (".$translate->getName().")";?>
							</a>
							<img class="artist-flag" src="<?php echo $ROOT; ?>/img/flags/<?php echo $translate->getSongLanguageUrl(); ?>.png" alt="<?php echo $translate->getSongLanguageName(); ?>"/>
					&#x21d2;
							<img class="artist-flag" src="<?php echo $ROOT; ?>/img/flags/<?php echo $translate->getLanguageUrl(); ?>.png" alt="<?php echo $translate->getLanguageName(); ?>"/>
							
					 </span>
					</div>
				</div>
				<p class="separator"></p>
			<?php 
				if ($count_items <$delta){
					$newTList->next();
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
				<p style='color:red;'>ERROR! Empty var \$newTList at print.php::printNewTranslatePage()</p>
				<?
		}
		?>
		<!--PAGE END-->
		</div><!--/span-->
		<?php 
	};
	?><?php
	function printTopTranslatePage($no,$begin){};
?>