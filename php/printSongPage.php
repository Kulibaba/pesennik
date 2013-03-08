<?php
	require_once 'Song.php';

function printSongPage($artistUrl, $songUrl){
		$song = new Song();
		$song->initAll($artistUrl, $songUrl );
		
		$TITLE = $song->getArtistName()." — ".$song->getName()." (текст песни, перевод, клип)";
		require_once 'php/printBegin.php';
?>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<div class="main-container" style="margin:20px;">
			<div id="short_bio">
				<div class="photo">
					<img src="../img/photo/largest/<?php echo $song->isArtistPhoto()?$song->getArtistId():0; ?>.jpg" alt="<?php echo $song->getArtistName(); ?>" />
				</div>
				<div class="span4" id="short_bio_table" >
					<span class="artist-name">
						<a href="../<?php echo $song->getArtistUrl(); ?>" >
							<?php echo $song->getArtistName(); ?>
						</a>
					</span> — <?php echo $song->getName(); ?> 
					<img src="../img/flags/<?php echo $song->getLanguageUrl(); ?>.png" class="artist-flag" alt="<?php echo $song->getLanguageName(); ?>"/>
					
					<?php
						if ($song->getTranslateList()->count() > 0 ){
					?>
							<div style="margin:15px 0;">
								<span class="artist-name">Переводы</span>
									<?php 
										$list = $song->getTranslateList();
										while($translate = $list->current()){
											?><img class="artist-flag" src="../img/flags/<?php echo $translate->getLanguageUrl(); ?>.png"alt="<?php echo $translate->getLanguageName(); ?>"/>
											<?php 
											$list->next();
										}
										$list->rewind();
									?>
							</div>
					<?
						}
					?>
					
					<span style="border:1px solid #541;width:182; height: 18px; float:right;">
						<!-- margin for element 2px , w:22 h:16-->
						<img src="" width="22" height="16" alt="google" />
						<img src="" width="22" height="16" alt="vk" />
						<img src="" width="22" height="16" alt="face" />
						<img src="" width="22" height="16" alt="mail.ru" />
						<img src="" width="22" height="16" alt="tweeter" />
						<img src="" width="22" height="16" alt="livejournal" />
						<img src="" width="22" height="16" alt="yandex" />
					</span>
				</div>
			</div>		
		<div class="section">		
			<?php	// show all videos
				$list = $song->getVideoList();
				if ($list->count() > 0){			
					while($video = $list->current()){
			?>
				<div class="video">
					<span> 
						<?php
							echo $video->getData(); 
						?>
					</span>
					<span class="video-info">
						<?php
							echo $video->getInfo(); 
						?>
					</span>
					<div class="video-text">
				 <?php echo $video->getVideoTypeName();?>
					<?php if (($_SITE_MAJOR_VERSION==1)&&($_SITE_MINOR_VERSION == 1)){?>
						<div>
							<a href="<?php echo $video->getUserUrl();?>" title="<?php echo $video->getUserName();?>" class="video-screen-user-link"> <?php echo $video->getUserName();?></a>
						</div>
					<?php }?>
				</div>
				</div>
			<?php 
						$list->next(); break; /* ONLY ONE VIDEO CLIP FOR EVERY SONG */
					}
				}
			?>
		</div>	
		
			<div class="section">
				<div class="w50">
					<div id="tabs2" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
						<span class="song-title"><?php echo $song->getArtistName()." — ".$song->getName(); ?> (текст песни)</span> 
						<div class="song-info"> 
							<?php echo $song->getInfo(); ?>
						</div>
						<div class="song-text"><?php echo $song->getLyrics(); ?></div>
					</div>
				</div>
				<!--Перевод Песни-->
					
				<?php 
					$list = $song->getTranslateList();
					if ($list->count() > 0){
				?>
						<div class="w50">
							<div id="tabs">
								<ul>
									<?php									
										while($translate = $list->current()){
											echo '<li><a href="#tabs-'.$translate->getId().'">'.$translate->getLanguageName().'</a></li>';
											$list->next();
										}
										$list->rewind();
									?>
								</ul>
								<?php
									while($translate = $list->current()){
										echo '<div id="tabs-'.$translate->getId().'"><p><span class="song-title">'.$translate->getName().'</span><div class="song-text">'.$translate->getLyrics().'</div></p></div>';
										$list->next();
									}
								?>
							</div>
						</div>
				<?php
					}
				?>
			</div>
		</div>
		<p class="separator"></p>
		<script language="javascript" type="text/javascript">
			//jQuery.noConflict();	
			$(function() {
				$( "#tabs" ).tabs();
			});
		</script>
	<?php
	};
?>