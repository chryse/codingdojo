<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	Class Ecommerces extends CI_Controller
	{

		public function index()
		{
			$data = [];
			$this->load->model("Ecommerce");
			$products = $this->Ecommerce->get_all_products();
			
			foreach($products as $key=>$product) {
				$data["product".$key] = $product;
			}
			$data["cart"] = count($this->Ecommerce->get_cart());
			$this->load->view("ecommerce", $data);
		}

		public function add_cart()
		{
			$this->load->model("Ecommerce");
			// add products in session
			// if(!$this->session->has_userdata("cart")) {
			// 	$this->session->set_userdata("cart", []);
			// }

			// $cart = $this->session->userdata("cart");
			$product = [];

			if($this->input->post("product")) {
				$product["product_id"] = $this->input->post("product");
				$product["quantity"] = $this->input->post("quantity");
			}

			$this->Ecommerce->add_cart($product);

			redirect("ecommerce");
		}

		public function view_cart()
		{
			$this->load->model("Ecommerce");
			$orders = $this->Ecommerce->get_cart();

			// echo "<pre>";
			// var_dump($orders);
			// echo "</pre>";
			$new_orders = [];

			foreach($orders as $order) {
				$new_orders[] = [
							"quantity"=>$order["quantity"],
							"name"=>$order["name"],
							"price"=>$order["price"],
							"delete"=>"<a href='delete-order/{$order['cart_id']}'><button class='btn btn-danger'>Delete</button></a>"
						  ];
			}

			// load table class in order to draw table
			$this->load->library("table");

			//change table style
			$templ = array("table_open" => "<table class='table table-striped table-hover'>");
			$this->table->set_template($templ);

			// table head setting
			$this->table->set_heading("Quantity", "Description", "price", "Action");

			// generate table
			$data["table"] = $this->table->generate($new_orders);

			// sum total
			$data["total"] = 0;
			foreach($orders as $order) {
				$data["total"] += $order["price"] * $order["quantity"];
			}

			$this->load->view("ecommerce-cart", $data);

		}

		public function delete_order()
		{
			// load url helper
			$this->load->helper('url');

			// select second segment from url
			$id = $this->uri->segment(2);

			$this->load->model("Ecommerce");
			$this->Ecommerce->remove_order($id);

			redirect("view-cart");
		}

		public function order() {
			if($this->input->post("order")) {
				var_dump($this->input->post());
			}
		}
	}
?>