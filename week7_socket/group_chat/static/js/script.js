$(document).ready(function() {
	var user_id, user_name;
	var chat_content = "";

	$("button.add-name").click(function() {
		if($("input.name").val() == "") {
			alert("Please insert your name!");
		}
		else {
			// socket connection after writing user name
			var socket = io.connect();

			socket.emit("server_add_user", {name: $("input.name").val()});

			// give a user name
			user_name = $("input.name").val();

			socket.on("client_add_user", function(data) {
				chat_content = "";

				// assign user id
				user_id = data[data.length-1].id;

				//page change
				$("div.part1").remove();
				$("div.part2").css("visibility", "visible");

				// show previous conversation
				for(var i = 0; i < data.length; i++) {
					if(/join/.test(data[i].message)) {
						chat_content += "<span class='green'>" + data[i].name + " " + data[i].message + "</span><br />"
					}
					else if(/left/.test(data[i].message)) {
						chat_content += "<span class='red'>" + data[i].name + " " + data[i].message + "</span><br />";
					}
					else {
						chat_content += "<strong>" + data[i].name + "</strong> : " + data[i].message + "<br />";
					}

				}

				$("div.user-name").html("Welcome, " + user_name);
				$("div.chat-room").html(chat_content);
				// move to the bottom
				$("div.chat-room").animate({scrollTop: $("div.chat-room").prop("scrollHeight")}, 1000);
			});

			socket.on("client_add_message", function(data) {
				chat_content += "<strong>" + data.name + "</strong> : " + data.message + "<br />";
				$("div.chat-room").html(chat_content);
				// move to the bottom
				$("div.chat-room").animate({scrollTop: $("div.chat-room").prop("scrollHeight")}, 1000);
			});

			socket.on("client_left", function(data) {
				chat_content += "<span class='red'>" + data.name + " " + data.message + "</span><br />";
				$("div.chat-room").html(chat_content);
				// move to the bottom
				$("div.chat-room").animate({scrollTop: $("div.chat-room").prop("scrollHeight")}, 1000);
			});

			$("button.send").click(function() {
				var message_info = {};
				message_info.id = user_id;
				message_info.name = user_name;
				message_info.message = $("input.message").val();
				socket.emit("server_add_message", message_info);
				// clean input value
				$("input.message").val("");
			});

			// enter key is available
			$("input.message").keypress(function(e) {
				if(e.keyCode === 13) {
					var message_info = {};
					message_info.id = user_id;
					message_info.name = user_name;
					message_info.message = $("input.message").val();
					socket.emit("server_add_message", message_info);
					// clean input value
					$("input.message").val("");
				}
			});
		}
	});
});
