<?php
defined("BASEPATH") OR exit("No direct script access allowed.");

class User extends CI_Model {

	// add user
	public function add_user($user)
	{
		// generate salt
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		// using the salt for password encryption
		$encrypted_password = crypt($user["password"], $salt);

		$query = "INSERT INTO users (name, alias, email, password, birth, is_logged_in, created_at, updated_at)
				  VALUES (?, ?, ?, ?, ?, ?, now(), now())";
		$value = array($user["name"], $user["alias"], $user["email"], $encrypted_password, $user["birth"], 1);
		return $this->db->query($query, $value);
	}

	// change user log status
	public function update_user_log($user)
	{
		$query = "UPDATE users SET users.is_logged_in = ? 
				  WHERE users.id = ?";
		$values = array($user["is_logged_in"], $user["id"]);
		$this->db->query($query, $values);
	}

	// get user by user email
	public function fetch_user_by_email($email)
	{
		$query = "SELECT * FROM users 
				  WHERE email = ?";
		$value = array($email);
		return $this->db->query($query, $value)->row_array();
	}

	// get user by id
	public function fetch_user_by_id($user_id)
	{
		$query = "SELECT id, alias, name, email, birth
				  FROM users
				  WHERE users.id = ?";
		$value = array($user_id);				  
		return $this->db->query($query, $value)->row_array();
	}

	// get friends
	public function fetch_friends($user_id)
	{
		$query = "SELECT * 
				  FROM friendships
				  JOIN users as friends ON friendships.followed_id = friends.id
				  WHERE friendships.follower_id = ? AND friends.is_logged_in
				  GROUP BY friendships.followed_id";
		$value = array($user_id);
		return $this->db->query($query, $value)->result_array();
	}

	// get not friends
	public function fetch_non_friends($user_id)
	{
		$query = "SELECT * FROM users WHERE users.id 
				  NOT IN 
				  (select followed_id FROM friendships WHERE follower_id = ?)
				  AND users.id != ?";

				  // "SELECT * FROM users
				  // LEFT JOIN friendships ON users.id = friendships.followed_id
				  // WHERE friendships.followed_id = NULL"
		$value = array($user_id, $user_id);
		return $this->db->query($query, $value)->result_array();
	}

	// add as frined
	public function add_friendship($user_id, $friend_id)
	{
		$query = "INSERT INTO friendships (follower_id, followed_id)
				  VALUES (?, ?)";
		$value = array($user_id, $friend_id);
		$this->db->query($query, $value);
	}

	//delete friendship
	public function delete_friendship($user_id, $friend_id)
	{
		$query = "DELETE from friendships 
				  WHERE follower_id = ? AND followed_id = ?";
		$values = array($user_id, $friend_id);
		$this->db->query($query, $values);
	}
}

?>