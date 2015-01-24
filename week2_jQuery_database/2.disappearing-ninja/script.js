$(document).ready(function() {
	$("img").click(function() {
		$(this).hide();
	});
	$("button#restore").click(function() {
		$("img").show();
	});
});