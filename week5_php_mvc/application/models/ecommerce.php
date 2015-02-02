<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ecommerce extends CI_Model
{
	// login_registration db
	private $e_commerce_db;

	public function __construct() {
		parent::__construct();
		$this->e_commerce_db = $this->load->database("e_commerce_db", true);
	}

	// get all products
	public function get_all_products()
	{
		$query = "SELECT * FROM products";
		return $this->e_commerce_db->query($query)->result_array();
	}

	// get product by id
	public function get_product_by_id($id) {
		$query = "SELECT * FROM products WHERE id = ?";
		$value = array($id);
		return $this->e_commerce_db->query($query, $value)->row_array();	
	}

	// get price by product id
	public function get_price_by_product_id($id)
	{
		$query = "SELECT price FROM products WHERE id = ?";
		$value = array($id);
		return $this->e_commerce_db->query($query, $value)->row_array();
	}

	// add product into cart
	public function add_cart($product)
	{
		$query = "INSERT INTO carts (product_id, quantity, created_at, updated_at) VALUES (?, ?, ?, ?)";
		$value = array($product["product_id"], $product["quantity"], date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s"));
		return $this->e_commerce_db->query($query, $value);
	}

	// get cart
	public function get_cart()
	{
		$query = "SELECT *, carts.id as cart_id FROM carts
				  JOIN products on products.id = carts.product_id
				  ORDER BY carts.created_at DESC";
		return $this->e_commerce_db->query($query)->result_array();
	}

	// remove order from courses table
	public function remove_order($id)
	{
		$query = "DELETE FROM carts WHERE id = ?";
		return $this->e_commerce_db->query($query, $id);
	}

	
}

?>