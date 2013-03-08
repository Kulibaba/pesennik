<?php
	require_once 'TranslateList.php';

function printNewTranslatePage($no,$begin){
	/*
		@begin - var for pagination. Song number form wich start showing page
	*/
		
	$tList = new TranslateList();
	$newTList = $tList->getNewTranslates($no);
		
	$TITLE = "Список всех новых переводов песен 2013";
	require_once 'php/printBegin.php';
	?>
		<div class="main-container" style="margin:20px;">
	<?php 
		if ($newTList != NULL)
		{
			while($translate = $newTList->current()){ 
			?>
				<div class="item">
					<div class="photo-small">
						<img src="../img/photo/small/<?php echo $translate->isArtistPhoto()?$translate->getArtistId():0; ?>.jpg" alt="artist" />
					</div>
					<div class="text-middle">
						<span class="artist-name">
							<a href="../<?php echo $translate->getArtistUrl()."/".$translate->getSongUrl(); ?>"> 
								<?php echo $translate->getArtistName().' - '.$translate->getSongName()." (".$translate->getName().")";?>
							</a>
							<img class="artist-flag" src="../img/flags/<?php echo $translate->getSongLanguageUrl(); ?>.png" alt="<?php echo $translate->getSongLanguageName(); ?>"/>
					&#x21d2;
							<img class="artist-flag" src="../img/flags/<?php echo $translate->getLanguageUrl(); ?>.png" alt="<?php echo $translate->getLanguageName(); ?>"/>
							
					 </span>
					</div>
				</div>
				<p class="separator"></p>
		<?php 
			$newTList->next();
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