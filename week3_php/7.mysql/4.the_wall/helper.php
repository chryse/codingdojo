<?php

	// get user id
	function get_user_id($user_email) {
		$query = "SELECT users.id FROM users
				WHERE '$user_email' = users.email";
		$user_id = fetch_all($query)[0]["id"];
		return $user_id;
	}

?>