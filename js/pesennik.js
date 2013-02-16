$(function ($) {

	var timer = $.timer(function() {
		// may be ajax request to server for new photo
		$(".artist-photo-top-new").fadeOut(1500);
		$(".artist-photo-top-new").fadeIn(1500);
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
	$("#headings-container").css('height',$("#measure_block>div").height()+"px");
	var counter_menu = 0;
	var counter_block = 0;
	var shift = $("#measure_block>div").height();
	var shift_menu = $("#new-heading-menu>p").height();
	$(".btn-next-heading").click(function(){
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
// NEW HEADINGS _END	
	
	$(".artist-photo-top-new").mouseover(function(){
	 timer.stop();
	});
	
	timer.set({ time : 10000, autostart : true });
	timer.play();
});