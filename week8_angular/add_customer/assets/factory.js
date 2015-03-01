angular.module("myFactorys", [])
.factory("customerFactory", function() {
	var date1 = new Date();
	var date2 = new Date();
	var date3 = new Date();
	var date4 = new Date();

	var customers = [
		{name: "Claire", created_at: date1.setDate(date1.getDate() - 20)},
		{name: "Trey", created_at: date2.setDate(date2.getDate() - 365)},
		{name: "Mike", created_at: date3.setDate(date3.getDate() - 362)},
		{name: "Jun", created_at: date4.setDate(date4.getDate() - 100)}
	];

	var factory = {};

	factory.getCustomers = function(callback) {
		callback(customers);
	}

	return factory;
})