$(function() {
    $("#datepicker-from").datepicker();
    $("#datepicker-to").datepicker();
});

$(document).ready(function() {
	$("form#my-form").submit(function(){
		var dateFrom = $("input#datepicker-from").val();
        var dateTo = $("input#datepicker-to").val();
        var name = $("input#name").val();
        if (dateFrom == "") {
        	alert("No date from");
        }
        if (dateTo == "") {
        	alert("No date to");
        }
        if (name == "") {
        	alert("No name");
        }
		
		$("div#result").html("date From: " + dateFrom + "<br />" + 
								"date To: " + dateTo+ "<br />" + 
								"name: " + name) + "<br />";
		return false;
	});
});