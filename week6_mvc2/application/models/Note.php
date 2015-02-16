<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Note extends CI_Model {

	private $posts_db;

	public function __construct()
	{
		parent::__construct();
		$this->posts_db = $this->load->database("posts_db", true);
	}

	public function get_all_notes()
	{
		$query = "SELECT id, title, description FROM notes ORDER BY id DESC";
		return $this->posts_db->query($query)->result_array();
	}

	public function add_note($note)
	{
		$query = "INSERT INTO notes (title, description, created_at, updated_at)
				  VALUES (?, ?, now(), now())";
		$value = array($note["title"], $note["description"]);
		return $this->posts_db->query($query, $value);
	}

	public function edit_note($note)
	{
		$query = "UPDATE notes SET description = ?, updated_at = now() WHERE id = ?";
		$value = array($note["description"], $note["id"]);
		return $this->posts_db->query($query, $value);
	}

	public function delete_note($id)
	{
		$query = "DELETE FROM notes WHERE id = ?";
		$value = array($id);
		return $this->posts_db->query($query, $value);
	}
}