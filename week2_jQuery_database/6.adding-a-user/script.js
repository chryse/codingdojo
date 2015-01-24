$(document).ready(function() {
	$("#my-form").submit(function() {
		var info = "<tr>";
		$("#my-form input").each(function() {
			if ($(this).val() != "") {
				console.log($(this).val());
				info += "<td>" + $(this).val() + "</td>";
				console.log($(this).val());
			}
		})
		info += "</tr>";
		$("tbody").append(info);
		return false;
	});
});