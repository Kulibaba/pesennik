<?php
	require_once 'VideoList.php';
	require_once 'paginator\template.php';
function printNewVideoPage($delta, $page, $searchTag){
	/*
		@page - var for pagination. Song number form wich start showing page
	*/
	$vList = new VideoList();
	$count = 1;
		
	$newVList = $vList->getNewVideos($delta,$page-1);
	$all_list = $vList->getNewVideos(0,0);	
	$itemsQuantity = $all_list->count();
				
	//if ($itemsQuantity > $delta){
	//	$newVList = $vList->getNewVideos($delta, $page-$delta);
	//}else{
	//	$newVList = $vList->getNewVideos($delta, 0);
	//}
	
	$TITLE = "Список всех новых клипов 2013";
	require_once 'php/printBegin.php';
	
?>
	<div class="main-container" style="margin:20px;">
		<div class="section">
		<?php
		//print_r($newVList);
		if ($newVList != NULL)
		{	
			$count_items = 0; // for correct working with paginator
			Paginate($delta, $page, $itemsQuantity, $searchTag);
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
				<?php if ($count%3==0){?>
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
<?php 
	};
?><?php
	function printTopVideoPage($delta,$page){};
?>