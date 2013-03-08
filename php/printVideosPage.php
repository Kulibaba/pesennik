<?php
	require_once 'VideoList.php';

function printNewVideoPage($no, $begin){
	/*
		@begin - var for pagination. Song number form wich start showing page
	*/
	$vList = new VideoList();
	$count = 1;
		
	$newVList = $vList->getNewVideos($no);
		
	$TITLE = "Список всех новых клипов 2013";
	require_once 'php/printBegin.php';
?>
	<div class="main-container" style="margin:20px;">
		<div class="section">
		<?php
		//print_r($newVList);
		if ($newVList != NULL)
		{	
			while($video = $newVList->current()){ 
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
			$newVList->next();
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
	function printTopVideoPage($no,$begin){};
?>