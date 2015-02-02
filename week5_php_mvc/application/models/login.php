<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model
{
	// login_registration db
	private $login_register_db;

	public function __construct() {
		parent::__construct();
		$this->login_register_db = $this->load->database("login_register_db", true);
	}

	// get user by user email
	public function get_user_by_email($email)
	{
		$query = "SELECT * FROM users WHERE email = ?";
		$value = array($email);
		return $this->login_register_db->query($query, $value)->row_array();
	}

	// check user existence by user email
	public function exist_email($email)
	{
		$query = "SELECT email FROM users WHERE email = ?";
		$value = array($email);
		$result = $this->login_register_db->query($query, $value)->row_array();
		if($result)
			return true;
		else
			return false;
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
		return $this->login_register_db->query($query, $value);
	}
}

?>