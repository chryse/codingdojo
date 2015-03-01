angular.module("myFactorys", [])
.factory("orderFactory", function() {
	var date1 = new Date();
	var date2 = new Date();
	var date3 = new Date();
	var date4 = new Date();

	var orders = [
		{name: "Claire", date: date1.setDate(date1.getDate() - 20), product: "Tshirts", quantity: 10},
		{name: "Trey", date: date2.setDate(date2.getDate() - 365), product: "notebooks", quantity: 4},
		{name: "Mike", date: date3.setDate(date3.getDate() - 362), product: "pens", quantity: 20},
		{name: "Jun", date: date4.setDate(date4.getDate() - 100), product: "cups", quantity: 3}
	];

	return orders;
})

.factory("customerFactory", function() {
	var date1 = new Date();
	var date2 = new Date();
	var date3 = new Date();
	var date4 = new Date();

	var customers = [
		{name: "Claire", date: date1.setDate(date1.getDate() - 20) },
		{name: "Trey", date: date2.setDate(date2.getDate() - 365) },
		{name: "Mike", date: date3.setDate(date3.getDate() - 362) },
		{name: "Jun", date: date4.setDate(date4.getDate() - 100) }
	];

	return customers;
})