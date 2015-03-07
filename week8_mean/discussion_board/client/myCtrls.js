angular.module("myCtrls", [])
.controller("mainCtrl", function($scope, userFactory) {
	console.log("mainCtrl");
	$scope.error = false;
	$scope.errorMessage = "";

	$scope.createUser = function(newUser) {
		$scope.error = false;
		userFactory.createUser(newUser, function(result) {
			console.log(result);
			if(result.message) {
				$scope.error = true;
				$scope.errorMessage = result.message;
			}
			else {
				$scope.error = false;
				$scope.errorMessage = "";
			}
		})
	}
})

.controller("dashboardCtrl", function($scope, topicFactory) {
	$scope.topics = [];

	topicFactory.readTopic(function(result) {
		$scope.topics = result;
	});

	$scope.createTopic = function(newTopic) {

	}
})

.controller("topicCtrl", function($scope) {

})

.controller("userCtrl", function($scope) {

})



// .controller("dashboardCtrl", function($scope, productFactory, customerFactory, orderFactory) {
// 			console.log("dashboardCtrl triggered");

// 			$scope.predicate = "-created_at";
// 			$scope.productLimit = 4;
// 			$scope.orderLimit = 3;
// 			$scope.customerLimit = 3;
// 			$scope.productShow = true;
// 			$scope.orderShow = true;
// 			$scope.customerShow = true;

// 			productFactory.readProduct(function(result) {
// 				$scope.products = result;
// 			});

// 			customerFactory.readCustomer(function(result) {
// 				$scope.customers = result;
// 			});

// 			orderFactory.readOrder(function(result) {
// 				$scope.orders = result;
// 			});

// 			$scope.showMore = function(where) {
// 				if(where == "productMore") {
// 					$scope.productLimit = 10;
// 					$scope.productShow = false;
// 				}
// 				else if (where == "productLess") {
// 					$scope.productLimit = 4;
// 					$scope.productShow = true;
// 				}
// 				else if (where == "orderMore") {
// 					$scope.orderLimit = 10;
// 					$scope.orderShow = false;
// 				}
// 				else if (where == "orderLess") {
// 					$scope.orderLimit = 3;
// 					$scope.orderShow = true;
// 				}
// 				else if (where == "customerMore"){
// 					$scope.customerLimit = 10;
// 					$scope.customerShow = false;
// 				}
// 				else if (where == "customerLess"){
// 					$scope.customerLimit = 3;
// 					$scope.customerShow = true;
// 				}
// 			}

// 		})

// 		.controller("productCtrl", function($scope, productFactory) {
// 			console.log("productCtrl triggered");

// 			$scope.predicate = "-created_at";

// 			productFactory.readProduct(function(result) {
// 				$scope.products = result;
// 			})

// 			$scope.createProduct = function(newProduct) {
// 				console.log("createProduct clicked");
// 				productFactory.createProduct(newProduct, function(result) {
// 					$scope.products = result;
// 					$scope.newProduct = {};
// 				})
// 			}

// 			$scope.deleteProduct = function(selectedProduct) {
// 				productFactory.deleteProduct(selectedProduct)
// 			}
// 		})

// 		.controller("customerCtrl", function($scope, customerFactory) {
// 			console.log("customerCtrl triggers!");

// 			$scope.error = false;
// 			$scope.newCustomer = {};

// 			customerFactory.readCustomer(function(result) {
// 				$scope.customers = result;
// 			});

// 			$scope.createCustomer = function(newCustomer) {

// 				$scope.error = false;
// 				for(customer in $scope.customers) {
// 					if(newCustomer.name == $scope.customers[customer].name) {
// 						$scope.error = true;
// 					}
// 				}

// 				if(!$scope.error && newCustomer.name !== undefined) {
// 					customerFactory.createCustomer(newCustomer, function(result) {
// 						$scope.customers = result;
// 						$scope.newCustomer = {};
// 					});	
// 				}

// 				$scope.newCustomer = {};
				
// 			};

// 			$scope.deleteCustomer = function(selectedCustomer) {
// 				customerFactory.deleteCustomer(selectedCustomer);
// 			};
// 		})

// 		.controller("orderCtrl", function($scope, orderFactory, customerFactory, productFactory) {
// 			console.log("orderCtrl triggers!");
// 			customerFactory.readCustomer(function(result) {
// 				$scope.customers = result;
// 			});
// 			productFactory.readProduct(function(result) {
// 				$scope.products = result;
// 			});
// 			orderFactory.readOrder(function(result) {
// 				$scope.orders = result;
// 			});

// 			$scope.createOrder = function(newOrder) {
// 				console.log(newOrder);
// 				orderFactory.createOrder(newOrder, function(result) {
// 					$scope.orders = result;
// 					$scope.newOrder = {};
// 				});
// 			};
// 		})