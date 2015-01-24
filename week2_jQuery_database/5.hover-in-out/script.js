$(document).ready(function() {
	$("li").hover(function(){
		$(this).find("div").css("top", "40%").fadeIn();
	}, function(){
		$(this).find("div").css("top", "100%");
	});
});