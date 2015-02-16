<?php
defined("BASEPATH") OR exit("No direct script access allowed.");

class Book extends CI_Model {

	public function fetch_all_books()
	{
		$query ="SELECT books.id as book_id, books.title, reviews.review, reviews.rating, DATE_FORMAT(reviews.created_at,'%b %d, %Y') as created_at, users.name, users.id as user_id
				 FROM books
				 JOIN reviews ON reviews.book_id = books.id
				 JOIN users ON users.id = reviews.user_id
				 ORDER BY books.id DESC";
		return $this->db->query($query)->result_array();
	}

	public function fetch_book_info_by_id($id) {
		$query = "SELECT books.id as book_id, books.title, books.author, reviews.review, reviews.rating, DATE_FORMAT(reviews.created_at,'%b %d, %Y') as created_at, users.name, users.id as user_id
				  FROM books
				  JOIN reviews ON reviews.book_id = books.id
				  JOIN users ON users.id = reviews.user_id
				  WHERE books.id = ?";
		$value = array($id);
		return $this->db->query($query, $value)->result_array();
	}

	public function insert_book_info($info)
	{
		$query = "INSERT INTO books (title, author, user_id, created_at, updated_at)
				  VALUES (?, ?, ?, now(), now())";
		$values = array($info["title"], $info["author"], $info["user_id"]);
		$this->db->query($query, $values);
		return $this->db->insert_id();
	}

	public function insert_review($info)
	{
		$query = "INSERT INTO reviews (book_id, user_id, review, rating, created_at, updated_at)
				   			 VALUES (?, ?, ?, ?, now(), now())";
		$values = array($info["book_id"], $info["user_id"], $info["review"], $info["rating"]);
		return $this->db->query($query, $values);
	}

	public function delete_review($book_id, $user_id)
	{
		$query = "DELETE FROM reviews WHERE book_id = ? AND user_id = ?";
		$values = array($book_id, $user_id);
		$this->db->query($query, $values);
	}
}

?>