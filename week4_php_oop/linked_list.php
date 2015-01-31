<?php

	class Node {
		public $value;
		public $prev;
		public $next;

		public function __construct($value) {
			$this->value = $value;
		}
	}

	class DoublyLinkedList {
		private $first_node;
		private $last_node;

		public function __construct() {
			$this->first_node = NULL;
			$this->last_node = NULL;
		}

		public function insertFirst($data) {
			$new_node = new Node($data);

			if($this->isEmpty()) {
				$this->last_node = $new_node;
			}
			else {
				$this->first_node->prev = $new_node;
			}

			$new_node->next = $this->first_node;
			$this->first_node = $new_node;
		}

		public function insertLast($data) {
			$new_node = new Node($data);

			if($this->isEmpty()) {
				$this->first_node = $new_node;
			}
			else {
				$this->last_node->next= $new_node;
			}

			$new_node->prev = $this->last_node;
			$this->last_node = $new_node;
		}

		public function add(Node $new_node) {
			// var_dump($this->last_node->$next);
			if($this->first_node == null) {
				$this->first_node = $new_node;
			}
			else {
				$this->last_node = $this->first_node;

				while($this->last_node->next != null) {
					$this->last_node = $this->last_node->next;
				}
				$this->last_node->next = $new_node;
				$new_node->prev = $this->last_node;
			}
		}

		public function delete($location) {
			if($location == 0) {
				$first_node = $this->first_node->next;
				if($first_node != null) {
					$first_node->prev = null;
				}
			}
			else {
				$before = new Node($this->first_node);
				while((--$location) > 0) {
					$before = $before->next;
				}

				$after = new Node($before->next);

				if($after != null) {
					$before->next = $after;
					$after->prev = $before;
				}
				else {
					$before->next = null;
				}
			}
		}

		public function insert() {

		}

		public function print_list() {
			echo "<pre>";
			var_dump($this);
			echo "</pre>";
		}
	}

	$list = new DoublyLinkedList();

	for($i = 0; $i < 5; $i++) {
		$list->add(new Node($i));
	}

	$list->print_list();

	// $list->delete(0);
	$list->delete(1);
	$list->delete(2);

	$list->print_list();


	// echo "<pre>";
	// $doublyLinkedList->add($node1);
	// $doublyLinkedList->add($node2);
	// $doublyLinkedList->add($node3);
	// var_dump($doublyLinkedList->isEmpty());
	// echo $doublyLinkedList->total_nodes() . "<br />";
	// $doublyLinkedList->insertLast($node2);
	// var_dump($doublyLinkedList->isEmpty());
	// echo $doublyLinkedList->total_nodes() . "<br />";
	// var_dump($doublyLinkedList);
	// echo "</pre>";

?>