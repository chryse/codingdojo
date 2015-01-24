var makeCard = function(info) {
	var cardInfo = "<div class='name' desc='" + info.description + "'><h1>" + info.firstName + " " + info.lastName + "</h1><p>Click for description</p></div>";
	return cardInfo;
};

$(document).ready(function(){
	$("#info-form").submit(function(){
		var info = {};
		$(".form-control").each(function(){
			info[$(this).attr("name")] = $(this).val();
		});
		$("#card-container").append(makeCard(info));
		return false;
	});

	$("#card-container").on("click", "div.name", function(){
		if ($(this).attr("class") == "name") {
			$(this).fadeToggle(600, "linear", function() {
				$(this).before("<div class='desc'>" + $(this).attr("desc") + "</div>");
			});
		}
	});
});