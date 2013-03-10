<?php function printMainPage()
{
	// Get random top-indexed artist
	$SONGS_QUANTITY_HERO = 10;
	$SONGS_QUANTITY = 4;
	
	$song = new Song();
	$song->initNewAll();

	$TITLE = "Новые песни 2013. Все тексты песенен, клипы, переводы.";
	
	require_once 'php/printBegin.php';

	?>
		<div class="hero-unit">
			<div class="photo-big">
				<img src="img/photo/largest/<?php echo $song->isArtistPhoto()?$song->getArtistId():0; ?>.jpg" class="artist-photo-top-new" alt="<?php echo $song->getArtistName(); ?>" />
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
							<div class="new-heading-menu">
								<p class="heading">Тексты</p>
							</div>
						</div>
						<!--p class="heading btn-next-heading"> &nbsp </p-->
						</div>
						<div class="span10">
							<?php
								// $new_songs = GET TEXT LINKs LIST HERE
								
								$songList = new SongList();
								$new_songs = $songList->getNewSongs( $SONGS_QUANTITY, 0);
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
							<div class="new-heading-menu">
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
								<div class="new-heading-menu">
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
		</div><!-- /detailed headings -->
	</div><!--/span-->
<?php
	};	
?>