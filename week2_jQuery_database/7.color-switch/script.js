function random_color() {
	var rgb = ['a', 'b', 'c', 'd', 'e', 'f', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
	color = '#'  //this is what we'll return!
	for(var i = 0; i < 6; i++) {
		x = Math.floor((Math.random()*16))
		color += rgb[x];	
	};
	return color;
}

$(document).ready(function() {
	$('#large_box').click(function(){
		// alert('you clicked the big box!')  //comment this out when you figure out what event.stopPropagation is used for!
		var color = random_color();
		$("#large_box").css("background", color);
	})
	$('.side_box').click(function(event){
		// alert("you clicked the side box!");
		event.stopPropagation();
		var color = random_color();
		$(".side_box").css("background", color);
	})
	$('.middle_box').click(function(event){
		// alert("you clicked the middle box!");
		event.stopPropagation();
		var color = random_color();
		$(".middle_box").css("background", color);
	})
});