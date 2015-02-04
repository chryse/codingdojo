<?php
defined("BASEPATH") OR exit("No direct script access allowed.");

class User extends CI_Model {

	public function get_all_users()
	{
		$query = "SELECT users.id, CONCAT(users.first_name, ' ', users.last_name) as name, users.email, DATE_FORMAT(users.created_at, '%b %D %Y') as created_at, user_levels.level 
				  FROM users
				  LEFT JOIN user_levels ON user_levels.user_id = users.id
				  ORDER BY users.id";

		return $this->db->query($query)->result_array();
	}

	public function exist_email($email)
	{
		$query = "SELECT email from users WHERE email = ?";
		$value = array($email);
		$result = $this->db->query($query, $value)->row_array();
		if($result)
			return true;
		else
			return false;
	}

	public function exist_email_except_me($id) {
		$query = "SELECT id, email from users WHERE id = ?";
		$value = array($id);
		$result = $this->db-query($query, $value)->result_array();
	}

	// get user by id
	public function get_user_by_id($id)
	{
		$query = "SELECT id, first_name, last_name, email, description, created_at
				  FROM users
				  WHERE users.id = ?";
		$value = array($id);				  
		return $this->db->query($query, $value)->row_array();
	}

	// get user by user email
	public function get_user_by_email($email)
	{
		$query = "SELECT users.id as id, users.first_name as first_name, users.last_name as last_name, users.email as email, users.password, users.created_at as created_at, user_levels.level
				  FROM users 
				  LEFT JOIN user_levels ON user_levels.user_id = users.id
				  WHERE email = ?";
		$value = array($email);
		return $this->db->query($query, $value)->row_array();
	}

	// add user
	public function add_user($user)
	{
		// generate salt
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		// using the salt for password encryption
		$encrypted_password = crypt($user["password"], $salt);

		$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
		$value = array($user["first_name"], $user["last_name"], $user["email"], $encrypted_password, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		return $this->db->query($query, $value);
	}

	// set user level
	public function set_user_level($user_id, $user_level)
	{
		$query = "INSERT INTO user_levels (user_id, level, created_at, updated_at) VALUES (?, ?, ?, ?)";
		$value = array($user_id, $user_level, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		return $this->db->query($query, $value);
	}

	// remove user
	public function remove_user($user_id)
	{
		$query1 = "DELETE FROM users WHERE users.id = ?";
		$query2 = "DELETE FROM user_levels WHERE user_levels.user_id = ?";
		$value = array($user_id);
		$this->db->query($query1, $value);
		$this->db->query($query2, $value);
	}

	public function edit_user_info($user)
	{
		$query1 = "UPDATE users
				   SET users.email = ?, users.first_name = ?, users.last_name = ?, users.updated_at = ?
				   WHERE users.id = ?";
		$value1 = array($user["email"], $user["first_name"], $user["last_name"], date("Y-m-d, H:i:s"), $user["user_id"]);
		return $this->db->query($query1, $value1);
	}

	public function edit_password($user)
	{
		// generate salt
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		// using the salt for password encryption
		$encrypted_password = crypt($user["password"], $salt);

		$query = "UPDATE users SET users.password = ? WHERE users.id = ?";
		$value = array($encrypted_password, $user["user_id"]);
		return $this->db->query($query, $value);
	}

	public function edit_description($user)
	{
		$query = "UPDATE users
				  SET users.description = ?
				  WHERE users.id = ?";
		$value = array($user["description"], $user["user_id"]);
		return $this->db->query($query, $value);
	}
}

?>