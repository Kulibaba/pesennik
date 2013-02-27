<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>pesennik.org</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="">
 <meta name="author" content="">

	
	<?php require_once 'conf.php' ?>
 <!-- Le styles -->
	<link href="<?php echo $_ROOT; ?>/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo $_ROOT; ?>/css/pessenik.css" rel="stylesheet">
	<link href="<?php echo $_ROOT; ?>/css/bootstrap-responsive.css" rel="stylesheet">
	
	<script src="<?php echo $_ROOT; ?>/js/jquery.js"></script>
	<script src="<?php echo $_ROOT; ?>/js/jquery.bxslider.min.js"></script>
	<script src="<?php echo $_ROOT; ?>/js/jquery-timer.js"></script>
	<script src="<?php echo $_ROOT; ?>/js/pesennik.js"></script>
 <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
 <!--[if lt IE 9]>
 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
</head>
<body>
	
	

 <div class="navbar navbar-inverse "> <!--navbar-fixed-top-->
 <div class="navbar-inner">
 <div class="container-fluid">
			 <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			 </a>
			<a class="brand" href="<?php echo $_ROOT; ?>"><img src="<?php echo $_ROOT; ?>/img/logo.png"/></a> <!--pesennik.org-->
			<div id="global-nav"> 
							<ul> 
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/0">0-9</a></li> 
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/a">A</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/b">B</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/c">C</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/d">D</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/e">E</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/f">F</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/g">G</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/h">H</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/i">I</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/j">J</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/k">K</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/l">L</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/m">M</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/n">N</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/o">O</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/p">P</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/q">Q</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/r">R</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/s">S</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/t">T</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/u">U</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/v">V</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/w">W</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/x">X</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/y">Y</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/z">Z</a></li> 
							</ul> 
							<ul>
							
							
							
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B0">А</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B1">Б</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B2">В</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B3">Г</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B4">Д</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B5">Е</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%94">Є</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B7">З</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%96">І</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%B8">И</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%BA">К</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%BB">Л</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%BC">М</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%BD">Н</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%BE">О</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D0%BF">П</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%80">Р</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%81">С</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%82">Т</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%83">У</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%84">Ф</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%85">Х</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%86">Ц</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%87">Ч</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%88">Ш</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%89">Щ</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%8D">Э</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%8E">Ю</a></li>
								<li><a href="<?php echo $_ROOT; ?>/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8/%D1%8F">Я</a></li>
							</ul> 
			</div> 
			<div id="search" class="span4"> 
				<input></input> <button class="btn-primary btn-small" type="submit"> Поиск</button>
				
			</div>
 <div class="nav-collapse collapse">
 <p class="navbar-text pull-right">
 Вы вошли, как <a href="#" class="navbar-link">Гость</a>
 </p>
 
			<!--ul class="nav">
 <li class="active"><a href="#">Главная</a></li>
 <li><a href="#about">О проекте</a></li>
 <li><a href="#contact">Контакты</a></li>
 </ul-->
			
 </div><!--/.nav-collapse -->
 </div>
 </div>
 </div>

 <div class="container-fluid">
 <div class="row-fluid">
	 
		<!--MENU BEGIN-->
 <div class="span2">
 <div class="well sidebar-nav">
 <ul class="nav nav-list">
				<li class="nav-header active"><a href="<?php echo $_ROOT; ?>">Главная</a></li>
			
				<li class="nav-header header1">Новинки
					<ul>
						<li><a href="<?php echo $_ROOT; ?>/%D0%BD%D0%BE%D0%B2%D1%8B%D0%B5/%D1%82%D0%B5%D0%BA%D1%81%D1%82%D1%8B" >тексты</a></li>
						<li><a href="<?php echo $_ROOT; ?>/%D0%BD%D0%BE%D0%B2%D1%8B%D0%B5/%D0%BA%D0%BB%D0%B8%D0%BF%D1%8B" >клипы</a></li>
						<li><a href="<?php echo $_ROOT; ?>/%D0%BD%D0%BE%D0%B2%D1%8B%D0%B5/%D0%BF%D0%B5%D1%80%D0%B5%D0%B2%D0%BE%D0%B4%D1%8B">переводы</a></li>
						<li><a href="<?php echo $_ROOT; ?>/%D0%BD%D0%BE%D0%B2%D1%8B%D0%B5/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8">исполнители</a></li>
						<li><a href="<?php echo $_ROOT; ?>/%D0%BD%D0%BE%D0%B2%D1%8B%D0%B5/%D0%BA%D0%BE%D0%BC%D0%BC%D0%B5%D0%BD%D1%82%D0%B0%D1%80%D0%B8%D0%B8">комментарии</a></li>
					</ul>
				</li>
			 
				<li class="nav-header header2">Популярные
					<ul>
						<li><a href="<?php echo $_ROOT; ?>/%D0%BF%D0%BE%D0%BF%D1%83%D0%BB%D1%8F%D1%80%D0%BD%D1%8B%D0%B5/%D1%82%D0%B5%D0%BA%D1%81%D1%82%D1%8B" >тексты</a></li>
						<li><a href="<?php echo $_ROOT; ?>/%D0%BF%D0%BE%D0%BF%D1%83%D0%BB%D1%8F%D1%80%D0%BD%D1%8B%D0%B5/%D0%BA%D0%BB%D0%B8%D0%BF%D1%8B" >клипы</a></li>
						<li><a href="<?php echo $_ROOT; ?>/%D0%BF%D0%BE%D0%BF%D1%83%D0%BB%D1%8F%D1%80%D0%BD%D1%8B%D0%B5/%D0%BF%D0%B5%D1%80%D0%B5%D0%B2%D0%BE%D0%B4%D1%8B">переводы</a></li>
						<li><a href="<?php echo $_ROOT; ?>/%D0%BF%D0%BE%D0%BF%D1%83%D0%BB%D1%8F%D1%80%D0%BD%D1%8B%D0%B5/%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D0%BD%D0%B8%D1%82%D0%B5%D0%BB%D0%B8">исполнители</a></li>
						<li><a href="<?php echo $_ROOT; ?>/%D0%BF%D0%BE%D0%BF%D1%83%D0%BB%D1%8F%D1%80%D0%BD%D1%8B%D0%B5/%D0%BA%D0%BE%D0%BC%D0%BC%D0%B5%D0%BD%D1%82%D0%B0%D1%80%D0%B8%D0%B8">комментарии</a></li>
					</ul>
				</li>
 
 </ul>
			
 </div><!--/.well -->
 </div><!--/span-->
		<!--MENU END-->
		
		<div class="span10">
		<!-- BEGIN PAGE--> 