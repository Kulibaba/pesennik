$(function ($) {

	/*
	$("#headings-container").css('height',$("#measure_block>div").height()+"px");
	var counter_menu = 0;
	var counter_block = 0;
	var shift = $("#measure_block>div").height();
	var shift_menu = $("#new-heading-menu>p").height();
	*/
	var timer_hero = $.timer(function() {
		// may be next step - ajax request to server for new photo
		$(".artist-photo-top-new").fadeOut(1500);
		$(".artist-photo-top-new").fadeIn(1500);
	});
	
	var timer_top_new = $.timer(function(){
		//$(".next-heading ul>li").toggle('slow');
		if (counter_block < 2){		
			counter_block++;
			//var temp_position = '-=' +  shift +'px';
			$("#new-heading-block").animate({'top':   -(counter_block * shift) +'px'},2000,'linear',function(){}); // -=540
			//$("#new-heading-block").delay(2000).css('top',(-(counter_block-1)*shift)+'px');
		}else{
			counter_block = 0;
			$("#new-heading-block").animate({'top': '0'},2000,function(){}); // +=1080
		}
		
		if (counter_menu < 2){		
			counter_menu++;
			//var temp_position_menu = '-=' +  (shift_menu + 10) + 'px';
			$("#new-heading-menu").animate({'top':   -(counter_menu * shift_menu + 10) + 'px'},2000,'linear',function(){}); // -=30
		}else{
			counter_menu = 0;
			$("#new-heading-menu").animate({'top':'0'},2000,function(){}); // +=60
		}
	});
	
	
// MENU _BEGIN
	$(".header1").click(function(){
		$(".header1 ul>li").toggle('slow');
	});
	
	$(".header2").click(function(){
		$(".header2 ul>li").toggle('slow');
	});
	
	$(".header3").click(function(){
		$(".header3 ul>li").toggle('slow');
	});
	
	
	$(".header4").click(function(){
		$(".header4 ul>li").toggle('slow');
	});
// MENU _END
	
// NEW HEADINGS _BEGIN	
	
	/*$(".btn-next-heading").click(function(){
		//$(".next-heading ul>li").toggle('slow');
		if (counter_block < 2){		
			counter_block++;
			//var temp_position = '-=' +  shift +'px';
			$("#new-heading-block").animate({'top':   -(counter_block * shift) +'px'},2000,'linear',function(){}); // -=540
			//$("#new-heading-block").delay(2000).css('top',(-(counter_block-1)*shift)+'px');
		}else{
			counter_block = 0;
			$("#new-heading-block").animate({'top': '0'},2000,function(){}); // +=1080
		}
		
		if (counter_menu < 2){		
			counter_menu++;
			//var temp_position_menu = '-=' +  (shift_menu + 10) + 'px';
			$("#new-heading-menu").animate({'top':   -(counter_menu * shift_menu + 10) + 'px'},2000,'linear',function(){}); // -=30
		}else{
			counter_menu = 0;
			$("#new-heading-menu").animate({'top':'0'},2000,function(){}); // +=60
		}
	});*/
// NEW HEADINGS _END	
	
	
	// FOOTER BEGIN
	$(".footer-arrow-btn").click(function(){
		$(".counters-block").toggle('slow');
		return false;
	});
	
	// FOOTER END
	// TIMER 1
	$(".artist-photo-top-new").mouseover(function(){
	 timer_hero.stop();
	});
	
	timer_hero.set({ time : 10000, autostart : true });
	timer_hero.play();
	
	
	// TIMER 2
	/*
	$(".top-new-block").mouseover(function(){
	 timer_top_new.pause();
	});
	$(".top-new-block").mouseleave(function(){
	 timer_top_new.play();
	});
	
	timer_top_new.set({ time : 15000, autostart : true });
	timer_top_new.play();
	*/
});