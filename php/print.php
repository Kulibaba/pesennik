<?php

	// MAIN PAGE BEGIN
	require_once 'conf.php'; 
	require_once 'Artist.php';	
	require_once 'ArtistList.php';	
	require_once 'Song.php'; 		
	require_once 'SongList.php';
	require_once 'TranslateList.php';
	require_once 'VideoList.php';
	// MAIN PAGE END
	
	function printNewSongPage($no){};
	function printNewVideoPage($no){};
	function printNewTranslatePage($no){};
	function printNewArtistPage($no){};
	function printTopSongPage($no){};
	function printTopVideoPage($no){};
	function printTopTranslatePage($no){};
	function printTopArtistPage($no){};
	function printSongPage($artistUrl, $songUrl){
		$song = new Song();
		$song->initAll($artistUrl, $songUrl );
		?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
	
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<div class="main-container" style="margin:20px;">
			<div id="short_bio">
				<div class="photo">
					<img src="../img/photo/largest/<?php echo $song->getArtistId(); ?>.jpg" alt="<?php echo $song->getArtistName(); ?>" />
				</div>
				<div class="span4" id="short_bio_table" >
					<span class="artist-name">
						<a href="<?php echo $song->getArtistUrl(); ?>" >
								<?php echo $song->getArtistName(); ?>
						</a> — <?php echo $song->getName(); ?> 
						<img src="../img/flags/<?php echo $song->getLanguageUrl(); ?>.png" class="artist-flag" alt="<?php echo $song->getLanguageName(); ?>"/>
					</span>
			
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
					<?php
						if ($song->getTranslateList()->count() > 0 ){
					?>
							<div style="margin:15px 0;">
								<span class="artist-name">Переводы</span>
									<?php 
										$list = $song->getTranslateList();
										while($translate = $list->current()){
											echo '<img src="../img/flags/'.$translate->getLanguageUrl().'.png" class="artist-flag" alt="'.$translate->getLanguageName().'"/>';
											$list->next();
										}
										$list->rewind();
									?>
							</div>
					<?
						}
					?>
				</div>
			</div>
			
					
			<?php	// show all videos
				$list = $song->getVideoList();
				if ($list->count() > 0){			
					while($video = $list->current()){
			?>
				<div class="video">
					<span> 
						<?php
							echo $video->getData(); 
							echo $video->getVideoTypeName();
						?>
					</span>
				</div>
			<?php 
						$list->next();
					}
				}
			?>
					
					
				
			<div class="w50">
				<div id="tabs2" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
					<span class="song-title"><?php echo $song->getArtistName()." — ".$song->getName(); ?> (текст песни)</span> 
					<div> 
						<?php echo $song->getLyrics(); ?>
					</div>
				</div>
					
					
					<!--div class="bio-section">	 
						<span class="bio-section-title" > Песни/Альбомы </span>
						
					</div-->
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
									echo '<div id="tabs-'.$translate->getId().'"><p>'.$translate->getLyrics().'</p></div>';
									$list->next();
								}
							?>
						</div>
					</div>
			<?php
				}
			?>
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
	
	<?php
	function printArtistPage($artistUrl){
		echo $_ROOT;
		$artist = new Artist();
		$artist->initAll($artistUrl);
		?>
		<link href="css/jquery.bxslider.css" rel="stylesheet">
		<div class="main-container" >
		 <div id="short_bio">
			<div class="photo"><img src="./img/photo/largest/<?php echo $artist->getId(); ?>.jpg" alt="<?php echo $artist->getName(); ?>"/></div>
			<div class="span7" id="short_bio_table">
				<span class="vote-stars">
					<span class="current-rating" style="width:30%;"></span>	
				</span>
				<span>
					<!-- margin for element 2px , w:22 h:16-->
					<img src="" width="22" height="16" alt="google" />
					<img src="" width="22" height="16" alt="vk" />
					<img src="" width="22" height="16" alt="face" />
					<img src="" width="22" height="16" alt="mail.ru" />
					<img src="" width="22" height="16" alt="tweeter" />
					<img src="" width="22" height="16" alt="livejournal" />
					<img src="" width="22" height="16" alt="yandex" />
				</span>
					
				<table class="bio-table table-bordered table-hover" style="cursor:pointer;" cellpadding="5" cellspacing="3">
					<tbody class="table-striped ">
						<tr><td>Полное имя:</td><td><?php echo $artist->getName(); ?></td></tr>
						<tr><td>Даты:</td><td><?php echo $artist->getBirthDate().' - '.$artist->getDeathDate(); ?></td></tr>
						<tr><td>Страна:</td><td><?php echo $artist->getCountryName(); ?></td></tr>
					</tbody>
				</table>
					
					<div style="float:left;" class="btn-block">
						<div style="display:inline;">
							<a class="btn btn-primary btn-small" href="<?php echo $artist->getUrl(); ?>/%D0%BF%D0%B5%D1%81%D0%BD%D0%B8">Песни »</a> <!--NEED TO IMPLEMENT-->
							<a class="btn btn-primary btn-small" href="<?php echo $artist->getUrl(); ?>/%D0%BA%D0%BB%D0%B8%D0%BF%D1%8B">Клипы »</a> <!--NEED TO IMPLEMENT-->
							<a class="btn btn-primary btn-small" href="<?php echo $artist->getUrl(); ?>/%D0%BF%D0%B5%D1%80%D0%B5%D0%B2%D0%BE%D0%B4%D1%8B">Переводы »</a> <!--NEED TO IMPLEMENT-->
							<a class="btn btn-primary btn-small" href="<?php echo $artist->getUrl(); ?>/%D0%B0%D0%BB%D1%8C%D0%B1%D0%BE%D0%BC%D1%8B">Альбомы »</a> <!--NEED TO IMPLEMENT-->
						</div>
					</div>
			</div>
			</div>
			
			<div class="bio-content">
			
				<div class="bio-section">	 
					<span class="bio-section-title">Биография</span>
					<div class="bio-section-text">
						<?php echo $artist->getBio(); ?>
					</div>
				</div>
				
				<p class="separator"></p>
				<div class="bio-section">	 
					<span class="bio-section-title">Награды</span>
					<div class="bio-rewards" style="display:none;">
						<ul>
							<li>2010
								<ul>
								<li>[Событие,Место] - [Название]</li>
								<li>Первая гланда России, Берибово - Золотая связка из горла Баскова.</li>
								<li>Пухлое горло стар-пома, Нижний Тагил - Лучший едок сырых яиц.</li>
								</ul>
							</li>
							<li>2011</li>
							<li>2012</li>
							<li>2013</li>
							
						</ul>
					</div>
				</div>
				
				<p class="separator"></p>
					<div class="bio-section">	 
						<span class="bio-section-title" >Интересные факты</span>
						<div class="bio-section-text" style="display:none;">';
							<?php
								$delimiter = "\r\n";
								$info_array = explode($delimiter, $artist->getInfo()); 
							?>
							<ul>
								<?php
								for ($i=0; $i < count( $info_array ); $i++)
								{
									echo '<li>'.$info_array[$i].' </li>';
								}
							?>
							</ul>
						</div>
					</div>	
				<p class="separator"></p>
				<div class="bio-section">	 
					<span class="bio-section-title">Фото</span>	
					<!--div class="bio-section-gallery">
						<a href="#" id="gallery-left-arrow"><</a>
						<div id="gallery-content"></div>
						<a href="#" id="gallery-right-arrow">></a>
					</div-->
					<div style="margin-top:30px;">
						<ul class="bxslider">
						 <li><img src="img/photo/largest/1.jpg" title="Ani Lorak 1" /></li>
						 <li><img src="img/photo/largest/2.jpg" title="Ani Lorak 2" /></li>
						 <li><img src="img/photo/largest/3.jpg" title="Ani Lorak 3" /></li>
						 <li><img src="img/photo/largest/4.jpg" title="Ani Lorak 4" /></li>
						 <li><img src="img/photo/largest/5.jpg" title="Ani Lorak 5" /></li>
						 <li><img src="img/photo/largest/6.jpg" title="Ani Lorak 6" /></li>
						 <li><img src="img/photo/largest/7.jpg" title="Ani Lorak 7" /></li>
						 <li><img src="img/photo/largest/8.jpg" title="Ani Lorak 8" /></li>
						 <li><img src="img/photo/largest/9.jpg" title="Ani Lorak 9" /></li>
						 <li><img src="img/photo/largest/10.jpg" title="Ani Lorak 10" /></li>
						</ul>		
					</div>
				</div>
			</div>
					
			</div>
			
			<!--DEBUG FOR jQuery-->
			<!--script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script-->
			<!--DEBUG FOR jQuery-->
			<script language="javascript" type="text/javascript">
				//jQuery.noConflict();	
				$(document).ready(function(){
					$(".bxslider").bxSlider( {
					 minSlides: 6,
					 maxSlides: 10,
					 slideWidth: 200,
					 slideMargin: 10,
					 moveSlides:6,
					 captions:true,
					 adaptiveHeight:true,
					 speed:2000
					});
					
					$(".bio-section-title").click(function(){
					var elem = $(this);
						$(elem).next().toggle("slow");
					});
					 
				});
				</script>
				<?php
	};	
