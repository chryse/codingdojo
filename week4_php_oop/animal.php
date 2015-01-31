<?php
	class Animal {
		public $name;
		public $health;

		public function __construct($name, $health=100) {
			$this->name = $name;
			$this->health = $health;
		}

		public function walk() {
			$this->health -= 1;
			return $this;
		}

		public function run() {
			$this->health -= 5;
			return $this;
		}

		public function displayHealth() {
			echo "Name: {$this->name}, Health: {$this->health}<br/>";
		}
	}

	class Dog extends Animal {
		public function __construct($name, $health=150) {
			$this->name = $name;
			$this->health = $health;
		}

		public function walk() {
			$this->health -= 2;
			return $this;
		}

		public function pet() {
			$this->health += 5;
			return $this;
		}
	}

	class Dragon extends Animal {
		public function __construct($name, $health=170) {
			$this->name = $name;
			$this->health = $health;
		}

		public function walk() {
			$this->health -= 2;
			return $this;
		}

		public function fly() {
			$this->health -= 10;
			return $this;
		}
	}

	$animal = new Animal("Any");
	$animal->walk()->walk()->walk()->run()->run()->displayHealth();

	$dog = new Dog("Bowwow");
	$dog->walk()->walk()->walk()->run()->run()->pet()->displayHealth();

	$dragon = new Dragon("Dra");
	$dragon->walk()->walk()->walk()->run()->run()->fly()->fly();
	echo "This is a dragon!<br />";
	$dragon->displayHealth();
?>