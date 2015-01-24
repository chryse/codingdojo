$(document).ready(function() {
	$("button.add-class").click(function(){
		$("p.first").css("background", "#f00").css("color", "#fff");
	});

	$("button.after").click(function() {
		$("p.second").after("HTML string, DOM element, array of elements, or jQuery object to insert after each element in the set of matched elements.");
	});

	$("button.append").click(function() {
		$("p.third").append("<br/>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.");
	});

	$("button.attr").click(function() {
		var checkBox = $("input#check");
		$("p.fourth").html("<strong>Checkbox is " + checkBox.attr("checked") + ".</strong>");
	});

	$("button.before").click(function() {
		$("p.fifth").before("<strong>HTML string, DOM element, array of elements, or jQuery object to insert before each element in the set of matched elements.</strong>");
	});

	$("button.html").click(function() {
		$("p.sixth").html("<strong>In an HTML document, .html() can be used to get the contents of any element. If the selector expression matches more than one element, only the first match will have its HTML content returned. Consider this code:</strong>")
	});

	$("button.text").click(function() {
		$("p.seventh").text("Add text to the paragraph (notice the bold tag is escaped).\n<b>Some</b> new text.")
	});

	$("button.val").click(function() {
		var textValue = $("select.eighth").val();
		// console.log(textValue);
		$("p.val-result").html("<strong>Value is " + textValue + ".</strong>");
	});

	$("button.toggle").click(function() {
		$("img.nineth").toggle();
		// $("img.nineth").toggle("slow");
	});

	$("button.hide-fn").click(function() {
		$("img.tenth").hide();
	});

	$("button.show").click(function() {
		$("img.tenth").show();
	});

	$("button.slide-down").click(function() {
		$("img.twelfth").slideDown("slow", function() {
			console.log("slideDown done");
		});
	});

	$("button.slide-toggle").click(function() {
		$("img.thirteenth").slideToggle("slow");
	});

	$("button.slide-up").click(function() {
		$("img.twelfth").slideUp("slow", function() {
			console.log("slideUp done");
		});
	});

	$("button.fade-out").click(function() {
		$("img.fifteenth").fadeOut();
	});

	$("button.fade-in").click(function() {
		$("img.fifteenth").fadeIn();
	});

	$("button.focus-fn").click(function() {
		$("input.seventeenth").focus();
		$("p.focus-result").html("<strong>box focused</strong>")
	});

	$("button.click-fn").click(function() {
		$("p.eighteenth").html("<strong>You clicked.</strong>")
	});

})