<?php
	require_once 'Artist.php';
?>
<?php
function printArtistPage($artistUrl){
	$artist = new Artist();
	$artist->initAll($artistUrl);
	
	$TITLE = $artist->getName()." (".$artist->getCountryName()."). Все песни, клипы, биография";
	require_once 'php/printBegin.php';
?>		
		<div class="main-container" >
		 <div id="short_bio">
			<div class="photo"><img src="./img/photo/largest/<?php echo $artist->isPhoto()?$artist->getId():0; ?>.jpg" alt="<?php echo $artist->getName(); ?>"/></div>
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
							<a class="btn btn-primary btn-small" href="<?php echo $artist->getUrl(); ?>/%D0%BF%D0%B5%D1%81%D0%BD%D0%B8">Песни <?php echo $artist->getSongNo(); ?></a> <!--NEED TO IMPLEMENT-->
							<a class="btn btn-primary btn-small" href="<?php echo $artist->getUrl(); ?>/%D0%BA%D0%BB%D0%B8%D0%BF%D1%8B">Клипы <?php echo $artist->getVideoNo(); ?></a> <!--NEED TO IMPLEMENT-->
							<a class="btn btn-primary btn-small" href="<?php echo $artist->getUrl(); ?>/%D0%BF%D0%B5%D1%80%D0%B5%D0%B2%D0%BE%D0%B4%D1%8B">Переводы <?php echo $artist->getTranslateNo(); ?></a> <!--NEED TO IMPLEMENT-->
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
						<div class="bio-section-text" style="display:none;">
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
	
