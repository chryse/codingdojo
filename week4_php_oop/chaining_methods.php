<h1>Bike</h1>
<?php

	class Bike {
		public $price;
		public $max_speed;
		public $miles = 0;

		public function __construct($price = 100, $max_speed = 25) {
			$this -> price = $price;
			$this -> max_speed = $max_speed;
		}

		public function displayInfo() {
			echo "Price :" . $this -> price . "<br />";
			echo "Max Speed: " . $this -> max_speed . "mph<br />";
			echo "Total Miles: " . $this -> miles . "<br />";
		}

		public function drive() {
			echo "Driving<br />";
			
			$this -> miles += 10;
			return $this;
		}

		public function reverse() {
			echo "Reverse<br />";
			
			if($this -> miles <= 0) {
				$this -> miles = 0;
			}
			else {
				$this -> miles -= 5;	
			}
			return $this;
		}
	}

	$bike1 = new Bike(100, 25);
	$bike1->displayInfo();
	$bike1->drive()->drive()->drive()->reverse();
	$bike1->displayInfo();
	echo "========================<br />";
	$bike2 = new Bike();
	$bike2->drive()->drive()->reverse()->reverse();
	$bike2 -> displayInfo();
	echo "=========================<br />";
	$bike3 = new Bike();
	$bike3->reverse()->reverse()->reverse();
	$bike3 -> displayInfo();
?>