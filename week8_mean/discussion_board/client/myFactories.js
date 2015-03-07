angular.module("myFactories", [])
.factory("userFactory", function($http) {
	var factory = {};
	var users = [];
	var currentUser = {};

	factory.createUser = function(newUser, callback) {
		$http.post("/signin", newUser).success(function(result) {
			if(!result.message) {
				userStatus = result;
				console.log(userStatus);
			}
			else {
				console.log(result);
			}
			callback(result);
		})
	}

	return factory;
})

.factory("topicFactory", function($http) {
	var factory = {};
	var topics = [];

	factory.readTopic = function(callback) {
		$http.get("/dashboard").success(function(result) {
			topics = result;
			callback(result);
		})
	}

	return factory;
})

.factory("postFactory", function($http) {
	var factory = {};
	var posts = [];

	return factory;
})


// .factory("customerFactory", function($http) {
// 			var factory = {};
// 			var customers = [];

// 			factory.createCustomer = function(newCustomer, callback) {
// 				$http.post("/customers", newCustomer).success(function(result) {
// 					customers.push(result);
// 					callback(customers);
// 				});
// 			};

// 			factory.readCustomer = function(callback) {
// 				$http.get("/customers").success(function(result) {
// 					customers = result;
// 					callback(customers);
// 				});
// 			};

// 			factory.deleteCustomer = function(selectedCustomer, callback) {
// 				$http({
// 					method: "DELETE",
// 					url: "/customers/" + selectedCustomer._id
// 				}).success(function(result) {
// 					customers.splice(customers.indexOf(selectedCustomer), 1);
// 				});
// 			};

// 			return factory;
// 		})

// 		.factory("orderFactory", function($http) {
// 			var factory = {};
// 			var orders = [];

// 			factory.createOrder = function(newOrder, callback) {
// 				$http.post("/orders", newOrder).success(function(result) {
// 					console.log(result);
// 					orders.push({
// 						name 		: result._customer.name,
// 						productName : result._product.productName,
// 						quantity	: result.quantity,
// 						created_at	: result.created_at
// 					})
// 					callback(orders);
// 				});
// 			};

// 			factory.readOrder = function(callback) {
// 				$http.get("/orders").success(function(result) {
// 					// console.log(result);
// 					var freshData = [];
// 					for(order in result) {
// 						freshData.push({
// 							name 		: result[order]._customer.name,
// 							productName : result[order]._product.productName,
// 							quantity	: result[order].quantity,
// 							created_at	: result[order].created_at
// 						})
// 					}
// 					orders = freshData;
// 					callback(orders);
// 				});
// 			};

// 			return factory;
// 		})

// 		.factory("productFactory", function($http) {
// 			var factory = {};
// 			var products = [];

// 			factory.createProduct = function(newProduct, callback) {
// 				$http.post("/products", newProduct).success(function(result) {
// 					products.push(result);
// 					callback(products);
// 				});
// 			};

// 			factory.readProduct = function(callback) {
// 				$http.get("/products").success(function(result) {
// 					products = result;
// 					callback(products);
// 				});
// 			};

// 			factory.deleteProduct = function(selectedProduct) {
// 				$http({
// 					method: "DELETE",
// 					url: "/products/" + selectedProduct._id
// 				}).success(function(result) {
// 					products.splice(products.indexOf(selectedProduct), 1);
// 				});
// 			}

// 			return factory;
// 		})