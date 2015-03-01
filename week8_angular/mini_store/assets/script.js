angular.module("myApp", ["myFactorys"])

.controller("mainCtrl", function($scope) {

	$scope.page = true;

	$scope.whichPage = function(page) {
		if(page === "orders") {
			$scope.page = true;
		}
		else {
			$scope.page = false;
		}
	}

	$scope.showPage = function() {
		return $scope.page ? "/assets/orders.html" : "/assets/customers.html";
	}
})

.controller("orderCtrl", function($scope, orderFactory) {
	$scope.orders = orderFactory;
	
	$scope.addOrder = function() {
		var now = new Date();
		$scope.orders.push(
			{ name 		: $scope.name,
			  quantity 	: $scope.quantity,
			  product 	: $scope.product,
			  date 		: now
			});
	};

})

.controller("customerCtrl", function($scope, customerFactory) {
	$scope.customers = customerFactory;
	console.log($scope.customers);

	$scope.addCustomer = function() {
		var now = new Date();
		$scope.customers.push({name: $scope.name, date: now});
		$scope.name = "";
	}
})