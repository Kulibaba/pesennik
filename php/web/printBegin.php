<?php require 'php/conf.php' ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title><?php echo $TITLE; ?> — pesennik.org</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="">
 <meta name="author" content="">

 <!-- Le styles -->
	<link href="<?php echo $ROOT; ?>/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $ROOT; ?>/css/pessenik.css" rel="stylesheet">
	<link href="<?php echo $ROOT; ?>/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo $ROOT; ?>/css/jquery.bxslider.css" rel="stylesheet">
	<script src="<?php echo $ROOT; ?>/js/jquery.js"></script>
	<script src="<?php echo $ROOT; ?>/js/jquery-timer.js"></script>
	<script src="<?php echo $ROOT; ?>/js/pesennik.js"></script>
	<script src="<?php echo $ROOT; ?>/js/jquery.bxslider.min.js"></script>
	<!-- COUNTERS -->
	<meta name='yandex-verification' content='6bb4350959ce6613' >
	<meta property="fb:admins" content="1645742917" >
	<script src="http://userapi.com/js/api/openapi.js?20"></script>
	<script> VK.init({apiId: 2151698, onlyWidgets: true}); </script>
	
<script>
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script>
try{
var pageTracker = _gat._getTracker("UA-12382816-1");
pageTracker._trackPageview();
} catch(err) {}
</script>


<!-- COUNTERS END -->
 <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
 <!--[if lt IE 9]>
 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
</head>
<body>

<!--LiveInternet counter-->
<script>
	new Image().src = "http://counter.yadro.ru/hit?r"
		+escape(document.referrer)
		+((typeof(screen)=="undefined")?"":";s"+screen.width
		+"*"+screen.height+"*"
		+(screen.colorDepth?screen.colorDepth:screen.pixelDepth))
		+";u"+escape(document.URL)
		+";h"+escape(document.title.substring(0,80))
		+";"+Math.random();
</script>
<!--/LiveInternet-->
<!--Rating@Mail.ru counter-->
<script>
	d=document;var a='';a+=';r='+escape(d.referrer);js=10;
	a+=';j='+navigator.javaEnabled();js=11;
	s=screen;a+=';s='+s.width+'*'+s.height;
	a+=';d='+(s.colorDepth?s.colorDepth:s.pixelDepth);js=12;
	js=13;
</script>	

<div class="navbar navbar-inverse"><!--navbar-fixed-top-->
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?php echo $ROOT; ?>"><img src="<?php echo $ROOT; ?>/img/logo.png" alt="pesennik logo"/></a> <!--pesennik.org-->
			<div id="global-nav"> 
				<ul> 
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/0">0-9</a></li> 
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/a">A</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/b">B</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/c">C</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/d">D</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/e">E</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/f">F</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/g">G</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/h">H</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/i">I</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/j">J</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/k">K</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/l">L</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/m">M</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/n">N</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/o">O</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/p">P</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/q">Q</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/r">R</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/s">S</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/t">T</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/u">U</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/v">V</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/w">W</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/x">X</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/y">Y</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/z">Z</a></li> 
				</ul> 
				<ul>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B0">А</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B1">Б</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B2">В</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B3">Г</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B4">Д</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B5">Е</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%94">Є</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B7">З</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%96">І</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B8">И</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%BA">К</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%BB">Л</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%BC">М</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%BD">Н</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%BE">О</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%BF">П</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%80">Р</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%81">С</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%82">Т</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%83">У</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%84">Ф</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%85">Х</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%86">Ц</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%87">Ч</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%88">Ш</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%89">Щ</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%8D">Э</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%8E">Ю</a></li>
					<li><a href="<?php echo $ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%8F">Я</a></li>
				</ul> 
			</div> 
			<div id="search" class="span4"> 
				<input/>
				<button class="btn-primary btn-small" type="submit">Поиск</button>
			</div>
			<div class="nav-collapse collapse">
				<p class="navbar-text pull-right">
					Вы вошли, как <a href="#" class="navbar-link">Гость</a>
				</p>
			</div><!-- / .nav-collapse -->
		</div><!-- / .container-fluid -->
	</div><!-- / .navbar-inner -->
 </div><!-- / .navbar -->
 <div class="container-fluid">
	<div class="row-fluid"> 
		<!--MENU BEGIN-->
		<div style="height:100%;">
			<div class="span2">
				<div class="well sidebar-nav">
					<ul class="nav nav-list">
						<li class="nav-header active"><a href="<?php echo $ROOT; ?>">Главная</a></li>	
						<li class="nav-header" id="header1">Новинки
							<ul>
								<li><a href="<?php echo $ROOT; ?>/%D0%BD%D0%BE%D0%B2%D1%8B%D0%B5/%D1%82%D0%B5%D0%BA%D1%81%D1%82%D1%8B" >тексты</a></li>
								<li><a href="<?php echo $ROOT; ?>/%D0%BD%D0%BE%D0%B2%D1%8B%D0%B5/%D0%BA%D0%BB%D0%B8%D0%BF%D1%8B" >клипы</a></li>
								<li><a href="<?php echo $ROOT; ?>/%D0%BD%D0%BE%D0%B2%D1%8B%D0%B5/%D0%BF%D0%B5%D1%80%D0%B5%D0%B2%D0%BE%D0%B4%D1%8B">переводы</a></li>
								<li><a href="<?php echo $ROOT; ?>/%D0%BD%D0%BE%D0%B2%D1%8B%D0%B5/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8">исполнители</a></li>
							</ul>
						</li>
					</ul>	
				</div><!-- /.well -->
			</div><!-- / .span2 -->
		
		<!--MENU END-->
		<div class="span10">
		<!-- BEGIN PAGE-->