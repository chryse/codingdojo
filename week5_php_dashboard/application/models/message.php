<?php
defined("BASEPATH") OR exit("No direct script access allowed.");

class Message extends CI_Model {

	public function get_all_messages($user_written_id)
	{
		$query = "SELECT messages.id as message_id, written_user.id as written_user_id, written_user.first_name as written_user_first_name, written_user.last_name as written_user_last_name, messages.message, UNIX_TIMESTAMP(messages.created_at) as created_at, writer_user.id as writer_user_id, writer_user.first_name as writer_user_first_name, writer_user.last_name as writer_user_last_name
				  FROM messages
				  LEFT JOIN users as written_user
				  ON written_user.id = messages.user_written_id
				  LEFT JOIN users as writer_user
				  ON writer_user.id = messages.user_writer_id
				  WHERE written_user.id = ?
				  ORDER BY messages.id DESC";

		$value = array($user_written_id);

		return $this->db->query($query, $value)->result_array();
	}

	public function add_message($message)
	{
		$query = "INSERT INTO messages (user_written_id, user_writer_id, message, created_at, updated_at)
				  VALUES(?, ?, ?, ?, ?)";
		$value = array($message["user_written_id"], $message["user_writer_id"], $message["message"], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		return $this->db->query($query, $value);
	}

	public function get_all_comments($message_id)
	{
		$query = "SELECT comments.id as comment_id, messages.id as message_id, comments.comment as comment, comments.user_id as user_id, comments.created_at as created_at, users.first_name as first_name, users.last_name as last_name
				  FROM comments
				  LEFT JOIN messages
				  ON messages.id = comments.message_id
				  LEFT JOIN users
				  ON users.id = comments.user_id
				  WHERE comments.message_id = ?
				  ORDER BY comment_id";

		$value = array($message_id);

		return $this->db->query($query, $value)->result_array();
	}

	public function add_comment($comment)
	{
		$query = "INSERT INTO comments (user_id, message_id, comment, created_at, updated_at)
				 VALUES(?, ?, ?, ?, ?)";
		$value = array($comment["user_writer_id"], $comment["message_id"], $comment["comment"], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		return $this->db->query($query, $value);
	}
}
?>