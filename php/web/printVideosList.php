<?php
	require_once 'php/classes/VideoList.php';
	require_once 'php/paginator/template.php';
	$ALL = 0;
function printNewVideoPage($delta, $page, $searchTag, $activeMenuItem){
	/*
		@page - var for pagination. Song number form wich start showing page
	*/
	$vList = new VideoList();
	$count = 1;
		
	$newVList = $vList->getNewVideos( $delta, $page-1 );
	$all_list = $vList->getNewVideos( $ALL, $ALL );	
	$itemsQuantity = $all_list->count();
				
	//if ($itemsQuantity > $delta){
	//	$newVList = $vList->getNewVideos($delta, $page-$delta);
	//}else{
	//	$newVList = $vList->getNewVideos($delta, 0);
	//}
	
	$TITLE = "Список всех новых клипов 2013";
	require_once 'php/web/printBegin.php';
	
?>
	<div class="main-container">
		<div class="section">
		<?php
		//print_r($newVList);
		if ($newVList != NULL)
		{	
			$count_items = 0; // for correct working with paginator
			Paginate($delta, $page, $itemsQuantity, $searchTag,false);
			while($video = $newVList->current()){ 
			$count_items++;
			?>
				<div class="video">
					<span> 
						<?php
							echo $video->getData(); 
						?>
					</span>
					
					<div class="video-text">
					<a href="../<?php echo $video->getArtistUrl().'/'.$video->getSongUrl(); ?>"><?php echo $video->getArtistName().' - '.$video->getSongName().' ('.$video->getVideoTypeName();?>)</a>
					<?php if (($_SITE_MAJOR_VERSION==1)&&($_SITE_MINOR_VERSION == 1)){?>
						<div>
							<a href="<?php echo $video->getUserUrl();?>" title="<?php echo $video->getUserName();?>" class="video-screen-user-link"> <?php echo $video->getUserName();?></a>
						</div>
					<?php }?>
					</div>
				</div>
				<?php if ($count%4==0){?>
				<p class="separator"></p>
		<?php }
			$count++;
			if ($count_items <$delta){
					$newVList->next();
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
			</div>
			
		<!--PAGE END-->
		</div><!--/span-->
		<div style="clear:both;">
		<?php Paginate($delta, $page, $itemsQuantity, $searchTag,true);?>
		</div>
<?php 
	};
?><?php
	function printTopVideoPage($delta,$page){};
?>