?>

	
<?php
function printMainPage()
{
	// Get random top-indexed artist
	$SONGS_QUANTITY_HERO = 10;
	$SONGS_QUANTITY = 4;
	
	$song = new Song();
	$song->initNewAll();
	if ($song != NULL){
		// DEBUG BEGIN
		if ($DEBUG_MODE != NULL){
			echo $song->getArtistName()." - ".$song->getName();
		}
		// DEBUG END
	}else{
		if ($DEBUG_MODE != NULL) {
			?>
				<p style='color:red;'>ERROR! Empty var \$song print.php at line 36 </p>
			<?
		}
		error_log("EMPTY \$fetched_song print.php at line 36");
	}

	?>
		<div class="hero-unit">
			<div class="photo-big">
				<img src="img/photo/largest/<?php echo $song->getArtistId(); ?>.jpg" class="artist-photo-top-new" alt="<?php echo $song->getArtistName(); ?>" />
			</div>
			<div class="top-new-box-txt" >
				<h1>
					<?php echo $song->getArtistName()." — ".$song->getName(); ?>
				</h1>
				<p>Уже доступна на нашем сайте</p>
				<p class="new-song-txt">
					<?php echo $song->getLyrics(); ?>
					...
				</p>
			</div>
			<p class="btn-paragraph"><a href="<?php echo $song->getArtistUrl()."/".$song->getUrl();?>" class="btn btn-primary btn-large">читать далее &raquo;</a></p>
		</div>
		 
		<!-- MAIN BLOCK SEPARATOR -->
		<p class="separator"></p>	
		<div class="top-new-block">
			<!--div class="span2" style="text-align:center;">
				<div style="overflow:hidden;"> 
					<div id="new-heading-menu">
						<p class="heading">Тексты</p>
						<p class="heading">Клипы</p>
						<p class="heading">Переводы</p>
					</div>
				</div>
				<p class="heading btn-next-heading"> &nbsp </p>
			</div-->
		
			<div class="span10 " id="headings-container" style="overflow:hidden;"><!--height:500px;-->
				<div id="new-heading-block">
					<!--Texts-->
					<div class="new-heading-detailed texts" id="measure_block">
						<div class="span2" style="text-align:center;">
						<div style="overflow:hidden;"> <!--height:30px;-->
							<div id="new-heading-menu">
								<p class="heading">Тексты</p>
							</div>
						</div>
						<!--p class="heading btn-next-heading"> &nbsp </p-->
						</div>
						<div class="span10">
							<?php
								// $new_songs = GET TEXT LINKs LIST HERE
								
								$songList = new SongList();
								$new_songs = $songList->getNewSongs( $SONGS_QUANTITY );
								if ($new_songs != null){
									while($song = $new_songs->current())
									{
										?>
											<div class="row-fluid">
												<a href="<?php echo $song->getArtistUrl()."/".$song->getUrl(); ?>">
													<p>
														<span><?php echo $song->getArtistName().' - '.$song->getName(); ?></span>
													</p>
												</a>
											</div>
										<?php
										$new_songs->next();
									}
								}else{
									?>
									<div class="row-fluid">EMPTY for NOW </div>
									<?php
								}
								?>
						</div>
					</div>	
					<div class="new-heading-detailed clips">
						<div class="span2" style="text-align:center;">
						<div style="overflow:hidden;"> 
							<div id="new-heading-menu">
								<p class="heading">Клипы</p>
							</div>
						</div>
						</div>
						<div class="span10">	
							<div class="row-fluid">
							<?php
								$videoList = new VideoList();
								$new_videos = $videoList->getNewVideos( $SONGS_QUANTITY );
								if ($videoList != null){
									while($video = $new_videos->current())
									{
										$video->setXY(320,240);
										echo $video->getData();
										$new_videos->next();
									}
								}else{
							?>
										<div class="row-fluid">EMPTY for NOW </div>
										<div class="row-fluid">МАСШТАБИРУЕТСЯ</div>
										<div class="row-fluid">ПРИ</div>
										<div class="row-fluid">РАЗНОМ </div>
								<?php
								}
								?>
							</div>
						</div>					
					</div>
					<div class="new-heading-detailed translations" >
						<div class="span2" style="text-align:center;">
							<div style="overflow:hidden;">
								<div id="new-heading-menu">
									<p class="heading">Переводы</p>
								</div>
							</div>
						</div>
						<div class="span10">
						<?php
							$translateList = new TranslateList();
							$new_translates = $translateList->getNewTranslates( $SONGS_QUANTITY );
							if ($translateList != null){
								while($translate = $new_translates->current())
								{
									?>
										<div class="row-fluid">
											<a href="<?php echo $translate->getArtistUrl()."/".$translate->getSongUrl(); ?>">
												<p>
													<span>
														<?php echo $translate->getArtistName().' - '.$translate->getSongName()." (".$translate->getName().")"; ?>
													</span>
												</p>
											</a>
										 </div>
									<?php
									$new_translates->next();
								}
							}else{
								?>
									<div class="row-fluid">EMPTY for NOW </div>
									<div class="row-fluid">КОЛИЧЕСТВЕ</div>
									<div class="row-fluid">ЭЛЕМЕНТОВ</div>
								<?php
						}
						?>
						</div>
					</div>	
				</div>
			</div>
		</div><!-- /detailed headings -->
	</div><!--/span-->
<?php
	};
?>