<!DOCTYPE>
<html>
<head>
	<title>Car</title>
	<meta charset="utf-8">
	<style type="text/css">
		div {
			font-size: 16px;
			line-height: 1.5em;
			border: 1px dotted #444;
			background: #aaa;
			padding: 10px;
			margin-bottom: 5px;
			width: 300px;
		}
	</style>
</head>
<body>
<h1>Car</h1>
<?php
	class Car {
		public $price;
		public $speed;
		public $fuel;
		public $mileage;
		public $tax;

		public function __construct($price, $speed, $fuel, $mileage) {
			$this->price = $price;
			$this->speed = $speed;
			$this->fuel = $fuel;
			$this->mileage = $mileage;

			if($this->price > 10000) {
				$this->tax = .15;
			}
			else {
				$this->tax = .12;
			}
		}

		public function displayInfo() {
			echo "<div>";
			echo "Price: {$this->price}<br/>";
			echo "Speed: {$this->speed}mph<br/>";
			echo "Fuel: {$this->fuel}<br />";
			echo "Mileage: {$this->mileage}mpg</br>";
			echo "Tax: {$this -> tax}<br />";
			echo "</div>";
		}
	}

	$car1 = new Car(2000, 35, "Full", 15);
	$car1->displayInfo();
	$car2 = new Car(2000, 5, "Not Full", 105);
	$car2->displayInfo();
	$car3 = new Car(2000, 15, "Kind of Full", 95);
	$car3->displayInfo();
	$car4 = new Car(2000, 25, "Full", 25);
	$car4->displayInfo();
	$car5 = new Car(2000, 45, "Empty", 25);
	$car5->displayInfo();
	$car6 = new Car(20000000, 35, "Empty", 15);
	$car6->displayInfo();
?>
</body>
</html>