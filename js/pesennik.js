$(function ($) {

	var timer = $.timer(function() {
		// may be ajax request to server for new photo
		$(".artist-photo-top-new").fadeOut(1500);
		$(".artist-photo-top-new").fadeIn(1500);
	});
	
	$(".nav-header").click(function(){
		$(".nav-header ul>li").toggle('slow');
	});
	
	
	$(".artist-photo-top-new").mouseover(function(){
	 timer.stop();
	});
	
	timer.set({ time : 10000, autostart : true });
	timer.play();
});