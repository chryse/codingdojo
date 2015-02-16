<?php
defined("BASEPATH") OR exit("No direct script access allowed.");

class User extends CI_Model {

	public function fetch_all_users()
	{
		$query = "SELECT users.id, users.name, users.email, DATE_FORMAT(users.created_at, '%b %D %Y') as created_at, user_levels.level 
				  FROM users
				  LEFT JOIN user_levels ON user_levels.user_id = users.id
				  ORDER BY users.id";

		return $this->db->query($query)->result_array();
	}

	// get user by id
	public function fetch_user_by_id($id)
	{
		$query = "SELECT id, alias, name, email
				  FROM users
				  WHERE users.id = ?";
		$value = array($id);				  
		return $this->db->query($query, $value)->row_array();
	}

	// get user review count
	public function fetch_user_review_count($id)
	{
		$query = "SELECT count(reviews.id) as count
				  FROM users
				  JOIN reviews ON reviews.user_id = users.id
				  WHERE users.id = ?";
		$value = array($id);
		return $this->db->query($query, $value)->row_array();
	}

	// get reviewed books
	public function fetch_user_reviewed_books($id)
	{
		$query = "SELECT books.title, books.id as book_id
				  FROM users
				  JOIN books ON books.user_id = users.id
				  WHERE users.id = ?";
		$value = array($id);
		return $this->db->query($query, $value)->result_array();
	}

	// get user by user email
	public function fetch_user_by_email($email)
	{
		$query = "SELECT * FROM users 
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

		$query = "INSERT INTO users (name, alias, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, now(), now())";
		$value = array($user["name"], $user["alias"], $user["email"], $encrypted_password);
		return $this->db->query($query, $value);
	}
}

?>