

<?php

	// MAIN PAGE BEGIN
	require_once 'php/Song.php'; 		
	require_once 'php/Artist.php';	
	require_once 'ArtistList.php';	
	require_once 'SongList.php';
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
		$artist->initAll('ani_lorak');
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
	$SONGS_QUANTITY_HERO = 1;
	$SONGS_QUANTITY = 20;
	
	$curr_artist = new Artist();
	
	$songList = new SongList();
	$fetched_song = $songList->getNewSongs( $SONGS_QUANTITY_HERO );
	if (($fetched_song != NULL) && ($fetched_song->count() > 0)){
		$curr_song = $fetched_song->pop();
		$curr_artist->initAll( $curr_song->getArtistUrl() );
		// DEBUG BEGIN
		if ($DEBUG_MODE != NULL){
			echo $fetched_song;
			echo $curr_song;
			echo $curr_song->getArtistUrl();
		}
		// DEBUG END
	}else{
		if ($DEBUG_MODE != NULL) {echo "<span style='color:red;'>ERROR! Empty var \$fetched_song print.php at line 36 </span><br/>";}
		error_log("EMPTY \$fetched_song print.php at line 36");
	}
	
	echo '
		<div class="hero-unit">
			<div class="photo-big">';
				echo '<img src="img/artist.jpg"  class="artist-photo-top-new" alt="artist" />';
	echo
		'</div>
			<div class="top-new-box-txt" >
				<h1>Песня '.$curr_artist->getName().' - '.$curr_song->getName().'</h1>
				<p>Уже доступна на нашем сайте</p>
				<p class="new-song-txt">'.$curr_song->getLyrics().' ...</p>
				
			</div>
			<p class="btn-paragraph"><a href="'.$curr_song->getUrl().'" class="btn btn-primary btn-large">читать далее &raquo;</a></p>
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
					<div class="span10">';
					// $new_songs = GET TEXT LINKs LIST HERE
					$new_songs = $songList->getNewSongs( $SONGS_QUANTITY );
					if ($new_songs != null){
						for ($ind = 1; $ind <= (count($new_songs) -1) && $ind<5 ;$ind++ )
						{
							echo '<div class="row-fluid">
										<a href="'.$new_songs[$ind]->getUrl().'">
											<p>
												<span>'.$new_songs[$ind]->getArtistName().' - </span>'.$new_songs[$ind]->getName().'
											</p>
										</a>';
							echo '</div>';

						}
					}else{
						echo '<div class="row-fluid">EMPTY for NOW </div>';
					}
					echo '</div>
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
						<div class="row-fluid">';
						// $videoList = GET NEW VIDEO LIST HERE
						$videoList = $songList->getNewSongs( $SONGS_QUANTITY );
						if ($videoList != null){
							for ($ind = 1; $ind <= (count($videoList) -1) && $ind<5 ;$ind++ )
							{
								echo '<iframe width="180" height="115" src="'.$videoList[$ind]->getUrl().'" frameborder="0" allowfullscreen></iframe>';
							}
						}else{
							echo '<div class="row-fluid">EMPTY for NOW </div>
										<div class="row-fluid">МАСШТАБИРУЕТСЯ</div>
										<div class="row-fluid">ПРИ</div>
										<div class="row-fluid">РАЗНОМ </div>';
						}
			echo '</div>
					</div>					
				</div>';
				
				
		echo		
		'<div class="new-heading-detailed translations" >
		<div class="span2" style="text-align:center;">
				<div style="overflow:hidden;">
					<div id="new-heading-menu">
						<p class="heading">Переводы</p>
					</div>
				</div>
			</div>
					<div class="span10">	';
						// $textList = GET NEW TRANSLATIONS LIST HERE
					if ($transList != null){
						for ($ind = 1; $ind <= (count($$transList) -1) && $ind<5 ;$ind++ )
						{
							echo '<div class="row-fluid">
										<a href="'.$transList[$ind]->getUrl().'">
											<p>
												<span>'.$transList[$ind]->getArtistName().' - </span>'.$transList[$ind]->getName().'
											</p>
										</a>
									  </div>';
						}
					}else{
						echo '<div class="row-fluid">EMPTY for NOW </div>
									<div class="row-fluid">КОЛИЧЕСТВЕ</div>
									<div class="row-fluid">ЭЛЕМЕНТОВ</div>';
					}
		echo '</div>
				</div>
				
				
				</div>
			</div>
		</div><!-- /detailed headings -->
	   </div><!--/span-->';
	};
?>