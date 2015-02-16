<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Post extends CI_Model {

	private $posts_db;

	public function __construct()
	{
		parent::__construct();
		$this->posts_db = $this->load->database("posts_db", true);
	}

	public function get_all_posts()
	{
		$query = "SELECT description FROM posts ORDER BY id DESC";
		return $this->posts_db->query($query)->result_array();
	}

	public function get_recent_post($message)
	{
		$query = "SELECT description FROM posts WHERE posts.description = ?";
		$value = array($message);
		return $this->posts_db->query($query, $value);
	}

	public function add_post($description)
	{
		$query = "INSERT INTO posts (description, created_at, updated_at)
				  VALUES (?, ?, ?)";
		$value = array($description, date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		return $this->posts_db->query($query, $value);
	}
}