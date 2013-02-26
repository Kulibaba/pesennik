<?php

	// MAIN PAGE BEGIN
	require_once 'Song.php'; 		
	require_once 'Artist.php';	
	require_once 'ArtistList.php';	
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
	function printSongPage($artistUrl, $songUrl){};
	
	function printArtistPage($artistUrl){
		
		$artist = new Artist();
		$artist->initAll($artistUrl);
		echo '<link href="css/jquery.bxslider.css" rel="stylesheet">';
		echo '<div class="main-container" >
			  <div  id="short_bio">
				<div class="photo"><img src="img/artist.jpg" alt="artist" /></div>
				<div class="span7" id="short_bio_table" >
					<span class="vote-stars">
						<span class="current-rating" style="width:30%;">  </span>	
					</span>
					<span >
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
						<tr><td>Полное имя</td> <td>: '.$artist->getName().'</td></tr>
						<tr><td>Даты</td> <td>: '.$artist->getBirthDate().'  -  '.$artist->getDeathDate().' </td></tr>
						<tr><td>Страны</td> <td>: '.$artist->getCountryName().' ('.$artist->getBirthplace().') </td></tr>
						</tbody>
					</table>
					
					<div style="float:left;" class="btn-block">
						<div style="display:inline;">
							<a class="btn btn-primary btn-small" href="'.$artist->getSongListURL().'">Песни »</a> <!--NEED TO IMPLEMENT-->
							<a class="btn btn-primary btn-small" href="'.$artist->getAlbumListURL().'">Альбомы »</a> <!--NEED TO IMPLEMENT-->
						</div>
					</div>
			</div>
			</div>
			
			<div class="bio-content">
			
				<div class="bio-section">	  
					<span class="bio-section-title" >Биография</span>
					<div class="bio-section-text" >
						'.$artist->getBio().'
					</div>
				</div>
				
				<p class="separator"></p>
				<div  class="bio-section">	  
					<span class="bio-section-title" >Награды</span>
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
					 
					$delimiter = "\r\n";
					$info_array = explode($delimiter, $artist->getInfo()); 
					
					echo '<ul>';
							
					
						for ($i=0; $i < count( $info_array ); $i++)
						{
							
							echo '<li>'.   $info_array[$i].' </li>';
							
						}
					
					echo '</ul>
					</div>
				</div>
				
				<p class="separator"></p>
				<div class="bio-section">	  
					<span class="bio-section-title" > Фото </span>
					
					<!--div  class="bio-section-gallery">
						<a href="#" id="gallery-left-arrow"><</a>
						<div id="gallery-content"></div>
						<a href="#" id="gallery-right-arrow">></a>
					</div-->
					<div style="margin-top:30px;">
						<ul class="bxslider">
						  <li><img src="img/artist.jpg" title="Ani Lorak 1" /></li>
						  <li><img src="img/artist.jpg" title="Ani Lorak 2" /></li>
						  <li><img src="img/artist.jpg" title="Ani Lorak 3" /></li>
						  <li><img src="img/artist.jpg" title="Ani Lorak 4" /></li>
						  <li><img src="img/artist.jpg" title="Ani Lorak 5" /></li>
						  <li><img src="img/artist.jpg" title="Ani Lorak 6" /></li>
						  <li><img src="img/artist.jpg" title="Ani Lorak 7" /></li>
						  <li><img src="img/artist.jpg" title="Ani Lorak 8" /></li>
						  <li><img src="img/artist.jpg" title="Ani Lorak 9" /></li>
						  <li><img src="img/artist.jpg" title="Ani Lorak 10" /></li>
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
				</script>';
	};	
	
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
				<img src="img/photo/largest/<?php echo $song->getArtistId(); ?>.jpg"  class="artist-photo-top-new" alt="<?php echo $song->getArtistName(); ?>" />
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
		
			<div  class="span10 " id="headings-container" style="overflow:hidden;"><!--height:500px;-->
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