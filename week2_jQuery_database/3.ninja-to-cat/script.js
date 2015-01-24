$(document).ready(function() {
	var container = "";
	for (var i = 1; i <= 100; i++) {
		container += "<img src='img/screen.png' class='img-responsive' data-alt-src='img/nyc_" + i + ".jpg'>";
	}
	$("div.img-container").html(container);
	$("img").click(function() {
		$(this).attr("src", $(this).attr("data-alt-src"));
	})
})